@extends('layouts.app')

@section('title', __('lang.Friend'))

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
    <h2 class="text-center mt-4">@lang('lang.Friend')</h2>
    <div class="d-flex flex-wrap justify-content-center my-3">
        @forelse ($users as $user)
            <div class="col-12 col-md-3 border border-3 border-dark p-2 m-2 d-flex flex-column justify-content-between">
                <div class="d-flex flex-column">
                    <div class="text-center">
                        <img src="{{asset('assets/' . $user->avatar)}}" alt="Profile" class="rounded-circle" style="width: 100px; height: 100px;">
                    </div>
                    <h5 class="text-center">{{$user->name}}</h5>
                    <p class="mb-1 teks">@lang('lang.Email'): {{$user->email}}</p>

                    <p class="mb-1 teks">@lang('lang.Gender'):
                        @if ($user->gender == 'Male')
                            @lang('lang.Male')
                        @else
                            @lang('lang.Female')
                        @endif
                    </p>

                    <p class="mb-1 teks">@lang('lang.LinkedIn'): {{$user->linkedin_profile}}</p>
                    <p class="mb-1 teks">@lang('lang.Works')</p>
                    <ul>
                        @forelse ($user->works as $work)
                            <li>{{$work->work}}</li>
                        @empty
                            <li class="teks">@lang('lang.No works found.')</li>
                        @endforelse
                    </ul>
                </div>

                <form action="{{route('unfriend')}}" method="POST" class="d-flex justify-content-center align-self-end">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="friendId" value="{{$user->id}}">
                    <button type="submit" class="btn btn-dark"><i class="bi bi-x"></i></button>
                </form>
            </div>
        @empty
            <div class="alert alert-danger">
                @lang('lang.No friends found.')
            </div>
        @endforelse
    </div>
    {{$users->links()}}
@endsection
