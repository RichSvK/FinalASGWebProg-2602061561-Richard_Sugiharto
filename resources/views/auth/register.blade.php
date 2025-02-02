@extends('layouts.app')

@section('title', __('lang.Register'))

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('lang.Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('lang.Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="mobile_number" class="col-md-4 col-form-label text-md-end">{{ __('lang.Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{old('mobile_number')}}" required autocomplete="mobile_number" autofocus>

                                @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="linkedin" class="col-md-4 col-form-label text-md-end">{{ __('lang.LinkedIn') }}</label>

                            <div class="col-md-6">
                                <input id="linkedin" type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" value="{{ old('linkedin') }}" required autocomplete="linkedin" autofocus placeholder="https://www.linkedin.com/in/username">

                                @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birth" class="col-md-4 col-form-label text-md-end">{{ __('lang.Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="birth" type="date" class="form-control @error('birth') is-invalid @enderror" name="birth" value="{{ old('birth') }}" required autocomplete="birth" autofocus>

                                @error('birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('lang.Gender') }}</label>

                            <div class="col-md-6 d-flex align-items-center">
                                <select name="gender" id="gender">
                                    <option value="Male" @if (old('gender') === 'Male') selected @endif>Male</option>
                                    <option value="Female" @if (old('gender') === 'Female') selected @endif>Female</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('lang.Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('lang.Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('lang.Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="works" class="col-md-4 col-form-label text-md-end">{{ __('lang.Works') }}</label>

                            <div class="col-md-6">
                                <div id="works-container">
                                    <div class="work-input-group mb-2 d-flex">
                                        <input type="text" class="form-control" name="works[]" placeholder="@lang('lang.Enter your work')" style="max-width: 80%">
                                        <button type="button" class="btn btn-danger btn-sm remove-work ms-1" style="width: 40px">X</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm mt-2" id="add-work">@lang('lang.Add Work')</button>
                            </div>
                        </div>

                        <div class="mb-0 text-center d-flex flex-row justify-content-center">
                            <label for="registration" class="fw-bold">@lang('lang.Registration Price'):</label>
                            <input
                                type="text"
                                id="registration"
                                name="registration"
                                class="form-control text-right p-0 ps-1 fw-bold bg-light border-0"
                                style="max-width: 100px"
                                value="{{random_int(100000, 125000)}}"
                                />
                        </div>

                        <div class="row mb-0 justify-content-center">
                            <button type="submit" class="btn btn-primary" style="max-width: 150px">
                                {{ __('lang.Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('add-work').addEventListener('click', function () {
                var workContainer = document.getElementById('works-container');
                var newWorkInputGroup = document.createElement('div');
                newWorkInputGroup.classList.add('work-input-group', 'mb-2', 'd-flex');
                newWorkInputGroup.innerHTML = `
                    <input type="text" class="form-control" name="works[]" placeholder="@lang('lang.Enter your work')" style="max-width: 80%">
                    <button type="button" class="btn btn-danger btn-sm remove-work ms-1" style="width: 40px;">X</button>
                `;
                workContainer.appendChild(newWorkInputGroup);

                // Add event listener to remove button
                newWorkInputGroup.querySelector('.remove-work').addEventListener('click', function () {
                    workContainer.removeChild(newWorkInputGroup);
                });
            });

            // Remove work input field if user clicks on remove button
            var removeButtons = document.querySelectorAll('.remove-work');
            removeButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var workGroup = button.closest('.work-input-group');
                    workGroup.remove();
                });
            });
        });
    </script>
@endsection
