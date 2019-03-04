<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 03/02/2019
 * Time: 15:49
 */

?>








<!--
<section id="audio_player">
    <audio preload="auto" controls>
        <source src="uploads/sound/Galantis%20-%20Hunter%20(Official%20Audio).mp3" />
    </audio>
</section>
-->


<div id="main_player">
    <div id="player">
        <input hidden id="src_player"/>
        <div id="AudiPlayerSongTitle">Aucun son sélectionné</div>
        <div id="AudiPlayerSongTime">Durée : 0</div>
        <div id="buttons">
            <a id="AudioPlayerPlay"><img src="assets/img/play-button.svg" alt="bouton lecture lecteur audio" class="btn_img"/></a>
            <a class="cacher" id="AudioPlayerPause"><img src="assets/img/pause-button.svg" alt="bouton pause lecteur audio" class="btn_img"/></a>
        </div>
        <div id="AudiPlayerSongSound">
            <img id="AudioPlayerSpeak" src="assets/img/speaker.svg" alt="image volume lecteur audio" class="btn_img">
            <input id="volumeSlider" name="volumeSlider" type="range" min="0" max="1" step="any" value="1">
        </div>



        <div id="seek-bar">
            <div id="AudioPlayerFill"></div>
            <div id="handle"></div>
        </div>
    </div>
</div>


