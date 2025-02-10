<div class="text-center text-blue-700 text-2xl">
    @if ($rating)
        @for ($i = 1; $i <= 5; $i++)
            {{ $i <= round($rating) ? '★' : '☆' }}
        @endfor
        <span class="text-lg">({{number_format($rating, 1)}})</span>
    @else
        No rating yet
    @endif
</div>
