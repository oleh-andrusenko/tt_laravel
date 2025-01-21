@extends('layouts.main')



@section('content')
    @if(auth('web')->user()->id === $user['id'])
        <div class="pt-10 flex flex-col justify-center items-center">
            <h2 class="text-3xl font-semibold text-center mb-8 text-blue-500">@lang('profile.title')</h2>
            <div class="flex gap-6 w-[600px]  py-4 px-6 rounded-xl shadow-lg border shadow-gray-400">
                <div
                    class="w-1/3 px-4 bg-[url({{asset('assets/userAvatars/'.$user['avatar'])}})] h-48 bg-center bg-cover border flex items-center justify-center rounded-full">
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
            <div
                class="py-6 {{count($rents) !== 0 ? 'px-6' : 'w-[600px]'}} bg-white mt-10 shadow-lg rounded-lg shadow-gray-500">
                <h2 class="text-3xl font-semibold text-center text-blue-500 py-8">@lang('profile.rentHistory')</h2>

                <table class="text-sm">
                    @if(count($rents))
                        <tr>

                            <th>
                                @lang('profile.car')
                            </th>
                            <th>
                                @lang('profile.startDate')
                            </th>
                            <th>
                                @lang('profile.endDate')
                            </th>
                            <th>
                                @lang('profile.duration')
                            </th>
                            <th>
                                @lang('profile.price')
                            </th>

                            <th>@lang('profile.payment')</th>
                            <th>@lang('profile.rentStatus')</th>
                        </tr>
                    @endif
                    @forelse($rents as $rent)
                        <tr class="*:text-center">

                            <td>
                                {{$rent->brand}} {{$rent->model}} {{$rent->year}}
                            </td>
                            <td>
                                {{$rent->start}}
                            </td>
                            <td>
                                {{$rent->end}}
                            </td>
                            <td>
                                {{$rent->duration}}
                            </td>
                            <td>
                                ${{$rent->price}}
                            </td>
                            <td>

                                @if($rent->paymentStatus === 'pending')
                                    <span
                                        class="inline-flex items-center rounded-md bg-violet-50 px-2 py-1 text-[10px] font-medium text-violet-700 ring-1 ring-inset ring-violet-700/10">
                                        @lang('statuses.pending')
                                    </span>
                                @elseif($rent->paymentStatus === 'success')
                                    <span
                                        class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-[10px] font-medium text-green-700 ring-1 ring-inset ring-green-700/10">
                                        @lang('statuses.success')
                                    </span>
                                @elseif($rent->paymentStatus === 'rejected')
                                    <span
                                        class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-[10px] font-medium text-red-700 ring-1 ring-inset ring-red-700/10">
                                        @lang('statuses.rejected')
                                    </span>
                                @endif
                            </td>
                            <td>

                                @if($rent->rentStatus === 'ended')
                                    <span
                                        class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-[10px] font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                        @lang('statuses.ended')
                                    </span>
                                @elseif($rent->rentStatus === 'not started')
                                    <span
                                        class="inline-flex items-center rounded-md bg-amber-50 px-2 py-1 text-[10px] font-medium text-amber-700 ring-1 ring-inset ring-amber-700/10">
                                        @lang('statuses.notStarted')
                                    </span>
                                @elseif($rent->rentStatus === 'started')
                                    <span
                                        class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-[10px] font-medium text-green-700 ring-1 ring-inset ring-green-700/10">
                                        @lang('statuses.started')
                                    </span>
                                @endif
                            </td>
                        </tr>

                    @empty
                        <p class="text-slate-400 text-center">Here will appear the rent history of your account...</p>

                    @endforelse


                </table>

            </div>
            @else
                It is not your profile
        {{redirect()->route('cars.index')}}
    @endif
@endsection
