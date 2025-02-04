<div class="slider-container overflow-hidden ">
    @if($photos != null && count(explode(';', $photos)) > 0)
        @foreach(explode(';', $photos) as $photo)
            <div class="slide" style="background-image: url('{{asset('assets/carPhotos/'.$photo)}}')"></div>
        @endforeach
</div>
<div class="slider-controls border-b-2">
    <button id="prev-slide">←</button>
    <button id="next-slide">→</button>
</div>
</div>
@else
    <p>No photos....</p>
@endif
