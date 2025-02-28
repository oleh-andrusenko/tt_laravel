@extends('layouts.main')


@section('content')
    <ul>
        @forelse($rents as $rent)
            <x-rent-tile :rent="$rent" :user="$rent->user"/>

        @empty
            <li class="w-full mx-auto text-lg text-slate-700">No rents yet...</li>
        @endforelse
    </ul>
@endsection

