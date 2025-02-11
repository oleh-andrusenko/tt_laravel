@extends('layouts.main')


@section('content')
    <div class="w-3/4 flex flex-col items-center">
        <div class="w-full flex items-center justify-between py-2">
            <h1 class="my-4 font-semibold text-left">Cars list</h1>
            <a href="{{route('cars.create')}}" class="text-green-700 px-3">+ Add car</a>
        </div>
        <p class="w-full text-[12px] mb-2 text-slate-600">Cars in database: {{count($cars)}}</p>
        <div class="w-full flex flex-col gap-4 ">
            @forelse($cars as $car)
                <x-car-record-component :car="$car"/>
            @empty
                <p>No cars yet...</p>
            @endforelse
        </div>


    </div>
@endsection

