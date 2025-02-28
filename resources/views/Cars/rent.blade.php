@extends('layouts.main')
@section('title')
    Rent a {{$car['brand'].' '.$car['model'].' '.$car['year']}}
@endsection
@section('content')
    <main class="w-2/4 flex flex-col justify-center items-center py-6">
        <div
            class="w-full  px-6 py-2 border-l-2 border-t-2 border-b-2 bg-white rounded-l *:py-2 flex flex-col  justify-center  border-slate-300 shadow-xl">
            <h2 class="my-2 text-xl font-semibold text-blue-700">Step 1. Check info about car</h2>
            <div
                class="h-[300px] bg-[url({{asset('assets/carsPreviews/'.$car->preview_photo)}})] bg-center bg-cover"></div>
            <p class="text-lg text-blue-500 font-semibold"><?= $car['model'] . ', ' . $car['year'] ?></p>
            <p><span class="font-semibold">Engine: </span>{{$car['engine']}}</p>
            <p><span class="font-semibold">Transmission:</span>
                {{$car['transmission']}}
            </p>
            <p><span class="font-semibold">Mileage:</span>
                {{number_format($car['mileage'])}} km
            </p>
            <p>
                <span class="font-semibold">Price per day:</span>
                <span id="pricePerDay"> $<?= $car['rent_price'] ?></span>
                <input type="hidden" id="rentPrice" name="rentPrice" value="<?=$car->rent_price?>">
                <input type="hidden" id="carID" name="carID" value="<?=$car->id?>">
            </p>
        </div>
        <div class="w-full mt-8 px-6 py-2 rounded-lg border-2 shadow-lg ">
            <h2 class="my-2 text-xl font-semibold text-blue-700">Step 2. Select free dates to rent</h2>
            <div id="calendar" class="w-3/4 py-10 mx-auto"></div>
            <p class="text-[12px] text-slate-600">Discounts: if rent duration more than 7 days you will get a 25%
                discount.</p>

        </div>
        <form
            method="post"
            action="{{route('cars.rent_proceed', $car)}}"
            class="w-full mt-8 px-6 py-2 rounded-lg border-2 shadow-lg">
            @csrf
            <h2 class="my-2 text-xl font-semibold text-blue-700">Step 3. Check rent info</h2>
            <p class="py-4 text-xl text-center text-gray-700" id="rent_warn">Choose correct dates to see info...</p>
            <div id="rent_info" hidden="hidden">
                <p class="py-1.5">
                    <i class="fa-regular fa-calendar-check icon"></i>
                    <span class="text-blue-700 font-semibold underline">Start date:</span>
                    <span id="start_date"></span>
                    <input type="date" hidden="hidden" name="start" id="start">
                </p>
                <p class="py-1.5 ">
                    <i class="fa-regular fa-calendar-xmark icon"></i>
                    <span class="text-blue-700 font-semibold underline">End date:</span>
                    <input type="date" name="end" hidden="hidden" id="end">
                    <span id="end_date"></span>
                </p>
                <p class="text-[12px] text-slate-600">Attention! Rent starts at 8:00 of chosen start date and ends at
                    23:59 of chosen end date.</p>
                <p class="py-1.5 mb-4">
                    <i class="fa-solid fa-chart-line icon"></i>
                    <span class="text-blue-700 font-semibold underline">Rent duration:</span>
                    <span id="dates_diff"></span>
                    <input type="number" hidden="hidden" id="duration" name="duration"/>
                </p>
                <p class="border-t-2 py-4 text-right">
                    <span class="font-semibold ">
                        Total price:
                    </span>
                    <span id="total_price" class="text-slate-700"></span>
                    <input  hidden="hidden" name="price" id="price"/>
                </p>
                <button type="submit" class="btn w-full">Proceed rent</button>
            </div>
        </form>


        <script>

            document.addEventListener('DOMContentLoaded', function () {
                const calendarEl = document.getElementById('calendar');
                const carId = $('#carID').val();
                const rentPrice = $('#rentPrice').val();
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridYear',
                    headerToolbar: {
                        start: '',
                        center: 'title',
                        end: ''
                    },
                    selectable: true,
                    events: 'http://localhost:8000/cars/' + carId + '/available',
                    eventBackgroundColor: '#E53E3E',
                    eventDisplay: 'background',
                    validRange: function (nowDate) {
                        return {
                            start: nowDate,
                            end: new Date('2025-12-31')
                        }
                    },
                    selectOverlap: function () {
                        $('#rent_info').hide();
                        $('#rent_warn').show();
                    },
                    select: function (event) {
                        $('#rent_info').show();
                        $('#rent_warn').hide();


                        $('#start_date').text(event.startStr);
                        $('#end_date').text(event.endStr);
                        $('#start').val(event.startStr);
                        $('#end').val(event.endStr);
                        let dateDiffInDays = Math.round(Math.abs((event.start - event.end) / (24 * 60 * 60 * 1000)));

                        let totalPrice = rentPrice * dateDiffInDays;
                        $('#dates_diff').text(dateDiffInDays + ' day(s)')
                        $('#duration').val(dateDiffInDays);
                        totalPrice = dateDiffInDays > 7 ? totalPrice - totalPrice * 0.25 : totalPrice;
                        $('#price').val(totalPrice);
                        $('#total_price').text(totalPrice.toLocaleString('en-US', {
                            style: 'currency',
                            currency: 'USD',
                        }));
                    }
                });
                calendar.render();
            });

        </script>
    </main>
@endsection
