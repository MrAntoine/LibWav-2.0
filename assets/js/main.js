
$( document ).ready(function() {
    console.log( " JS ready ! " );




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

  /*
    $('form#form_sound_search2').submit(function(event){
        event.preventDefault();

        $.post( $(this).attr("action"),
            $(this ).serializeArray(),
            function(data) {
                $("#wrapper_sound").empty().append(data);
                console.log(data);

            });
    });
*/





  /*   VIDEOS     */
/*
    $('a.tutoriel_item').click(function(){
        event.preventDefault();

        $.post( $(this).attr("href"),
            $(this ).serializeArray(),
            function(data) {
                $("#wrapper_tutoriel").empty().append(data);

            });

        $("#wrapper_tutoriel").load("?action=singleTuto");

    });
*/

    /*   COMMENTAIRES   */

    $('form#form_comment').on('submit', function(e) {
        e.preventDefault();

        $.post( $(this).attr("action"),
            $(this ).serializeArray(),
            function(data) {
                alert("Commentaire envoyé");
                $("#form_comment").find("input[type=text], textarea").val("");
              //  $("#wrapper_comment").append().load("vues/tuto/single_tuto.php #wrapper_comment");
            });

       /* var $this = $(this);
        // Envoi de la requête HTTP en mode asynchrone
        $.ajax({
            url: $this.attr('action'), // On récupère l'action (ici action.php)
            type: $this.attr('method'), // On récupère la méthode (post)
            data: $this.serialize(), // On sérialise les données = Envoi des valeurs du formulaire
            dataType: 'json', // JSON
            success: function(json) { // Si ça c'est passé avec succès
                // ici on teste la réponse
                if(json.reponse === 'ok') {
                    alert('Connexion OK');
                    // On peut aussi rediriger vers l'index
                    window.location.href = 'index.php';
                } else {
                    alert('Erreur : '+ json.reponse);
                }
            }
        });*/

    });







// AUDIO PLAYER



    // inner variables
    var song;
    var fillBar = document.getElementById("AudioPlayerFill");
    var tracker = $('.tracker');

    initAudio();


/*

// empty tracker slider
    tracker.slider({
        range: 'min',
        min: 0, max: 10,
        start: function(event,ui) {},
        slide: function(event, ui) {
            song.currentTime = ui.value;
        },
        stop: function(event,ui) {}
    });

*/



    function initAudio() {
        var url = $('#src_player').text();
        song = new Audio(url);
        // timeupdate event listener
    /*
       song.addEventListener('timeupdate',function (){
            var curtime = parseInt(song.currentTime, 10);
            tracker.slider('value', curtime);
        });
    */
        song.addEventListener('timeupdate',function(){
            var position = song.currentTime / song.duration;
            fillBar.style.width = position * 100 +'%';
        });

    }

    function setVolume(volume) {
        song.volume = volume;
    }

    function playAudio() {
        song.play();
       // tracker.slider("option", "max", song.duration);
        //2 //tracker.slider("option", "value", tracker.slider("value"));
        $('#AudioPlayerPlay').addClass('cacher');
        $('#AudioPlayerPause').removeClass('cacher');
    }

    function stopAudio() {
        song.pause();
        $('#AudioPlayerPlay').removeClass('cacher');
        $('#AudioPlayerPause').addClass('cacher');
    }




    $('.btn_lecture').click(function(){
        //let source = $( this ).find('.likes');
    let fichier = $( this ).find('.src_sound').val();
    let source = "uploads/sound/"+fichier;
        event.preventDefault();
        //$('audio').attr('src',source);

        // Source de la musique
        $('#src_player').empty().append(source);

        // Titre de la musique
        var songTitle =  ($( this ).parent().parent().find('.sound_item_titre').text());
        var songTime =  ($( this ).parent().parent().find('.sound_item_titre').text());
        $('#AudiPlayerSongTitle').empty().append(songTitle); // set the title of song
        $('#AudiPlayerSongTime').empty().append("Durée : "+ song.duration);
        stopAudio();
        initAudio();


    });


    // play click
    $('#AudioPlayerPlay').click(function (e) {
        e.preventDefault();
        playAudio();
    });
    // pause click
    $('#AudioPlayerPause').click(function (e) {
        e.preventDefault();
        stopAudio();
    });

    // Volume
    $('#volumeSlider').change(function (e) {
        e.preventDefault();
        setVolume(this.value);
        if(this.value == 0){
            $('#AudioPlayerSpeak').attr('src','assets/img/mute.svg');
        }else {
            $('#AudioPlayerSpeak').attr('src','assets/img/speaker.svg');
        }
    });

    // Muted
    $('#AudioPlayerSpeak').click(function (e) {
        e.preventDefault();
        if(song.volume > 0){
            $(this).attr('src','assets/img/mute.svg');
            setVolume(0);
        }else {
            $(this).attr('src','assets/img/speaker.svg');
            setVolume(1);
        }
    });



/*
    song.addEventListener('timeupdate',function(){
        var position = song.currentTime / song.duration;
        fillBar.style.width = position * 100 +'%';
    });

*/






});


/*
// Avatar apercu
$('#update_profil_avatar').click(function (e) {
    e.preventDefault();
    let photo = ($( this ).parent().find('#profil_avatar_conf').attr('src'));
    let file = ($( this ).parent().find('#fileToUpload').val());
    console.log(file);
        $(this).attr('src',file);

});
*/




/////////////   FILTER    ////////////

/* Categories */





