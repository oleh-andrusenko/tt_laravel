$(document).ready(function () {
    let photos = $('.slide').length;
    let currentSlide = 0;
    $('.slider-container').css('transition', `all ${photos * 0.15}s ease-in-out`)
    $(`.slide:nth-child(${currentSlide + 1})`).css('transform', 'scale(1.15)');
    $(`.slide:nth-child(${currentSlide + 1})`).css('filter', 'blur(0px)');
    $(`.slide:nth-child(${currentSlide + 1})`).css('z-index', '3');
    $(`.slide:nth-child(${currentSlide + 1})`).css('border-bottom', '5px solid #2563eb');
    $(`.slide:nth-child(${currentSlide + 1})`).css('border-top', '5px solid #2563eb');


    $('#prev-slide').click(function () {
        currentSlide = currentSlide - 1 < 0 ? photos - 1 : currentSlide - 1;
        slide(currentSlide);
    })

    $('#next-slide').click(function () {
        currentSlide = currentSlide + 1 > photos - 1 ? 0 : currentSlide + 1;
        slide(currentSlide);
    })

    function slide(currentSlide) {
        $(`.slide`).css('transform', 'scale(1)');
        $(`.slide`).css('filter', 'blur(1px)');
        $(`.slide`).css('z-index', '1');
        $('.slide').css('border', 'none');
        $(`.slide:nth-child(${currentSlide + 1})`).css('transform', 'scale(1.15)');
        $(`.slide:nth-child(${currentSlide + 1})`).css('z-index', '3');
        $(`.slide:nth-child(${currentSlide + 1})`).css('filter', 'blur(0px)');
        $(`.slide:nth-child(${currentSlide + 1})`).css('border-bottom', '5px solid #2563eb');
        $(`.slide:nth-child(${currentSlide + 1})`).css('border-top', '5px solid #2563eb');
        $('.slider-container').css('margin-left', (currentSlide - 1) * -475  + 'px');

    }
});
