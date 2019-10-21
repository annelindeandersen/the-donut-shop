console.log('virker')

$('#signup').hide();
$('#login').show();

$('#login p').click(
    function changeToSignup() {
        $('#login').hide();
        $('#signup').show();
    }
)

$('#signup p').click(
    function changeToSignup() {
        $('#signup').hide();
        $('#login').show();
    }
)