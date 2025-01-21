@extends('layouts.main')
@section('title')
    List of cars
@endsection


@section('content')
    @csrf
    <div class="px-14 py-8">
        <div class="my-2 flex justify-end">
            <a href="{{route('cars.create')}}" class="py-1.5 px-4 bg-green-600 rounded text-white">+ Add car</a>
        </div>
        <table>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Year</th>
            <th>Mileage</th>
            <th>Engine</th>
            <th>Transmission</th>
            <th>Likes</th>
            <th>Description</th>
            <th>Status</th>
            <th >Actions</th>
            @forelse($cars as $car)
                <tr>
                    <td>{{$car->id}}</td>
                    <td>{{$car->brand}}</td>
                    <td>{{$car->model}}</td>
                    <td>{{$car->year}}</td>
                    <td>{{$car->mileage}}&nbsp;km</td>
                    <td>{{$car->engine}}</td>
                    <td>{{$car->transmission}}</td>
                    <td>{{$car->likes}}</td>
                    <td class="text-left">
                        @if(!empty($car->description))
                            {{$car->description}}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if($car->inRent)
                            <span
                                class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-[10px] font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">In rent</span>
                        @else
                            <span
                                class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-[10px] font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Free</span>
                        @endif
                    </td>
                    <td class="flex gap-2">
                        <a href="#" class="flex justify-center items-center w-8 h-8  p-1.5 border-2 border-blue-500 rounded text-blue-500 font-medium hover:bg-blue-500 hover:text-white">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <a class="flex justify-center items-center w-8 h-8  p-1.5 border-2 border-red-500 rounded text-red-500 font-medium hover:bg-red-500 hover:text-white"
                           href="{{route('cars.destroy', $car['id'])}}">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                        @if($car['inRent'])
                            <a class="flex justify-center items-center w-8 h-8  p-1.5 border-2 border-amber-500 rounded text-amber-500 font-medium hover:bg-amber-500 hover:text-white"
                               href="{{route('cars.release', $car['id'])}}">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                        @endif
                        <a class="flex justify-center items-center w-8 h-8  p-1.5 border-2 border-green-500 rounded text-green-500 font-medium hover:bg-green-500 hover:text-white"
                           href="{{route('cars.show', $car['id'])}}">
                            <i class="fa-solid fa-car"></i>
                        </a>
                    </td>


                </tr>
            @empty
                <tr>
                    <td colspan="11">
                        No cars yet...
                    </td>
                </tr>
            @endforelse
        </table>

    </div>
@endsection
