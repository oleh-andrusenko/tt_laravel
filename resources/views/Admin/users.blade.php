@extends('layouts.main')



@section('content')
    <div>
       <div class="flex items-center justify-between">
           <h1 class="my-4 font-semibold text-left">Users list</h1>
           <a href="{{route('register')}}" class="text-green-700 px-3">+ Add new user</a>
       </div>
        <p class="w-full text-[12px] mb-2 text-slate-600">Users in database: {{count($users)}}</p>
        <table>
            <thead>
                <th>ID</th>
                <th>Avatar</th>
                <th>Email</th>
                <th>Full name</th>
                <th>Birth date</th>
                <th>Administrator</th>
                <th>Created at</th>
                <th>Reviews</th>
                <th>Rents</th>
                <th>Actions</th>
            </thead>
            @foreach($users as $user)
                <tr>
                    <td>{{$user['id']}}</td>
                    <td>
                        <div
                            class="bg-[url({{asset('assets/userAvatars/'.$user['avatar'])}})] h-10 w-10 bg-center bg-cover rounded-full">
                        </div>
                    </td>
                    <td class="text-left">{{$user->email}}</td>
                    <td class="text-left">{{$user->fullName}}</td>
                    <td>{{$user->birthDate}}</td>
                    <td>{{$user->isAdmin ? '[Administrator]' : 'User'}}</td>
                    <td>{{$user->created_at->format('M j, Y')}}</td>
                    <td>{{count($user->reviews)}}</td>
                    <td>{{count($user->rents)}}</td>
                    <td class="flex justify-between items-center gap-4">
                        <a href='#' class="link">Edit</a>
                        <a href='#' class="link">Delete</a>
                    </td>
                </tr>
            @endforeach

        </table>

    </div>
@endsection
