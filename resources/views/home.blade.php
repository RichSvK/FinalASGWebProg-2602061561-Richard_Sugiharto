@extends('layouts.app')

@section('title', __('lang.Home'))

@section('custom_css')
    <style>
        @media screen and (max-width: 900px){
            .teks {
                font-size: 0.6rem;
            }
        }

        p {
            word-wrap: break-word;
            white-space: normal;
            overflow-wrap: break-word;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="justify-content-center my-3 px-0">
            <form class="d-flex px-5 w-100" role="search" method="GET">
                <input class="form-control me-2" type="search" placeholder="@lang('lang.Search Work / Profession')" aria-label="Search" name="search" value="{{request('search')}}">
                <select class="form-select me-2" aria-label="Gender filter" style="width: 100px;" name="gender">
                    <option value="all" @if(request('gender') === 'all') selected @endif>@lang('lang.All Gender')</option>
                    <option value="male" @if(request('gender') === 'male') selected @endif>@lang('lang.Male')</option>
                    <option value="female" @if(request('gender') === 'female') selected @endif>@lang('lang.Female')</option>
                </select>
            </form>
        </div>

        <div class="d-flex flex-wrap justify-content-center my-3">
            @forelse ($users as $user)
                <div class="col-5 col-md-3 border border-3 border-dark p-2 m-2 d-flex flex-column justify-content-between">
                    <div class="d-flex flex-column">
                        <div class="text-center">
                            <img src="{{asset('assets/' . $user->avatar)}}" alt="Profile" class="rounded-circle" style="width: 100px; height: 100px;">
                        </div>
                        <h5 class="text-center">{{$user->name}}</h5>
                        <p class="mb-1 teks">@lang('lang.Email'): {{$user->email}}</p>

                        <p class="mb-2 teks">@lang('lang.Gender'):
                            @if ($user->gender == 'Male')
                                @lang('lang.Male')
                            @else
                                @lang('lang.Female')
                            @endif
                        </p>

                        <p class="mb-1 teks">@lang('lang.LinkedIn'): {{$user->linkedin_profile}}</p>
                        <p class="mb-1 teks">@lang('lang.Works')</p>
                        <ul class="ps-3">
                            @forelse ($user->works as $work)
                                <li class="teks">{{$work->work}}</li>
                            @empty
                                <li class="teks">@lang('lang.No works found.')</li>
                            @endforelse
                        </ul>
                    </div>

                    <div class="d-flex justify-content-center align-self-end">
                        <form action="{{route('addFriend')}}" method="POST">
                            @csrf
                            <input type="hidden" name="friendId" value="{{$user->id}}">
                            <button type="submit" class="btn btn-dark"><i class="bi bi-hand-thumbs-up-fill"></i></button>
                        </form>

                        <a href="{{route('avatarGift', ['user' => $user])}}" class="btn btn-success ms-1"><i class="bi bi-plus-lg"></i></a>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">
                    @lang('lang.No users found.')
                </div>
            @endforelse
        </div>
        {{$users->links()}}
    </div>
@endsection
