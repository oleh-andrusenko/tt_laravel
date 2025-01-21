@extends('layouts.main')



@section('content')

    @auth('web')
        @if(auth('web')->user()->isAdmin)
            <table>
                <tr>
                    <td>ID</td>
                    <td>Email</td>
                    <td>Full name</td>
                    <td>Birth date</td>
                    <td>Administrator</td>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user['id']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['fullName']}}</td>
                        <td>{{$user['birthDate']}}</td>
                        <td>{{$user['isAdmin']}}</td>
                    </tr>
                @endforeach

            </table>
        @endif
    @endauth
@endsection
