@extends('layouts.main')

@section('title', "Add a review of $car->model | RentaCar")
@section('content')
    <div class="w-[700px] py-6 px-2 rounded-lg border mt-6">
        <h1 class="text-2xl my-2 text-center mb-4 text-blue-700 font-semibold border-b pb-2">Add a review</h1>
        <div class="flex gap-4 items-center">
           <div>
               <div
                   class="w-[250px] h-[250px] bg-[url({{asset('assets/carsPreviews/'.$car['preview_photo'])}})] bg-center bg-cover rounded ">
               </div>
               <p class="text-xl font-semibold text-center text-gray-800">{{$car->model}}, {{$car->year}}</p>
           </div>

            <form method="POST" action="{{route('reviews.store', $car)}}" class="w-full flex flex-col gap-4 px-2">
                @csrf
                <p>Rating:</p>
                <select name="rating" id="rating" class="rounded border px-2 py-1.5">
                    @for($i=1; $i <= 5; $i++)
                        <option class="px-2 py-1" value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <p>Review:</p>
                <textarea name="review" id="review" class="rounded border px-2 py-1.5" cols="30" rows="10"></textarea>
                <button type="submit" class="border-2 bg-green-500 text-white border-green-500 rounded-lg px-2 py-1.5 hover:bg-white hover:text-green-500">Add review</button>
            </form>
        </div>
    </div>
@endsection
