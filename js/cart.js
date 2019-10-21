function addToCart(product_id) {
    console.log(product_id, 'cart add')
      
    $.ajax({
        method: 'GET',
        url: 'apis/api-add-to-cart.php',
        data: {
            id: product_id
        }
    }).done(function(id){
        console.log(id)
        Swal.fire(
            'Success!',
            'The product has been added to cart!',
            'success'
          )
    }).fail(function(){
        console.log('error')
    })
}

function deleteProduct(product_id) {
    console.log(product_id, 'cart delete')
      
    $.ajax({
        method: 'GET',
        url: 'apis/api-delete-product.php',
        data: {
            id: product_id
        }
    }).done(function(id){
        console.log(id)
        location.reload();
    }).fail(function(){
        console.log('error')
    })
}

function orderProducts(cart_id) {
    console.log(cart_id)
        
        //   $.ajax({
        //     method: 'GET',
        //     url: 'apis/api-place-order.php',
        //     data: {
        //         id: cart_id
        //     }
        // }).done(function(id){
        //     console.log(id)
        //     // location.reload();
        //     Swal.fire(
        //         'Success!',
        //         'Your order has been placed!',
        //         'success'
        //       )
        // }).fail(function(){
        //     console.log('error')
        // })
}