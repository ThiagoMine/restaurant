$('.addProductModal').click('click', function() {
    var productId = $(this).data('productid');
    var productName = $(this).data('name');
    var category = $(this).data('category');

    var productIdHtml = '<input type="text" name="product-id" id="product-id" value="'+productId+'">';
    var productNameHtml = '<input type="text" name="product-name" id="product-name" value="'+productName+'">';

    $('#addProductModal-'+category+' .product-information').append(productIdHtml);
    $('#addProductModal-'+category+' .product-information').append(productNameHtml);

    $('#addProductModal-'+category).modal('show');
});


$('.btn-add-product').click('click', function() {
    var category = $(this).data('category');
    console.log(category);

    var items = $('.item');
    

    var formDataArray = $('#addProductModal-'+category+' .order-add-form').serializeArray();
    console.log(items, formDataArray);
    var printHtml = '<div class="product">';
    var printProductHtml = '';
    var printCommentHtml = '';
    var printAdditionalsHtml = '<div class="aditionals">';
    var formHtml = '<div class="item hidden">';
    var additionalCounter = 0;

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
                printProductHtml = printProductHtml + 
                    '<div class="content w-100 d-flex justify-content-between flex-wrap mb-2"><div><span class="name text-gray-900 fs-15em">' +
                    element.value +
                    '</span></div>' +
                    '<a href="#" class="btn btn-sm btn-danger btn-icon-split btn-remove-product"><span class="icon text-white-50"><i class="fas fa-trash"></i></span><span class="text">Remover Item</span></a></div>';
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

    $('input[name="additionals"]').prop('checked', false);
    $('.obs').val('');
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