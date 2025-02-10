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


    $('.showToggler').click(function(e){
        var target = e.currentTarget

        $(target).hasClass('show')?hidePassword($(target)):showPassword($(target))
    })
    function hidePassword(e){
        e.removeClass('show').addClass('hide')

        e.prev('input').attr('type','password')
        e.html(`<i class="fa-solid fa-eye"></i>`)
    }
    function showPassword(e){
        e.removeClass('hide').addClass('show')
        e.prev('input').attr('type','text')
        e.html(`<i class="fa-solid fa-eye-slash"></i>`)
    }



    $('#preview_photo').change(function (e) {
        if(e.target.files.length === 0){
            $('#preview_photo_thumbnail').text('No file chosen');
            return;
        }
        $('#preview_photo_thumbnail').append('<img/>');
        const thumbnail = $('#preview_photo_thumbnail img');
        thumbnail.attr('width', 128);
        thumbnail.attr('height', 64);
        const file = e.target.files[0];
        const reader = new FileReader();

        reader.onloadend = function () {
            thumbnail.attr('src', reader.result);
        }
        if (file) {
            reader.readAsDataURL(file);
        } else {
            thumbnail.attr('src', '');
        }
    });


});
