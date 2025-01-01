@extends('layouts.app')

@section('title', 'Top Up')

@section('content')
    <div class="container d-flex justify-content-center my-3">
        <div class="text-center col-12 border border-2 rounded border-dark p-2 m-2 d-flex flex-column justify-content-between align-items-center" style="width: 200px">
            <div class="d-flex flex-column">
                <div class="text-center">
                    <img src="{{asset('assets/coin.png')}}" alt="Coin" class="rounded-circle" style="width: 100px; height: 100px;">
                </div>
                <h5 class="text-center">@lang('lang.Top Up') 100 @lang('lang.Coin')</h5>
            </div>

            <form action="{{route('topUp')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-dark">@lang('lang.Top Up')</button>
            </form>
        </div>
    </div>
@endsection
