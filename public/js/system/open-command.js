$('input[name="opcao"]').change(function(){
    var selectedOption = $('input[name="opcao"]:checked').val();

    if (selectedOption == "opcao3") {
        $('#delivery-address').removeClass('hidden');
    } else {
        $('#delivery-address').addClass('hidden');
    }
});