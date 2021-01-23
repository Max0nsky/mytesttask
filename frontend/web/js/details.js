$(document).ready(function() {
    $(".calc").change(function() {
        $.ajax({
            url: '/product/details',
            type: 'POST',
            data: {
                'valueIdGroup': $('input[name="IdGroup"]').val(),
                'valueWidht': $('input[name="Widht"]:checked').val(),
                'valueHeight': $('input[name="Height"]:checked').val(),
                'valueLength': $('input[name="Length"]:checked').val(),
                'valueQuantity': $('input[name="Quantity"]').val()
            },
            success: function(data) {
                data = JSON.parse(data);
                $('#price').text(data['price']);
                $('#quantityOnStore').text(data['quantityOnStore']);
            },
            error: function() {
                alert('Ошибка данных.');
            }
        });
    });
});