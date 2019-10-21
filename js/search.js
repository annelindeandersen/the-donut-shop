    $(document).on('input', '#donutSearch', function() {
        //check if name is empty
        var product = $('#donutSearch').val();
            if (product == '') {
            // empty search field
            $("#filtered").html('');
        }

        $.ajax({
            method: "GET",
            url: 'apis/api-search.php',
            cache: false,
            data: { donutSearch: product }
        }).done(function(result){
            console.log('success')
            //set as .html -> it is echo'ing a <div>, not just .text
            $('#filtered').html(result);
        }).fail(function(){
            console.log('fail')
        })
    })