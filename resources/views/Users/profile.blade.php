@extends('layouts.main')



@section('content')

        <div class="pt-10 flex flex-col justify-center items-center">
            <h2 class="text-3xl font-semibold text-center mb-8 text-blue-500">@lang('profile.title')</h2>
            <div class="flex gap-6 w-[720px]  py-4 px-6 rounded-xl shadow-lg border shadow-gray-400">
                <div
                    class="w-1/3 bg-[url({{asset('assets/userAvatars/'.$user['avatar'])}})] h-48 bg-center bg-cover border flex items-center justify-center rounded-full">
                </div>
                <div class="w-2/3 flex flex-col gap-4">
                    <p class="flex justify-between">
                        <span class="font-semibold">ID:</span> {{$user['id']}}
                    </p>
                    <p class="flex justify-between">
                        <span class="font-semibold">Email:</span> {{$user['email']}}
                    </p>
                    <p class="flex justify-between">
                        <span class="font-semibold">@lang('profile.fullName'):</span> {{$user['fullName']}}
                    </p>
                    <p class="flex justify-between">
                        <span class="font-semibold">@lang('profile.birthDate'):</span> {{$user['birthDate']}}
                    </p>
                    <p class="flex justify-between">
                        <span class="font-semibold">@lang('profile.role'):</span>
                        @if($user['isAdmin'] === 1)
                            <span
                                class="inline-flex items-center rounded-md bg-amber-50 px-2 py-1  font-medium text-amber-700 ring-1 ring-inset ring-amber-700/10">Admin</span>
                        @else
                            <span
                                class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1  font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">User</span>
                        @endif
                    </p>
                    <div class="w-full flex gap-6 items-center mt-10">
                        <a href="#" class="btn">@lang('actions.edit')</a>
                        <a href="#" class="btn">@lang('actions.delete')</a>
                    </div>
                </div>
            </div>
            <div class="py-10 text-sm">
                @forelse($user->rents as $rent)
                    <p>{{$rent->user}}</p>
                    <p>{{$rent}}</p>
                @empty
                    <p>no rents yet</p>
                @endforelse
            </div>


@endsection
