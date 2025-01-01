@extends('layouts.app')

@section('title', 'Avatar Gift')

@section('content')
    <div class="container">
        <h3 class="text-center mt-5">Give Avatar to {{$user->name}}</h1>
        <div class="d-flex flex-wrap justify-content-center my-3">
            @forelse ($avatars as $avatar)
                <div class="col-5 col-md-3 border border-3 border-dark p-2 m-2 d-flex flex-column justify-content-between">
                    <div class="d-flex flex-column">
                        <div class="text-center">
                            <img src="{{asset('assets/' . $avatar->avatar)}}" alt="Profile" class="rounded-circle" style="width: 100px; height: 100px;">
                        </div>
                        <h5 class="text-center">{{$avatar->name}}</h5>
                        <h6 class="text-center">{{$avatar->price}} Coin</h6>

                        <form action="{{route('giveAvatar', ['user' => $user->id, 'avatar' => $avatar->id])}}" method="POST" class="d-flex justify-content-center">
                            @csrf
                            <button type="submit" class="btn btn-dark">Buy</i></button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">
                    No avatar found.
                </div>
            @endforelse
        </div>
    </div>
@endsection
