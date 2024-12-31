@extends('layouts.app')

@section('content')
    <div class="justify-content-center my-3 px-0">
        <form class="d-flex px-5 w-100" role="search" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search Work / Profession" aria-label="Search" name="search">
            <select class="form-select me-2" aria-label="Gender filter" style="width: 100px;" name="gender">
                <option value="all" @if(request('gender') === 'all') selected @endif>All Gender</option>
                <option value="male" @if(request('gender') === 'male') selected @endif>Male</option>
                <option value="female" @if(request('gender') === 'female') selected @endif>Female</option>
            </select>
        </form>
    </div>

    <div class="d-flex flex-wrap justify-content-center my-3">
        @forelse ($users as $user)
            <div class="col-12 col-md-3 border border-3 border-dark p-2 m-2 d-flex flex-column justify-content-between">
                <div class="d-flex flex-column">
                    <div class="text-center">
                        <img src="{{asset('assets/' . $user->avatar_profile)}}" alt="Profile" class="rounded-circle" style="width: 100px; height: 100px;">
                    </div>
                    <h5 class="text-center">{{$user->name}}</h5>
                    <p class="mb-1">Email: {{$user->email}}</p>
                    <p class="mb-1">Gender: {{$user->gender}}</p>
                    <p class="mb-1">Works</p>
                    <ul>
                        @forelse ($user->works as $work)
                            <li>{{$work->work}}</li>
                        @empty
                            <li>No works found.</li>
                        @endforelse
                    </ul>
                </div>

                <form action="" method="POST" class="d-flex justify-content-center align-self-end">
                    @csrf
                    <button type="submit" class="btn btn-dark"><i class="bi bi-hand-thumbs-up"></i></button>
                </form>
            </div>
        @empty
            <div class="alert alert-danger">
                No users found.
            </div>
        @endforelse

    </div>
@endsection
