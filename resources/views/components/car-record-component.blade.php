<div class="px-4 py-2 border-2 rounded-lg flex gap-3 relative shadow-sm">
    <p>
    <div
        class="w-1/5 h-[150px] bg-[url({{asset('assets/carsPreviews/'.$car['preview_photo'])}})] bg-center bg-cover rounded ">
    </div>
    </p>
    <div class="w-3/5 grid grid-cols-3">
        <a href="{{route('cars.show', $car->id)}}"
           class="font-semibold text-xl col-span-2 row-span-1 hover:text-blue-700">{{$car->model}}, {{$car->year}}</a>
        <p class="text-sm text-gray-600 col-span-1">
            <span class="font-semibold">ID:</span> {{$car->id}}</p>
        <p>
            <i class="fa-solid fa-angles-right text-sm text-blue-700"></i>
            {{$car->mileage}} km</p>
        <p>
            <i class="fa-solid fa-bolt icon"></i>
            {{$car->engine}}</p>
        <p>
            <i class="fa-solid fa-gears icon"></i>
            {{$car->transmission}}, {{$car->drive}}</p>
        <p>
            <i class="fa-solid fa-car-side icon"></i>
            {{$car->body_type}}
        </p>
        <p class="col-span-2">
            <i class="fa-solid fa-money-bill-wave icon"></i>
            ${{$car->rent_price}}
        </p>
        <p class="text-[12px] text-gray-600">Rents: {{count($car->rents)}} </p>
        <p class="text-[12px] text-gray-600">Reviews: {{count($car->reviews)}}</p>
    </div>
    <p class="absolute bottom-4 right-6 text-sm text-gray-500">Created at: {{$car->created_at->format('M j, Y')}}</p>
    <p class="flex justify-between items-center gap-4 absolute top-3 right-6">
        <a href='{{route('cars.edit', $car->id)}}' class="link text-amber-600">Edit</a>
        <a href='{{route('cars.destroy', $car->id)}}' class="link text-red-600">Delete</a>
    </p>
</div>
