@extends('layouts.main')
@section('title')
    Rent a {{$car['brand'].' '.$car['model'].' '.$car['year']}}
@endsection
@section('content')
    <main class="flex justify-center items-center py-16 ">
        <div
            class="w-[300px] h-[300px]  px-6 py-2 border-l-2 border-t-2 border-b-2 bg-white rounded-l *:py-2 flex flex-col  justify-center  border-slate-300 shadow-xl">

            <div class="h-24 bg-[url({{asset('assets/carsPreviews/'.$car->preview)}})] bg-center bg-cover"></div>

            <p class="text-lg text-blue-500 font-semibold"><?= $car['brand'] . ' ' . $car['model'] . ' ' . $car['year'] ?></p>
            <p><span class="font-semibold">Engine:</span>
                {{$car['engine']}}
            </p>
            <p><span class="font-semibold">Transmission:</span>
                {{$car['transmission']}}
            </p>
            <p><span class="font-semibold">Mileage:</span>
                {{number_format($car['mileage'])}} km
            </p>
            <p>
                <span class="font-semibold">Price per day:</span>
                <span id="pricePerDay"> $<?= $car['price'] ?></span>
            </p>


        </div>
        <form method='post'
              action="{{route('cars.rent_proceed', $car['id'])}}"
              class="w-[500px] rounded-lg shadow-xl px-4 py-6 border-2 border-slate-400 flex flex-col gap-4">
            @csrf
            <p class="text-center text-2xl my-2 font-semibold text-blue-500 uppercase">Rent car</p>
            <div class="flex justify-between items-center gap-4">
                <p class="font-semibold w-1/3">Start date</p>
                <input class="border-2 rounded-md w-2/3"
                       type="date"
                       min="<?= date('Y-m-d') ?>"
                       name="startDate"
                       id="startDate"
                >

            </div>
            @error('startDate')
            <p class="text-[10px] text-red-400">
                {{$message}}
            </p>
            @enderror
            <div class="flex justify-between items-center gap-4">
                <p class="font-semibold w-1/3">End date</p>
                <input class="border-2 rounded-md w-2/3"
                       type="date"
                       min="<?= date('Y-m-d') ?>" name="endDate" id="endDate">

            </div>
            @error('endDate')
            <p class="text-[10px] text-red-400">
                {{$message}}
            </p>
            @enderror


            <div class="flex gap-5 items-center justify-between py-4 px-10 rounded border text-sm">
                <p>Days: <span class="px-4 py-2 bg-blue-500 text-white rounded font-semibold ml-4"
                               id="rentDays">-</span>
                </p>

                <p>Price: <span class="px-4 py-2 bg-blue-500 text-white rounded font-semibold ml-4"
                                id="rentPrice">-</span>
                </p>


            </div>
            <input hidden="hidden" type="number" name="carPrice" id="carPrice" value="{{$car->price}}">
            <input hidden="hidden" type="number" name="duration" id="duration">
            <input hidden="hidden" type="number" name="price" id="price">


            <div>
                <input
                    class="w-full text-center bg-blue-500 rounded-lg text-white px-2 py-1 mt-6 border-2 border-blue-500 hover:bg-white hover:text-blue-400 cursor-pointer"
                    type="submit"
                    value="Rent">
            </div>

        </form>


        <div
            class="w-[300px] h-[300px] px-6 py-2  flex flex-col items-center justify-center  border-r-2 border-t-2 border-b-2  border-slate-300 rounded-r shadow-xl ">
            <h4 class="w-full text-xl  font-bold text-center mb-4"> Rent discounts</h4>
            <p class="text-lg text-blue-500 font-semibold mb-4">Discount conditions:</p>
            <table class="mt-4">
                <tr>
                    <td class="pr-6 font-semibold">5+ days</td>
                    <td>5% off</td>
                </tr>
                <tr>
                    <td class="pr-6 font-semibold">10+ days</td>
                    <td>10% off</td>
                </tr>
                <tr>
                    <td class="pr-6 font-semibold">21+ days</td>
                    <td>25% off</td>
                </tr>
            </table>

        </div>
    </main>
@endsection
