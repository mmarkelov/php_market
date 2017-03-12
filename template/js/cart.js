// Функции для работы с корзиной покупателя
$(document).ready(function () {
    $(".add-to-cart").click(function () {
        var id = $(this).attr("data-id");
        var quantity = $(".quantity").val();
        $.post("/cart/addAjax/" + id, {'quantity': quantity}, function (data) {
            $("#cart-count").html(data);
        });
        return false;
    });

    $('.decr').click(function () {
        var $input = $(this).parent().siblings('input');
        var quantity = $(this).parent().siblings("input").val() - 1;
        var id = $(this).parent().siblings("input").attr("data-id");
        quantity = quantity < 1 ? 1 : quantity;
        console.log(id, quantity);
        $input.val(quantity);
        $input.change();
        return false;
    });

    $('.incr').click(function () {
        var $input = $(this).parent().siblings('input');
        var quantity = $(this).parent().siblings("input").val();
        quantity = parseInt(quantity) + 1;
        var id = $(this).parent().siblings("input").attr("data-id");
        console.log(id, quantity);
        $input.val(quantity);
        $input.change();
        return false;
    });

    $('.cart-quantity').change(function () {
        var quantitycart = $(this).val();
        var id = $(this).attr("data-id");
        $.post("/cart/change/" + id, {'quantity-cart': quantitycart}, function (data) {
            $("#cart-count").html(data);
        });
        var price = $('[price="' + id + '"]').text();
        $('[id="currentSum-' + id + '"]').text(quantitycart * price);
        var sum = 0;

        $('.goods').each(function () {
            sum += parseInt($(this).find('.currentSum').text());
        });
        $('#sum').text(sum);
        return false;
    });

});


