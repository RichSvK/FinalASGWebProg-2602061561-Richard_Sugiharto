@extends('layouts.app')

@section('title', 'Friend Request')

@section('content')
    <div class="container">
        <h2 class="text-center mt-4">Friend Request</h2>

        <ul class="list-group d-flex flex-column justify-content-center align-items-center">
            @forelse ($friend_requests as $request)
                <li class="list-group-item d-flex justify-content-between align-items-center border-2 border-dark my-2" style="max-width: 500px; width: 75%">
                    <div class="d-flex flex-column">
                        <p class="mb-1 fs-6">{{$request->name}}</p>
                        <p class="mb-1 fs-6">{{$request->email}}</p>
                    </div>

                    <form action="{{route('cancelFriendRequest')}}" method="POST" class="d-flex justify-content-center align-items-center">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="request_id" value="{{$request->id}}">
                        <button type="submit" class="btn btn-danger"><i class="bi bi-x"></i></button>
                    </form>
                </li>
            @empty
                <div class="alert alert-danger">
                    No friend request found.
                </div>
            @endforelse
        </ul>
    </div>
@endsection
