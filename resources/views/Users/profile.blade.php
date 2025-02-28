@extends('layouts.main')

@section('content')
    <div
        class="w-2/3 pt-10 flex flex-col justify-center items-center rounded-xl shadow-lg border shadow-gray-400 px-6 py-4">
        <h2 class="my-2 text-xl font-semibold text-blue-700 ">@lang('profile.title')</h2>
        <div class="flex gap-4 w-full ">
            <div class="w-1/4 flex items-center justify-center border-r-2">
                <div
                    class="w-48 bg-[url({{asset('assets/userAvatars/'.$user['avatar'])}})] h-48 bg-center bg-cover flex items-center justify-center rounded-full">
                </div>
            </div>
            <div class="w-3/4 flex flex-col gap-4">
                <div class="w-2/3 flex flex-col gap-3">
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
                    <p class="flex justify-between text-slate-600 text-sm">
                        Registered at {{$user->created_at->format('M j, Y')}}
                        <br>
                        {{count($user->rents)}} rents, {{count($user->reviews)}} reviews
                    </p>
                </div>

                <div class="w-full flex gap-6 items-center mt-10">
                    <a href="#" class="btn">@lang('actions.edit')</a>
                    <a href="#" class="btn">@lang('actions.delete')</a>
                </div>
            </div>
        </div>

    </div>
    <div class="w-2/3 rounded-xl shadow-lg border shadow-gray-400 px-6 py-4 text-sm mt-6">
        <h2 class="my-2 text-xl font-semibold text-blue-700 text-center">Your rents history</h2>
        <ul>
            @forelse($user->rents as $rent)
                <x-rent-tile :rent="$rent"/>
            @empty
                <li class="w-full mx-auto text-lg text-slate-700">No rents yet...</li>
            @endforelse
        </ul>
    </div>

@endsection
