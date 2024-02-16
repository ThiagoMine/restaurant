$('.addProductModal').click('click', function() {
    var productId = $(this).data('productid');
    var productPrice = $(this).data('price');
    var productName = $(this).data('name');
    var category = $(this).data('category');

    var productIdHtml = '<input type="text" name="product-id" id="product-id" value="'+productId+'">';
    var productNameHtml = '<input type="text" name="product-name" id="product-name" value="'+productName+'">';
    var productPrice = '<input type="text" name="product-price" id="product-price" value="'+productPrice+'">';

    $('#addProductModal-'+category+' .product-information').append(productIdHtml);
    if (category != "produtos_nao_cadastrados"){
        $('#addProductModal-'+category+' .product-information').append(productNameHtml);
        $('#addProductModal-'+category+' .product-information').append(productPrice);
    }

    $('#addProductModal-'+category).modal('show');
});

$('.btn-add-product').click('click', function() {
    var category = $(this).data('category');

    var items = $('.item');

    var half_pizza_name = null;
    var other_half = null;
    var price = null;

    var formDataArray = $('#addProductModal-'+category+' .order-add-form').serializeArray();
    var printHtml = '<div class="product">';
    var printProductHtml = '';
    var printCommentHtml = '';
    var printAdditionalsHtml = '<div class="aditionals">';
    var formHtml = '<div class="item hidden">';
    var additionalCounter = 0;

    var is_half = false;

    formDataArray.forEach((element) => {
        if (element.name == 'has_half') {
            is_half = true;
        }
        switch (element.name) {
            case 'product-name':
                if (half_pizza_name === null) {
                    half_pizza_name = "1/2 " + element.value;
                } else {
                    half_pizza_name = half_pizza_name + " 1/2 " + element.value;
                }
                break;
            case 'half':
                other_half = element.value.split('|');
                if (half_pizza_name === null) {
                    half_pizza_name = "1/2 " + other_half[0];
                } else {
                    half_pizza_name = half_pizza_name + " 1/2 " + other_half[0];
                }
                break;
            case 'product-price':
                price = element.value;
                break;
        }
    });

    if (is_half) {
        if (price < other_half[1]) {
            price = other_half[1];
        }
    }

    formDataArray.forEach((element) => {
        switch (element.name) {
            case 'obs':
                printCommentHtml = printCommentHtml + '<div class="coments"><span class="fs-12em">'+element.value+'</span></div>';
                formHtml = formHtml + '<input type="hidden" name="items['+items.length+'][comment]" value="'+element.value+'"></input>';
                break;
            case 'additionals':
                var additional = element.value.split(' - ');

                formHtml = formHtml + '<input type="hidden" name="items['+items.length+'][additional-id]['+additionalCounter+']" value="'+additional[0]+'"></input>';
                
                printAdditionalsHtml = printAdditionalsHtml + 
                    '<div class="content w-100 mb-2"><div><span class="name text-gray-900 fs-12em">'+
                    additional[1] +
                    '</span></div></div>';

                additionalCounter++;
                break;
            case 'product-id':
                formHtml = formHtml + '<input type="hidden" name="items['+items.length+'][product-id]" value="'+element.value+'"></input>';
                break;
            case 'product-name':
                var name = element.value;
                if (is_half) {
                    name = half_pizza_name;
                }
                formHtml = formHtml + '<input type="hidden" name="items['+items.length+'][product-name]" value="'+name+'"></input>';
                printProductHtml = printProductHtml + 
                    '<div class="content w-100 d-flex justify-content-between flex-wrap mb-2"><div><span class="name text-gray-900 fs-15em">' +
                    name +
                    '</span></div>' +
                    '<a href="#" class="btn btn-sm btn-danger btn-icon-split btn-remove-product"><span class="icon text-white-50"><i class="fas fa-trash"></i></span><span class="text">Remover Item</span></a></div>';
                break;
            case 'product-price':
                formHtml = formHtml + '<input type="hidden" name="items['+items.length+'][product-price]" value="'+price+'"></input>';
                break;
        }
    });

    printAdditionalsHtml = printAdditionalsHtml + '</div>';
    formHtml = formHtml + '</div>';
    
    printHtml = printHtml + printProductHtml + printCommentHtml + printAdditionalsHtml + 
        formHtml + '</div><hr>';

    $('.order').append(printHtml);
    $('.no-product').addClass('hidden');

    $("#product-id").remove();
    $("#product-name").remove();
    $("#product-price").remove();

    $('input[name="additionals"]').prop('checked', false);
    $('.obs').val('');
    $('input[name="has_half"]').prop('checked', false);
    $(".select-half").addClass("hidden");
    $('#addProductModal-'+category).modal('hide');
});

$('.finish-order').on('click', function() {
    $("#order-form").submit();
});

$(".order").on("click", ".btn-remove-product", function() {
    var items = $('.item');

    if (items.length <= 1) {
        $('.no-product').removeClass('hidden');
    }

    $(this).parent().parent().remove();

});

$("#has_half").change(function() {
    $(".select-half").toggleClass("hidden");
})


$('.modal').on('hidden.bs.modal', function () {
    $("#product-id").remove();
    $("#product-name").remove();
    $("#product-price").remove();

    $('input[name="additionals"]').prop('checked', false);
    $('.obs').val('');
    $('input[name="has_half"]').prop('checked', false);
    $(".select-half").addClass("hidden");
    $('#addProductModal-'+category).modal('hide');
})