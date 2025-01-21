

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#startDate').attr('min', new Date().toLocaleDateString().split('.').reverse().join('-'));
    $('#endDate').attr('min', new Date().toLocaleDateString().split('.').reverse().join('-'));

    $('#startDate').on('change', function () {
        $('#endDate').attr('min', $('#startDate').val());
    });

    $('#endDate').on('change', function () {
        $.post('http://127.0.0.1:8000/rents/price', {

            startDate: $('#startDate').val(),
            endDate: $('#endDate').val(),
            carPrice: $('#carPrice').val()
        }, function (data) {
            $('#rentPrice').html('$' + data.price);
            $('#rentDays').html(data.days);
            $('#duration').val(data.days);
            $('#price').val(data.price);
            $('#pricePerDay').html('$' + Math.round(data.price / data.days));
        }, 'json');
    });
});
