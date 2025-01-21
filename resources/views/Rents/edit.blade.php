@extends('layouts.main')

@section('title')
    Editing of  rent {{$rent->id}}
@endsection



@section('content')

    <form action="{{route('rents.update', $rent->id)}}" method="POST" class="py-10 px-6 rounded shadow-xl">
        @csrf
        <div class="flex gap-4 text-slate-500 text-sm">
            <p>Rent ID: {{$rent->id}}</p>
            <p>Car ID: {{$rent->carId}}</p>
        </div>

        <div class="flex gap-4 items-center">
            <p>User email</p>
            <input class="p-1.5 border rounded" type="text" name="userEmail" id="userEmail"
                   value="{{$rent->userEmail}}">
        </div>
        <div class="flex flex-col mb-4 gap-4 text-slate-500 text-sm">
            <p>Start date: {{$rent->start}}</p>
            <p>End date: {{$rent->end}}</p>
        </div>
        <div class="flex gap-4 text-slate-500 text-sm">
            <p>Duration: {{$rent->duration}} day(s)</p>
            <p>Price: ${{$rent->price}}</p>
        </div>
        <div class="flex gap-4 items-center">
            <p class="w-1/3">Payment status</p>

            <select class="w-2/3" name="paymentStatus" id="paymentStatus">
                <option {{$rent->paymentStatus === 'success' ? 'selected' : ''}}  value="success">Success</option>
                <option {{$rent->paymentStatus === 'rejected' ? 'selected' : ''}} value="rejected">Rejected</option>
                <option {{$rent->paymentStatus === 'pending' ? 'selected' : ''}}  value="pending">Pending</option>
            </select>
        </div>

        <div class="flex gap-4 items-center">
            <p class="w-1/3">Rent status</p>

            <select class="w-2/3" name="rentStatus" id="rentStatus">
                <option {{$rent->rentStatus === 'started' ? 'selected' : ''}}  value="started">Started</option>
                <option {{$rent->rentStatus === 'not started' ? 'selected' : ''}} value="not started">Not started
                </option>
                <option {{$rent->rentStatus === 'ended' ? 'selected' : ''}}  value="ended">Ended</option>
            </select>
        </div>
        <div>
            <input class="w-full px-2 py-1 mt-4 bg-blue-500 border-2 border-blue-500 text-white rounded flex items-center justify-center hover:text-blue-500 hover:bg-white cursor-pointer" type="submit" value="Save">
        </div>


    </form>

@endsection
