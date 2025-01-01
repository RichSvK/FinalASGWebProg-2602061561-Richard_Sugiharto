@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center">
        <div class="col-md-12 text-center mt-3 mb-3">
            <h1>User Profile</h1>
        </div>

        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body border border-3 border-dark rounded">
                    <div class="text-center mb-4">
                        <img src="{{asset('assets/' . $user->avatar)}}" alt="" class="rounded-circle" style="width: 100px; height: 100px;">
                        <h3 class="mt-3">{{$user->name}}</h3>
                    </div>

                    <p class="mb-2">Email: {{$user->email}}</p>
                    <p class="mb-2">Gender: {{$user->gender}}</p>
                    <p class="mb-2">Birth Date: {{\Carbon\Carbon::parse($user->birth_date)->format('d F Y')}}</p>
                    <p class="mb-1 teks">LinkedIn: {{$user->linkedin_profile}}</p>
                    <p class="mb-1 teks">Works</p>
                    <ul class="ps-4">
                        @forelse ($user->works as $work)
                            <li class="teks">{{$work->work}}</li>
                        @empty
                            <li class="teks">No works found.</li>
                        @endforelse
                    </ul>

                    <p class="mb-2">Visible: {{$user->visibility}}</p>

                    <form action="{{route('changeVisibility')}}" method="post">
                        @csrf
                        <button class="btn btn-primary" type="submit">Change Visibility</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
