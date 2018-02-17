$('document').ready(function(){

    $('#loader').remove();
    $('#container').addClass('animated slideInUp');

    window.setTimeout(function(){
        $('#verse-container').addClass('animated fadeIn');
        $('#verse-container').css('opacity', 1);
    }, 1000);

    function loadverse () {
        $.ajax({
            url: "verses.php",
            method: "GET",
            cache: "no-cache",
            beforeSend: function() {
                $('#progress').removeClass('progress');
            }
        }).then(
            function(xhr){
                $('#ajax').html(' '); $('#ajax').html(xhr);
                $('#verse-container').addClass('animated fadeIn').css('opacity', 1);
                $('#progress').addClass('progress');
            }, 
            function(){
                alert("Nous ne pouvons pas Charger les versets, Vérifiez votre connexion Internet");
            }
        )
    }

    window.setInterval(function(){
        loadverse();
    }, 9000);
    
})