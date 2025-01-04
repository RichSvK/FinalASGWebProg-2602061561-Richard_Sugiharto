@extends('layouts.app')

@section('title', __('lang.Setting'))

@section('content')
    <div class="container mb-5">
        <div class="d-flex flex-column align-items-center">
            <div class="col-md-12 text-center mt-3 mb-3">
                <h1>@lang('lang.User Profile')</h1>
            </div>

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body border border-3 border-dark rounded">
                        <div class="text-center mb-4">
                            <img src="{{asset('assets/' . $user->avatar)}}" alt="" class="rounded-circle" style="width: 100px; height: 100px;">
                            <h3 class="mt-3">{{$user->name}}</h3>
                        </div>

                        <p class="mb-2">@lang('lang.Email'): {{$user->email}}</p>
                        <p class="mb-2">@lang('lang.Gender'):
                            @if ($user->gender == 'Male')
                                @lang('lang.Male')
                            @else
                                @lang('lang.Female')
                            @endif
                        </p>
                        <p class="mb-2">@lang('lang.Birth Date'): {{\Carbon\Carbon::parse($user->birth_date)->format('d F Y')}}</p>
                        <p class="mb-1 teks">@lang('lang.LinkedIn'): {{$user->linkedin_profile}}</p>
                        <p class="mb-1 teks">@lang('lang.Works')</p>
                        <ul class="ps-4">
                            @forelse ($user->works as $work)
                                <li class="teks">{{$work->work}}</li>
                            @empty
                                <li class="teks">@lang('lang.No works found.')</li>
                            @endforelse
                        </ul>

                        <p class="mb-2">@lang('lang.Visibility'): {{$user->visibility}}</p>

                        <form action="{{route('changeVisibility')}}" method="post">
                            @csrf
                            <button class="btn btn-primary" type="submit">@lang('lang.Change Visibility')</button>
                        </form>


                        <p class="mb-2">@lang('lang.Current Language') :
                            @if (session('locale') === 'en' || session('locale') == null)
                                @lang('lang.English')
                            @else
                                @lang('lang.Indonesian')
                            @endif
                        </p>

                        <a href="{{route('setLocale', ['language' => 'en'])}}" class="btn @if (session('locale') === 'en' || session('locale') == null) btn-primary @else btn-outline-primary @endif">@lang('lang.English')</a>
                        <a href="{{route('setLocale', ['language' => 'id'])}}" class="btn @if (session('locale') === 'id') btn-primary @else btn-outline-primary @endif">@lang('lang.Indonesian')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
