
$( document ).ready(function() {
    console.log( "ready main.js" );
});



$(function() {
//$(document).ready(function(){

    $('.likes').click(function() {
        var color = $( this ).css( "background-color" );
        let mavar = $( this );
        //console.log($(this ).parent().serializeArray());

        //$.post('vues/likes.php',
        $.post( $("form").attr("action"),
            $(this ).parent().serializeArray(),
            function(data) {
               /*if( data == 'vrai'){
                    //console.log(data);
                    $(mavar).css( "background-color", 'black' );
                }else {
                    //console.log(data);
                    $(mavar).css( "background-color", 'red' );
                }*/


              //document.write(data);
               // console.log($("div.col-md-12.main").val());
                //console.log(data);
            });

        if(color == "rgb(255, 0, 0)"){
            $(mavar).css( "background-color", 'black' );
        }else {
            $(mavar).css( "background-color", 'red' );
        }


    });


    $('form').submit(function(event){
        //return false;
        event.preventDefault();
    });


});
