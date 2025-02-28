<li class="w-full grid grid-cols-9 grid-rows-2 border-b-2 py-1.5 px-4 relative text-slate-800">
    <div class="col-span-2 row-start-1 row-span-2">
        <div class="h-[150px] bg-[url({{asset('assets/carsPreviews/'.$rent->car->preview_photo)}})] bg-center bg-cover rounded-lg"></div>
    </div>

    <p class="col-span-2 row-start-1 row-span-1">{{$rent->car->model}}, {{$rent->car->year}}</p>
    <p class="col-span-2 row-start-2 row-span-1">Price: ${{$rent->price}} for {{$rent->duration}} days</p>
    <p class="col-span-2 row-start-1 row-span-1">Rent starts at: {{$rent->start}}</p>
    <p class="col-span-2 row-start-1 row-span-1">Rent ends at: {{$rent->end}}</p>
    <div></div>
    <div></div>
</li>
