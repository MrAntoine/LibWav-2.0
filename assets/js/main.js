
$( document ).ready(function() {
    console.log( "ready main.js" );
});


//LIKES
$(function() {

    $('form.likesForm').submit(function(event){

        //return false;
        event.preventDefault();

        var color = $( this ).find('.likes').css( "background-color" );
        let mavar = $( this ).find('.likes');
        //console.log($(this ).parent().serializeArray());

        //$.post('vues/likes.php',
        $.post( $(this).attr("action"),
            $(this ).serializeArray(),
            function(data) {
                if( data == 'like'){
                     $(mavar).css( "background-color", 'black' );
                 }else {
                     $(mavar).css( "background-color", 'red' );
                 }

                //$("#div1").load("demo_test.txt");
                //console.log($( this ).find('.likes').parent());

            });
    });


    $('form.reportForm').submit(function(event){
        event.preventDefault();

        let mavar = $( this ).find('.reportsound');

        //$.post('vues/likes.php',
        $.post( $(this).attr("action"),
            $(this ).serializeArray(),
            function(data) {

            alert("Signalement soumis");

            // reset des champs
            $(':input','.reportForm')
                .removeAttr('checked')
                .removeAttr('selected')
                .not(':button, :submit, :reset, :hidden')
                .val('');

            });
    });




});
