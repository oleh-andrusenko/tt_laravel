@extends('layouts.main')
@section('title')
    List of rents
@endsection


@section('content')
<div class="text-3xl my-6 font-semibold text-blue-500 ">
    Rents list
</div>
    <table>
        <tr>
            <th>ID</th>
            <th>User email</th>
            <th>Car</th>


            <th>Rent start</th>
            <th>Rent end</th>
            <th>Price</th>
            <th>Duration</th>
            <th>Payment status</th>
            <th>Rent status</th>
            <th>Created at</th>
            <th></th>
        </tr>
        @foreach($rents as $rent)
            <tr>
                <td>{{$rent->id}}</td>
                <td class="font-normal">{{$rent->userEmail}}</td>
                <td class="text-left">{{$rent->brand.' '.$rent->model.' '.$rent->year}}</td>

                
                <td>{{$rent->start}}</td>
                <td>{{$rent->end}}</td>
                <td>${{$rent->price}}</td>
                <td>{{$rent->duration}}</td>
                <td>

                    @if($rent->paymentStatus === 'pending')
                        <span
                            class="inline-flex w-[70px] justify-center items-center rounded-md bg-violet-50 px-2 py-1 text-[10px] font-medium text-violet-700 ring-1 ring-inset ring-violet-700/10">Pending</span>
                    @elseif($rent->paymentStatus === 'success')
                        <span
                            class="inline-flex w-[70px] justify-center items-center rounded-md bg-green-50 px-2 py-1 text-[10px] font-medium text-green-700 ring-1 ring-inset ring-green-700/10">Success</span>
                    @elseif($rent->paymentStatus === 'rejected')
                        <span
                            class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-[10px] font-medium text-red-700 ring-1 ring-inset ring-red-700/10">Rejected</span>
                    @endif
                </td>
                <td>

                    @if($rent->rentStatus === 'ended')
                        <span
                            class="inline-flex w-[70px] justify-center items-center rounded-md bg-blue-50 px-2 py-1 text-[10px] font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">Ended</span>
                    @elseif($rent->rentStatus === 'not started')
                        <span
                            class="inline-flex w-[70px] justify-center items-center rounded-md bg-amber-50 px-2 py-1 text-[10px] font-medium text-amber-700 ring-1 ring-inset ring-amber-700/10">Not started</span>
                    @elseif($rent->rentStatus === 'started')
                        <span
                            class="inline-flex w-[70px] justify-center items-center rounded-md bg-green-50 px-2 py-1 text-[10px] font-medium text-green-700 ring-1 ring-inset ring-green-700/10">Started</span>
                    @endif
                </td>
                <td>{{$rent->created_at}}</td>
                <td>
                    <a href="{{route('rents.edit', $rent->id)}}">
                        <i class="fa-solid fa-pencil cursor-pointer p-1.5 rounded border-2 text-teal-700 border-teal-700 hover:bg-teal-700 hover:text-white"></i>
                    </a>
                </td>
            </tr>

        @endforeach
    </table>

@endsection
