@extends('layouts.main')



@section('content')
    <div
        class="w-2/3 pt-10 flex flex-col justify-center items-center rounded-xl shadow-lg border shadow-gray-400 px-6 py-4">
        <h2 class="my-2 text-xl font-semibold text-blue-700">@lang('profile.title')</h2>
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
                        {{count($user->rents)}} rents created
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
        <h2 class="my-2 text-xl font-semibold text-blue-700">Your rents history</h2>
        <ul>
            @forelse($user->rents as $rent)

                <li class="flex gap-6 border-b-2 py-6">
                    <p>Rent ID: {{$rent->id}}</p>
                    <div class="flex flex-col gap-2">
                        <a href="{{route('cars.show', $rent->car->id)}}" class="link"> {{$rent->car->model}}, {{$rent->car->year}}</a>
                        <div
                            class="h-[100px] w-[200px] aspect-auto bg-[url({{asset('assets/carsPreviews/'.$rent->car->preview_photo)}})] bg-cover bg-center rounded-md"
                            alt="Preview of {{$rent->car->model}}"></div>

                    </div>


                    <div class="flex flex-col items-center gap-1">
                        <p class="font-semibold text-blue-700 uppercase">Start</p>
                        <p>{{$rent->start}}</p></div>
                    <div class="flex flex-col items-center gap-1">
                        <p class="font-semibold text-blue-700 uppercase">End</p>
                        <p>{{$rent->end}}</p>
                    </div>
                    <div class="flex flex-col items-center gap-1">
                        <p class="font-semibold text-blue-700 uppercase">Duration</p>
                        <p>{{$rent->duration}} day(s)</p></div>
                    <div class="flex flex-col items-center gap-1">
                        <p class="font-semibold text-blue-700 uppercase">Rent price</p>
                        <p>${{number_format($rent->price)}}</p></div>
                    <div class="flex flex-col items-center gap-1">
                        <p class="font-semibold text-blue-700 uppercase">Payment status</p>
                        <p>{{$rent->paymentStatus}}</p></div>
                    <div class="flex flex-col items-center gap-1">
                        <p class="font-semibold text-blue-700 uppercase">Rent status</p>
                        <p>{{$rent->rentStatus}}</p></div>


                </li>

            @empty
                <li>no rents yet</li>
            @endforelse
        </ul>
    </div>

@endsection
