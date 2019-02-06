<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 03/02/2019
 * Time: 15:49
 */

?>

<style>

    @font-face {
        font-family:"SSStandard";
        src:url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/ss-standard.woff') format('woff');
        font-weight:normal;
        font-style:normal;
    }
    .ss-icon,.ss-icon.ss-standard {
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        white-space: nowrap;
        font-feature-settings: "liga","dlig";
    }
    .ss-icon,.ss-icon.ss-standard {
        font-family: "SSStandard";
    }
    * { box-sizing: border-box; }
    figure#audioplayer {
        border: 1px solid #000;
        background: #333;
        background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/dark_wall.png);
        overflow: hidden;
        width: 32rem;
        padding: .4rem;
        margin: 0 auto;
    }
    figure#audioplayer audio { width: 0; height: 0; }
    figure#audioplayer figcaption {
        width: 21.5rem; font-size: 0;
        margin: .45rem; background: #000;
        float: left;
        border: 1px solid #555;
    }
    figure#audioplayer figcaption div {
        background: #000;
        color: #fff;
        padding: .8rem;
        font-family: Avenir, Helvetica, sans-serif;
        text-transform: uppercase; font-size: .8rem;
        display: inline-block;
    }
    figure#audioplayer figcaption div span {
        display: block;
        font-size: 1.3rem;
        text-indent: 1rem;
    }
    div#album {
        border-top: 1px solid #555;
        border-bottom: 1px solid #555;
        width: 100%;
    }
    div#time {
        width: 7.55rem;
        border-left: 1px solid #555;
    }
    input#volumeSlider { -webkit-appearance: slider-vertical;  }
    figure#audioplayer button {
        width: 3rem; height: 3rem;
        background: #000; color: #fff;
        border: none;
    }
    #playback { clear: both; }
    div#fader { display: inline-block; }
    #playback progress {
        margin-left: 1rem;
        width: 20rem; height: 12px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-color: #888;
        border: none;
        color: hsl(44,100%,44%);
    }
    progress::-webkit-progress-bar, progress::-moz-progress-bar, progress::progress-bar {
        background: hsl(44,100%,44%);
    }
    progress::-webkit-progress-value { background: hsl(44,100%,44%); }
    progress::-moz-progress-bar {
        background-color: hsl(44,100%,44%);
    }
    @media screen and (max-width: 500px) {
        div#time { display: block !important; border-top: 1px solid #555; width: 100%; }
        figure#audioplayer { width: 100%; padding: .2rem; }
        figure#audioplayer figcaption div { padding: .4rem; }
    }
    @media screen and (max-width: 450px) {
        figure#audioplayer figcaption { width: 16rem; }
        #playback progress { width: 220px; }
    }
    @media screen and (max-width: 400px) {
        figure#audioplayer figcaption { width: 14rem; }
    }































    /* Font Family
================================================== */

    @import url('https://fonts.googleapis.com/css?family=Oxygen:300,400,700');


    /* Global Styles
    ================================================== */

    html,body {
        -webkit-font-smoothing:antialiased;
        -webkit-text-size-adjust:100%;
        background-color:#0665a2;
        color:#fff;
        font-size:1.05rem;
        font-family:"Oxygen", HelveticaNeue, "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight:300;
        letter-spacing:.025rem;
        line-height:1.618;
        padding:1rem 0;
    }

    *,::before,::after {
        box-sizing:border-box;
    }

    * {
        -webkit-tap-highlight-color:rgba(0,0,0,0);
        -webkit-tap-highlight-color:transparent;
    }


    /* Setup
    ================================================== */

    .container { position:relative; margin:0 auto; max-width:800px; width:100%; }
    .column { width:inherit; }


    /* Typography / Links
    ================================================== */

    p { color:#fff; display:block; font-size:.9rem; font-weight:400; margin:0 0 2px; }

    a,a:visited { color:#8cc3e6; outline:0; text-decoration:underline; }
    a:hover,a:focus { color:#bbdef5; }
    p a,p a:visited { line-height:inherit; }


    /* Misc.
    ================================================== */

    .add-bottom { margin-bottom:2rem !important; }
    .left { float:left; }
    .right { float:right; }
    .center { text-align:center; }
    .hidden { display:none; }

    .no-support {
        margin:2rem auto;
        text-align:center;
        width:90%;
    }


    /* Audio Player Styles
    ================================================== */

    audio {
        display:none;
    }

    #audiowrap,
    #plwrap {
        margin:0 auto;
    }

    #tracks {
        font-size:0;
        position:relative;
        text-align:center;
    }

    #nowPlay {
        display:block;
        font-size:0;
    }

    #nowPlay span {
        display:inline-block;
        font-size:1.05rem;
        vertical-align:top;
    }

    #nowPlay span#npAction {
        padding:21px;
        width:30%;
    }

    #nowPlay span#npTitle {
        padding:21px;
        text-align:right;
        width:70%;
    }

    #plList li {
        cursor:pointer;
        display:block;
        margin:0;
        padding:21px 0;
    }

    #plList li:hover {
        background-color:rgba(0,0,0,.1);
    }

    .plItem {
        position:relative;
    }

    .plTitle {
        left:50px;
        overflow:hidden;
        position:absolute;
        right:65px;
        text-overflow:ellipsis;
        top:0;
        white-space:nowrap;
    }

    .plNum {
        padding-left:21px;
        width:25px;
    }

    .plLength {
        padding-left:21px;
        position:absolute;
        right:21px;
        top:0;
    }

    .plSel,
    .plSel:hover {
        background-color:rgba(0,0,0,.1);
        color:#fff;
        cursor:default !important;
    }

    #tracks a {
        border-radius:3px;
        color:#fff;
        cursor:pointer;
        display:inline-block;
        font-size:2rem;
        height:35px;
        line-height:.175;
        margin:0 5px 30px;
        padding:10px;
        text-decoration:none;
        transition:background .3s ease;
    }

    #tracks a:last-child {
        margin-left:0;
    }

    #tracks a:hover,
    #tracks a:active {
        background-color:rgba(0,0,0,.1);
        color:#fff;
    }

    #tracks a::-moz-focus-inner {
        border:0;
        padding:0;
    }


    /* Plyr Overrides
    ================================================== */

    .plyr--audio .plyr__controls {
        background-color:transparent;
        border:none;
        color:#fff;
        padding:20px 20px 20px 13px;
        width:100%;
    }

    .plyr--audio .plyr__controls button.tab-focus:focus,
    .plyr--audio .plyr__controls button:hover,
    .plyr__play-large {
        background:rgba(0,0,0,.1);
    }

    .plyr__progress--played,
    .plyr__volume--display {
        color:rgba(0,0,0,.1);
    }

    .plyr--audio .plyr__progress--buffer,
    .plyr--audio .plyr__volume--display {
        background:rgba(0,0,0,.1);
    }

    .plyr--audio .plyr__progress--buffer {
        color:rgba(0,0,0,.1);
    }


    /* Media Queries
    ================================================== */

    @media only screen and (max-width:600px) {
        #nowPlay span#npAction { display:none; }
        #nowPlay span#npTitle { display:block; text-align:center; width:100%; }
    }


