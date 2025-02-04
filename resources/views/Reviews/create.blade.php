@extends('layouts.main')

@section('title', "Add a review of $car->model | RentaCar")
@section('content')
    <div class="py-6 px-4">
        <h1 class="text-2xl my-6 text-blue-700 font-semibold">Add a review of {{$car->model}}, {{$car->year}}</h1>
        <div class="flex gap-4">
            <div
                class="w-[250px] h-[250px] bg-[url({{asset('assets/carsPreviews/'.$car['preview_photo'])}})] bg-center bg-cover rounded ">
            </div>
            <form method="POST" action="{{route('reviews.store', $car)}}" class="flex flex-col gap-4 px-6 py-4">
                @csrf
                <p>Rating:</p>
                <select name="rating" id="rating">
                    @for($i=1; $i <= 5; $i++)
                        <option class="px-2 py-1" value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <p>Review:</p>
                <textarea name="review" id="review" cols="30" rows="10"></textarea>
                <button type="submit">Add review</button>
            </form>
        </div>
    </div>
@endsection
