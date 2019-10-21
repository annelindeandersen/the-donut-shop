$('#filterByCategory').submit(function(category){
    console.log('filter products')
        
    $.ajax({
        method: 'GET',
        url: 'apis/api-filter-by-category.php',
        data: {
            id: category
        }
    }).done(function(filter){
        console.log(filter)
        // $('#filteredProducts').html(id);
        // $('#all').addClass('display-none');
    }).fail(function(){
        console.log('error')
    })
})