function viewProduct(product_id) {
    console.log(product_id, 'modal')
    // $('#modalWrapper').html(productInfo).show();
    // $(productInfo).show();        
    $.ajax({
        method: 'GET',
        url: 'apis/api-show-product.php',
        data: {
            id: product_id
        }
    }).done(function(id){
        console.log(id)
        $('#modalContent').html(id);
        $('#modalWrapper').show();
        $('#productContainer').hide();
        // $('#product_id').html(id);
    }).fail(function(){
        console.log('error')
    })
}


function closeProduct() {
    $('#productContainer').show();
    $('#modalWrapper').hide();
}