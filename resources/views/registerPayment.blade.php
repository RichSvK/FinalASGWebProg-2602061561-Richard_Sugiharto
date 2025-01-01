@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center">
        <div class="col-md-12 text-center mt-3 mb-3">
            <h1>@lang('lang.Register Payment')</h1>
        </div>

        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">@lang()</div>
                <div class="card-body">
                    <form id="payment-form">
                        <div class="d-flex">
                            <p class="fw-bold">
                                @lang('lang.Registration Price'):
                            </p>
                            <p id="price" class="ms-2">
                                {{-Auth::user()->coin}}
                            </p>
                        </div>

                        <div class="form-control mb-2 border-0 p-0">
                            <label for="pay">@lang('lang.Enter Payment Amount'):</label>
                            <input type="text" id="pay" name="pay">
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{$errors->first()}}
                            </div>
                        @endif
                        <button class="btn btn-primary" type="submit">@lang('lang.Pay')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script>
        async function registerPay(event) {
            event.preventDefault();
            const price = parseInt(document.getElementById('price').textContent.trim());
            const pay = parseInt(document.getElementById('pay').value);

            if (isNaN(pay) || pay <= 0) {
                alert("Please enter a valid payment amount.");
                return;
            }

            console.log(price, pay);
            if(pay < price) {
                alert(`You are still underpaid by ${price - pay}`);
                document.getElementById('pay').focus();
                return;
            }

            if(pay > price) {
                const overpaidAmount = pay - price;
                const confirmation = confirm(`Sorry you overpaid by ${overpaidAmount}. Would you like to add the balance to your wallet?`);

                if (confirmation) {
                    alert(`Thank you! We will add ${overpaidAmount} to your wallet.`);
                } else {
                    alert("Please enter the correct payment amount.");
                    document.getElementById('pay').focus();
                    return;
                }
            }

            let url = "{{route('registerPay')}}";

            let data = {
                pay: pay
            };

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            try {
                let response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify(data),
                });

                console.log(response);
                if(!response.ok) {
                    throw new Error('An error occurred during payment processing. Please try again.');
                }
                window.location.href = "{{route('home')}}";
            } catch (error) {
                console.log(error);
                alert(error);
            }
        }

        document.getElementById('payment-form').addEventListener('submit', registerPay);
    </script>
@endsection