</style>


<figure id="audioplayer" itemprop="track" itemscope itemtype="">
    <figcaption>
        <div>Track<span itemprop="name">24 Ghosts III</span></div>
        <div id="album">Album<span itemprop="inAlbum">Ghosts III</span></div>
        <div id="artist">Artist<span itemprop="byArtist">Nine Inch Nails</span></div>
        <div id="time">Time<span id="playbacktime">00:00</span></div>
    </figcaption>
    <meta itemprop="duration" content="PT2M29S">
    <div id="fader"></div>
    <div id="playback"></div>
    <audio controls src="../../uploads/sound/Galantis%20-%20Hunter%20(Official%20Audio).mp3" id="audiotrack" preload="auto" itemprop="audio"></audio>
</figure>




<div class="container">
    <div class="column add-bottom">
        <div id="mainwrap">
            <div id="nowPlay">
                <span id="npAction">Paused...</span><span id="npTitle"></span>
            </div>
            <div id="audiowrap">
                <div id="audio0">
                    <audio id="audio1" preload controls>Your browser does not support HTML5 Audio! 😢</audio>
                </div>
                <div id="tracks">
                    <a id="btnPrev">&larr;</a><a id="btnNext">&rarr;</a>
                </div>
            </div>
            <div id="plwrap">
                <ul id="plList"></ul>
            </div>
        </div>
    </div>
    <div class="column add-bottom center">
        <p>Music by <a href="http://www.mythium.net/">Mythium</a></p>
        <p>Download: <a href="https://archive.org/download/mythium/mythium_vbr_mp3.zip">zip</a> / <a href="https://archive.org/download/mythium/mythium_archive.torrent">torrent</a></p>
    </div>
