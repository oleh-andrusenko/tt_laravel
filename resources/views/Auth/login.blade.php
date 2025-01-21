@extends('layouts.main')
@section('content')

    <div class="w-[820px] h-[500px] relative bg-red-50 rounded-xl bg-[url({{asset("assets/audi-bg-2.jpg")}})] bg-center bg-cover mt-10 shadow-md shadow-gray-500">
        <form class="absolute -top-0  -right-1 w-1/2 h-full    rounded-xl bg-white  shadow-md shadow-blue-50 px-8 flex flex-col items-center justify-center gap-4 "
              method="post"
              action="{{route('login_proceed')}}">
            @csrf
            <h2 class="text-2xl text-blue-500 font-semibold">@lang('profile.loginTitle')</h2>
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
                <label for="password"
                       class="block text-sm/6 font-medium text-gray-900">@lang('profile.password')</label>
                <div class="mt-2">
                    <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300">

                        <input type="password" name="password" id="password"
                               class="block flex-1 border-0 bg-transparent py-1.5 pl-4 text-gray-900 placeholder:text-gray-400  sm:text-sm/6"
                               placeholder="********"/>

                    </div>
                    @error('password')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <input type="submit" value=@lang('actions.signin') class="bg-blue-500 text-white font-semibold rounded w-full p-1.5 mt-4 cursor-pointer hover:bg-blue-400">
            <p class="w-full text-sm text-slate-600 text-left mb-4">@lang('actions.account') <a class="text-blue-500 underline ml-2" href="{{route('register')}}">@lang('actions.create')</a></p>
        </form>
    </div>
@endsection
