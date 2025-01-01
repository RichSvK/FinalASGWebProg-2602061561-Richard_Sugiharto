@extends('layouts.app')

@section('title', 'Avatar')

@section('content')
    <div class="d-flex flex-wrap justify-content-center my-3">
        @forelse ($avatars as $avatar)
            <div class="col-5 col-md-3 border border-3 border-dark p-2 m-2 d-flex flex-column justify-content-between">
                <div class="d-flex flex-column">
                    <div class="text-center">
                        <img src="{{asset('assets/' . $avatar->avatar)}}" alt="Profile" class="rounded-circle" style="width: 100px; height: 100px;">
                    </div>
                    <h5 class="text-center">{{$avatar->name}}</h5>
                    <h6 class="text-center">{{$avatar->price}} Coin</h6>

                    @if ($avatar->userId == null || $avatar->userId != Auth::id())
                        <form action="{{route('buyAvatar')}}" method="POST" class="d-flex justify-content-center">
                            @csrf
                            <input type="hidden" name="avatarId" value="{{$avatar->id}}">
                            <button type="submit" class="btn btn-dark">Buy</i></button>
                        </form>
                    @else
                        @if ($avatar->id == Auth::user()->avatar_profile)
                            <form action="{{route('unequipAvatar')}}" method="POST" class="d-flex justify-content-center">
                                @csrf
                                <input type="hidden" name="avatarId" value="{{$avatar->id}}">
                                <button type="submit" class="btn btn-primary">Unequip</i></button>
                            </form>
                        @else
                            <form action="{{route('equipAvatar')}}" method="POST" class="d-flex justify-content-center">
                                @csrf
                                <input type="hidden" name="avatarId" value="{{$avatar->id}}">
                                <button type="submit" class="btn btn-dark">Equip</i></button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        @empty
            <div class="alert alert-danger">
                No avatar found.
            </div>
        @endforelse
    </div>
@endsection