</div>



<script>

    function player() {
        if (audioTrack.paused) {
            setText(this, "Stop");
            audioTrack.play();
        } else {
            setText(this,"Play");
            audioTrack.pause();
        }
    }
    function setText(el,text) {
        el.innerHTML = text;
    }
    function finish() {
        audioTrack.currentTime = 0;
        setText(playButton,"Play");
    }
    function volumizer() {
        if (audioTrack.volume == 0) {
            setText(muteButton,"Unmute");
        } else {
            setText(muteButton,"Mute");
        }
    }
    function muter() {
        if (audioTrack.volume == 0) {
            audioTrack.volume = restoreValue;
            volumeSlider.value = restoreValue;
        } else {
            audioTrack.volume = 0;
            restoreValue = volumeSlider.value;
            volumeSlider.value = 0;
        }
    }
    function setAttributes(el, attrs) {
        for(var key in attrs){
            el.setAttribute(key, attrs[key]);
        }
    }
    var audioPlayer = document.getElementById("audioplayer"),
        audioTrack = document.getElementById("audiotrack"),
        playButton = document.createElement("button"),
        muteButton = document.createElement("button"),
        volumeSlider = document.createElement("input");
    setText(playButton, "Play");
    setText(muteButton, "Mute");
    setAttributes(playButton, { "type": "button" });
    setAttributes(muteButton, { "type": "button" });
    setAttributes(volumeSlider, { "type": "range", "min": "0", "max": "1", "step": "any", "value": "1" });
    audioPlayer.appendChild(volumeSlider);
    audioPlayer.appendChild(muteButton);
    audioPlayer.appendChild(playButton);
    audioTrack.removeAttribute("controls");
    playButton.addEventListener("click", player, false);
    muteButton.addEventListener("click", muter, false);
    volumeSlider.addEventListener("input", function(){
        audioTrack.volume = volumeSlider.value;
    }, false);
    audioTrack.addEventListener('volumechange', volumizer, false);
    audioTrack.addEventListener('ended', finish, false);




















    // Mythium Archive: https://archive.org/details/mythium/


    jQuery(function ($) {
        'use strict'
        var supportsAudio = !!document.createElement('audio').canPlayType;
        if (supportsAudio) {
            // initialize plyr
            var player = new Plyr('#audio1', {
                controls: [
                    'restart',
                    'play',
                    'progress',
                    'current-time',
                    'duration',
                    'mute',
                    'volume'
                ]
            });
            // initialize playlist and controls
            var index = 0,
                playing = false,
                mediaPath = 'https://archive.org/download/mythium/',
                extension = '',
                tracks = [{
                    "track": 1,
                    "name": "All This Is - Joe L.'s Studio",
                    "duration": "2:46",
                    "file": "JLS_ATI"
                }, {
                    "track": 2,
                    "name": "The Forsaken - Broadwing Studio (Final Mix)",
                    "duration": "8:30",
                    "file": "BS_TF"
                }, {
                    "track": 3,
                    "name": "All The King's Men - Broadwing Studio (Final Mix)",
                    "duration": "5:01",
                    "file": "BS_ATKM"
                }, {
                    "track": 4,
                    "name": "The Forsaken - Broadwing Studio (First Mix)",
                    "duration": "8:31",
                    "file": "BSFM_TF"
                }, {
                    "track": 5,
                    "name": "All The King's Men - Broadwing Studio (First Mix)",
                    "duration": "5:05",
                    "file": "BSFM_ATKM"
                }, {
                    "track": 6,
                    "name": "All This Is - Alternate Cuts",
                    "duration": "2:48",
                    "file": "AC_ATI"
                }, {
                    "track": 7,
                    "name": "All The King's Men (Take 1) - Alternate Cuts",
                    "duration": "5:44",
                    "file": "AC_ATKMTake_1"
                }, {
                    "track": 8,
                    "name": "All The King's Men (Take 2) - Alternate Cuts",
                    "duration": "5:26",
                    "file": "AC_ATKMTake_2"
                }, {
                    "track": 9,
                    "name": "Magus - Alternate Cuts",
                    "duration": "5:46",
                    "file": "AC_M"
                }, {
                    "track": 10,
                    "name": "The State Of Wearing Address (fucked up) - Alternate Cuts",
                    "duration": "5:25",
                    "file": "AC_TSOWAfucked_up"
                }, {
                    "track": 11,
                    "name": "Magus - Popeye's (New Years '04 - '05)",
                    "duration": "5:53",
                    "file": "PNY04-05_M"
                }, {
                    "track": 12,
                    "name": "On The Waterfront - Popeye's (New Years '04 - '05)",
                    "duration": "4:40",
                    "file": "PNY04-05_OTW"
                }, {
                    "track": 13,
                    "name": "Trance - Popeye's (New Years '04 - '05)",
                    "duration": "13:15",
                    "file": "PNY04-05_T"
                }, {
                    "track": 14,
                    "name": "The Forsaken - Popeye's (New Years '04 - '05)",
                    "duration": "8:12",
                    "file": "PNY04-05_TF"
                }, {
                    "track": 15,
                    "name": "The State Of Wearing Address - Popeye's (New Years '04 - '05)",
                    "duration": "7:02",
                    "file": "PNY04-05_TSOWA"
                }, {
                    "track": 16,
                    "name": "Magus - Popeye's (Valentine's Day '05)",
                    "duration": "5:43",
                    "file": "PVD_M"
                }, {
                    "track": 17,
                    "name": "Trance - Popeye's (Valentine's Day '05)",
                    "duration": "10:45",
                    "file": "PVD_T"
                }, {
                    "track": 18,
                    "name": "The State Of Wearing Address - Popeye's (Valentine's Day '05)",
                    "duration": "5:36",
                    "file": "PVD_TSOWA"
                }, {
                    "track": 19,
                    "name": "All This Is - Smith St. Basement (01/08/04)",
                    "duration": "2:48",
                    "file": "SSB01_08_04_ATI"
                }, {
                    "track": 20,
                    "name": "Magus - Smith St. Basement (01/08/04)",
                    "duration": "5:46",
                    "file": "SSB01_08_04_M"
                }, {
                    "track": 21,
                    "name": "Beneath The Painted Eye - Smith St. Basement (06/06/03)",
                    "duration": "13:07",
                    "file": "SSB06_06_03_BTPE"
                }, {
                    "track": 22,
                    "name": "Innocence - Smith St. Basement (06/06/03)",
                    "duration": "5:16",
                    "file": "SSB06_06_03_I"
                }, {
                    "track": 23,
                    "name": "Magus - Smith St. Basement (06/06/03)",
                    "duration": "5:46",
                    "file": "SSB06_06_03_M"
                }, {
                    "track": 24,
                    "name": "Madness Explored - Smith St. Basement (06/06/03)",
                    "duration": "4:51",
                    "file": "SSB06_06_03_ME"
                }, {
                    "track": 25,
                    "name": "The Forsaken - Smith St. Basement (06/06/03)",
                    "duration": "8:43",
                    "file": "SSB06_06_03_TF"
                }, {
                    "track": 26,
                    "name": "All This Is - Smith St. Basement (12/28/03)",
                    "duration": "3:00",
                    "file": "SSB12_28_03_ATI"
                }, {
                    "track": 27,
                    "name": "Magus - Smith St. Basement (12/28/03)",
                    "duration": "6:09",
                    "file": "SSB12_28_03_M"
                }, {
                    "track": 28,
                    "name": "Madness Explored - Smith St. Basement (12/28/03)",
                    "duration": "5:05",
                    "file": "SSB12_28_03_ME"
                }, {
                    "track": 29,
                    "name": "Trance - Smith St. Basement (12/28/03)",
                    "duration": "12:32",
                    "file": "SSB12_28_03_T"
                }, {
                    "track": 30,
                    "name": "The Forsaken - Smith St. Basement (12/28/03)",
                    "duration": "8:56",
                    "file": "SSB12_28_03_TF"
                }, {
                    "track": 31,
                    "name": "All This Is (Take 1) - Smith St. Basement (Nov. '03)",
                    "duration": "4:55",
                    "file": "SSB___11_03_ATITake_1"
                }, {
                    "track": 32,
                    "name": "All This Is (Take 2) - Smith St. Basement (Nov. '03)",
                    "duration": "5:45",
                    "file": "SSB___11_03_ATITake_2"
                }, {
                    "track": 33,
                    "name": "Beneath The Painted Eye (Take 1) - Smith St. Basement (Nov. '03)",
                    "duration": "14:05",
                    "file": "SSB___11_03_BTPETake_1"
                }, {
                    "track": 34,
                    "name": "Beneath The Painted Eye (Take 2) - Smith St. Basement (Nov. '03)",
                    "duration": "13:25",
                    "file": "SSB___11_03_BTPETake_2"
                }, {
                    "track": 35,
                    "name": "The Forsaken (Take 1) - Smith St. Basement (Nov. '03)",
                    "duration": "8:37",
                    "file": "SSB___11_03_TFTake_1"
                }, {
                    "track": 36,
                    "name": "The Forsaken (Take 2) - Smith St. Basement (Nov. '03)",
                    "duration": "8:36",
                    "file": "SSB___11_03_TFTake_2"
                }],
                buildPlaylist = $(tracks).each(function(key, value) {
                    var trackNumber = value.track,
                        trackName = value.name,
                        trackDuration = value.duration;
                    if (trackNumber.toString().length === 1) {
                        trackNumber = '0' + trackNumber;
                    }
                    $('#plList').append('<li> \
                    <div class="plItem"> \
                        <span class="plNum">' + trackNumber + '.</span> \
                        <span class="plTitle">' + trackName + '</span> \
                        <span class="plLength">' + trackDuration + '</span> \
                    </div> \
                </li>');
                }),
                trackCount = tracks.length,
                npAction = $('#npAction'),
                npTitle = $('#npTitle'),
                audio = $('#audio1').on('play', function () {
                    playing = true;
                    npAction.text('Now Playing...');
                }).on('pause', function () {
                    playing = false;
                    npAction.text('Paused...');
                }).on('ended', function () {
                    npAction.text('Paused...');
                    if ((index + 1) < trackCount) {
                        index++;
                        loadTrack(index);
                        audio.play();
                    } else {
                        audio.pause();
                        index = 0;
                        loadTrack(index);
                    }
                }).get(0),
                btnPrev = $('#btnPrev').on('click', function () {
                    if ((index - 1) > -1) {
                        index--;
                        loadTrack(index);
                        if (playing) {
                            audio.play();
                        }
                    } else {
                        audio.pause();
                        index = 0;
                        loadTrack(index);
                    }
                }),
                btnNext = $('#btnNext').on('click', function () {
                    if ((index + 1) < trackCount) {
                        index++;
                        loadTrack(index);
                        if (playing) {
                            audio.play();
                        }
                    } else {
                        audio.pause();
                        index = 0;
                        loadTrack(index);
                    }
                }),
                li = $('#plList li').on('click', function () {
                    var id = parseInt($(this).index());
                    if (id !== index) {
                        playTrack(id);
                    }
                }),
                loadTrack = function (id) {
                    $('.plSel').removeClass('plSel');
                    $('#plList li:eq(' + id + ')').addClass('plSel');
                    npTitle.text(tracks[id].name);
                    index = id;
                    audio.src = mediaPath + tracks[id].file + extension;
                },
                playTrack = function (id) {
                    loadTrack(id);
                    audio.play();
                };
            extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';
            loadTrack(index);
        } else {
            // boo hoo
            $('.column').addClass('hidden');
            var noSupport = $('#audio1').text();
            $('.container').append('<p class="no-support">' + noSupport + '</p>');
        }
    });











</script>