<div class="w-full">
    @switch($status)
        @case('pending')
            <div class="px-2 py-0.5 rounded-lg border-2 text-[10px] font-semibold bg-amber-100 border-amber-200 text-amber-400">Payment pending</div>
        @break
        @case('rejected')
            <div class="px-2 py-0.5 rounded-lg border-2 text-[10px] font-semibold bg-red-100 border-red-200 text-red-400">Payment rejected</div>
        @break
        @case('success')
            <div class="px-2 py-0.5 rounded-lg border-2 text-[10px] font-semibold bg-green-100 border-green-200 text-green-400">Payment success</div>
        @break
        @default
            <div>No status...</div>
    @endswitch


</div>
