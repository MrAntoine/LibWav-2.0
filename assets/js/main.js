
$( document ).ready(function() {
    console.log( "ready main.js" );
});


//LIKES
$(function() {

    $('form.likesForm').submit(function(event){
        event.preventDefault();

        let mavar = $( this ).find('.likes');
        let likes = mavar.parents('div.sound_item_likes').find('.nb_likes');

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this ).serializeArray(),
            success: function(data) {
                data = JSON.parse(data);
               if(data['ifLike'] == "like"){
                   // On unlike
                   $(mavar).css( "background-color", 'black' );
                   $( this ).find('.likes')
                   likes.empty().append(data['count']-1);
               }else {
                   // On like
                   $(mavar).css( "background-color", 'red' );
                   likes.empty().append(data['count']+1);
               }

            }
        });

    });




    $('form.reportForm').submit(function(event){
        event.preventDefault();

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


    $('form.downloadForm').submit(function(){

        $.post( $(this).attr("action"),
            $(this ).serializeArray(),
            );
    });


    $('a#signalements_btn_admin').click(function(){
            $("#signalements_list").load("?action=signalements");

    });



    $('form#form_sound_search').submit(function(event){
        event.preventDefault();

        $.post( $(this).attr("action"),
            $(this ).serializeArray(),
            function(data) {
                $("#wrapper_sound").empty().append(data);

            });
    });




});
