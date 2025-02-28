<div class="w-full">
    @switch($status)
        @case('not started')
            <div class="px-2 py-0.5 rounded-lg border-2 text-[10px] font-semibold bg-amber-100 border-amber-200 text-amber-400">Rent not started</div>
            @break
        @case('started')
            <div class="px-2 py-0.5 rounded-lg border-2 text-[10px] font-semibold bg-green-100 border-green-200 text-green-400">Rent started</div>
            @break
        @case('ended')
            <div class="px-2 py-0.5 rounded-lg border-2 text-[10px] font-semibold bg-teal-100 border-teal-200 text-teal-400">Rent ended</div>
            @break
        @default
            <div>No status...</div>
    @endswitch


</div>
