@extends('layouts.main')
@section('content')

    <div
        class="w-[820px] h-[580px] relative bg-red-50 rounded-xl bg-[url({{asset("assets/audi-bg.jpg")}})] bg-center bg-cover mt-10 shadow-md shadow-gray-500">
        <form
            class="absolute -top-0  -left-1 w-3/4 h-full    rounded-xl bg-white  shadow-xl shadow-blue-50 px-8 flex flex-col items-center justify-center gap-4 "
            method="post"
            action="{{route('register_proceed')}}"
            enctype="multipart/form-data"
        >
            @csrf
            <h2 class="text-2xl text-blue-500 font-semibold">@lang('profile.registerTitle')</h2>
            <div class="w-full">
                <label for="email"
                       class="block text-sm/6 font-medium text-gray-900">Email</label>
                <div class="mt-2">
                    <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300">

                        <input type="email"
                               name="email"
                               id="email"
                               class="block flex-1 border-0 bg-transparent py-1.5 pl-4 text-gray-900 placeholder:text-gray-400  sm:text-sm/6"
                               placeholder="johndoe@gmail.com"
                               value="{{old('email')}}"
                        />
                    </div>
                    @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="w-full">
                <label for="fullName"
                       class="block text-sm/6 font-medium text-gray-900">@lang('profile.fullName')</label>
                <div class="mt-2">
                    <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300">

                        <input type="text" name="fullName" id="fullName"
                               class="block flex-1 border-0 bg-transparent py-1.5 pl-4 text-gray-900 placeholder:text-gray-400  sm:text-sm/6"
                               placeholder="John Doe"
                               value="{{old('fullName')}}"
                        />
                    </div>
                    @error('fullName')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="w-full flex justify-between items-center gap-2">

                <div class="w-1/2">
                    <label for="birthDate"
                           class="block text-sm/6 font-medium text-gray-900">@lang('profile.birthDate')</label>
                    <div class="mt-2">
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300">

                            <input type="date" name="birthDate" id="birthDate"
                                   value="{{old('birthDate')}}"
                                   class="block flex-1 border-0 bg-transparent py-1.5 pl-4 text-gray-900 placeholder:text-gray-400  sm:text-sm/6"
                            />
                        </div>
                        @error('birthDate')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="w-1/2">
                    <label for="avatar"
                           class="block text-sm/6 font-medium text-gray-900">@lang('profile.avatar')</label>
                    <input type="file" name="avatar" id="avatar" class="hidden">
                    <div class="w-full">

                        <button type="button"
                                onclick="document.getElementById('avatar').click();"
                                class="w-full mt-2 bg-blue-500 text-white rounded-md  px-2.5 py-1.5 text-sm font-semibold  shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-blue-400">
                            @lang('actions.avatar')
                        </button>
                    </div>
                    @error('avatar')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="w-full">
                <label for="password"
                       class="block text-sm/6 font-medium text-gray-900">@lang('profile.password')</label>
                <div class="mt-2">
                    <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300">

                        <input type="password" name="password" id="password"
                               class="block flex-1 border-0 bg-transparent py-1.5 pl-4 text-gray-900 placeholder:text-gray-400  sm:text-sm/6"
                               placeholder="********"/>
                    </div>
                </div>
                @error('password')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" value=@lang('actions.signup')
                   class="bg-blue-500 text-white font-semibold rounded w-full p-1.5 mt-4 cursor-pointer hover:bg-blue-400">
            <p class="w-full text-sm text-slate-600 text-left mb-4">@lang('actions.haveAccount') <a
                    class="text-blue-500 underline ml-2" href="{{route('login')}}">@lang('actions.signin')</a></p>
        </form>
    </div>
@endsection
