@extends('layouts.main')
@section('title')
    List of rents
@endsection


@section('content')
<div class="text-3xl my-6 font-semibold text-blue-500 ">
    Rents list
</div>

        @foreach($rents as $rent)
            <div class="border my-4">


                {{$rent}}

            </div>
        @endforeach


@endsection
