<link rel="stylesheet" href="./assets/css/homepage.css" type="text/css">
<?php

?>
<header class="header">
    <a href="#"><img src="" alt="logo"></a>
    <a href="#presentation">Présentation</a>
    <a href="#equipe">Équipe</a>
    <a href="#footer">Footer</a>

<?php
    echo "<form action=\"index.php?action=connexion\" method=\"POST\">
        <input type=\"text\" placeholder=\"Votre email\" name=\"email\" required>
        <input type=\"password\" placeholder=\"Votre mot de passe\" name=\"password\" required>

        <input type=\"submit\" value=\"Se connecter\">
    </form>";
?>
</header>
<div id="subheader">
<?php
    echo "<div id='mdp'> Mot de passé oublié ?</div>";
    echo "<div id='inscription'><a href='index.php?action=login'>Pas encore inscrit(e) ?</a></div>";
?>
</div>


<br><br><br>
<nav>
    <div class="navbar">
        <div id="first"><div class="hidden">Banque Son</div><span></span></div>
        <div id="second"><div class="hidden">Tutoriels</div><span></span></div>
        <div id="third"><div class="hidden">Articles</div><span></span></div>
        <div id="fourth"><div class="hidden">Communauté</div><span></span></div>
    </div>
</nav>

<div id="presentation">
    <h1>Présentation</h1>
    <article>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae luctus magna, a bibendum magna. Etiam
        feugiat nulla sit amet augue mollis rhoncus. Vivamus tristique viverra sollicitudin. Quisque venenatis pulvinar
        gravida. Sed egestas volutpat porta. Nullam semper hendrerit turpis in dictum. Fusce vel porttitor erat. Etiam
        sollicitudin, magna a interdum auctor, risus felis accumsan sapien, vitae feugiat orci ante eu mi. Phasellus
        arcu lorem, elementum vel leo ut, viverra vulputate neque. Cras non sapien nisi.

        Integer imperdiet diam sed lorem placerat laoreet. Cras interdum ex id ex dapibus dapibus. Morbi nunc diam,
        sagittis vitae neque bibendum, dictum semper massa. Duis semper purus at sollicitudin euismod. Donec turpis
        sapien, elementum in lobortis et, varius malesuada augue. Donec tempor justo ac sapien vulputate pharetra.
        Aenean vel tortor mi. Donec congue massa at turpis facilisis mollis ac iaculis nulla.
    </article>
</div>


<div id="equipe">
    <h1>Équipe</h1>
    <article class="equipe">

        <!--Antoine-->
        <div class="imgleft" id="img1">
            <img src="" alt="photo Antoine">
        </div>

        <div class="text" id="text1">
            <div class="person">Antoine Vanderbrecht</div>
            <div class="role">Chef de projet</div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae luctus magna, a bibendum magna. Etiam
            feugiat nulla sit amet augue mollis rhoncus. Vivamus tristique viverra sollicitudin. Quisque venenatis
            pulvinar gravida. Sed egestas volutpat porta. Nullam semper hendrerit turpis in dictum. Fusce vel porttitor
            erat. Etiam sollicitudin, magna a interdum auctor, risus felis accumsan sapien, vitae feugiat orci ante eu
            mi. Phasellus arcu lorem, elementum vel leo ut, viverra vulputate neque. Cras non sapien nisi.
        </div>

        <div class="imgright" id="rien1"></div>


        <!--Perso2-->
        <div class="imgleft" id="rien2">
        </div>

        <div class="text" id="text2">
            <div class="person">Antoine Vanderbrecht</div>
            <div class="role">Chef de projet</div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae luctus magna, a bibendum magna. Etiam
            feugiat nulla sit amet augue mollis rhoncus. Vivamus tristique viverra sollicitudin. Quisque venenatis
            pulvinar gravida. Sed egestas volutpat porta. Nullam semper hendrerit turpis in dictum. Fusce vel porttitor
            erat. Etiam sollicitudin, magna a interdum auctor, risus felis accumsan sapien, vitae feugiat orci ante eu
            mi. Phasellus arcu lorem, elementum vel leo ut, viverra vulputate neque. Cras non sapien nisi.
        </div>

        <div class="imgright" id="img2">
            <img src="" alt="photo Antoine">
        </div>


        <!--Perso3-->
        <div class="imgleft" id="img3">
            <img src="" alt="photo Antoine">
        </div>

        <div class="text" id="text3">
            <div class="person">Antoine Vanderbrecht</div>
            <div class="role">Chef de projet</div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae luctus magna, a bibendum magna. Etiam
            feugiat nulla sit amet augue mollis rhoncus. Vivamus tristique viverra sollicitudin. Quisque venenatis
            pulvinar gravida. Sed egestas volutpat porta. Nullam semper hendrerit turpis in dictum. Fusce vel porttitor
            erat. Etiam sollicitudin, magna a interdum auctor, risus felis accumsan sapien, vitae feugiat orci ante eu
            mi. Phasellus arcu lorem, elementum vel leo ut, viverra vulputate neque. Cras non sapien nisi.
        </div>

        <div class="imgright" id="rien3"></div>


        <!--Perso4-->
        <div class="imgleft" id="rien4">
        </div>

        <div class="text" id="text4">
            <div class="person">Antoine Vanderbrecht</div>
            <div class="role">Chef de projet</div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae luctus magna, a bibendum magna. Etiam
            feugiat nulla sit amet augue mollis rhoncus. Vivamus tristique viverra sollicitudin. Quisque venenatis
            pulvinar gravida. Sed egestas volutpat porta. Nullam semper hendrerit turpis in dictum. Fusce vel porttitor
            erat. Etiam sollicitudin, magna a interdum auctor, risus felis accumsan sapien, vitae feugiat orci ante eu
            mi. Phasellus arcu lorem, elementum vel leo ut, viverra vulputate neque. Cras non sapien nisi.
        </div>

        <div class="imgright" id="img4">
            <img src="" alt="photo Antoine">
        </div>
    </article>
</div>

<div id="footer"></div>
<footer>
    <div id="barres"!>
        <hr class="barrefine">
        <hr class="barreforte">
        <hr class="barrefine">
    </div>

    <div class="colonnes">
        <div class="plus">
            <ul>
                <li><a href="#">Politique de confidentialité</a></li>
                <li><a href="#">Cookies</a></li>
                <li><a href="#">Conditions d'utilisation</a></li>
                <li><a href="#">Le site map</a></li>
                <li><a href="#">Mentions légales</a></li>
                <li><a href="#">Vos données</a></li>
                <li><a href="#">Droits d'auteur</a></li>
            </ul>
        </div>

        <div class="infos">
            <ul>
                <li><a href="#">Qui sommes-nous ?</a></li>
                <li><a href="#">Contactez-nous</a></li>
                <li><a href="#"><img src="" alt="photo"></a></li>
                <li><a href="#"><img src="" alt="photo"></a></li>
            </ul>
        </div>

        <div class="onglets">
            <ul>
                <li><a href="#">Banque son</a></li>
                <li><a href="#">Tutoriels</a></li>
                <li><a href="#">Articles</a></li>
                <li><a href="#">Communauté</a></li>
            </ul>
        </div>
    </div>

    ça c'est un footer !
</footer>