<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 17/01/2019
 * Time: 20:56
 */

$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}


if ($autorisation === true) {
    if ($role >= roleUser("modo")) {
        echo "<a href='?action=menuAdmin'>Menu Admin </a>";
    }

}

?>


<nav>
    <div class="navbar">

        <a href="?action=son">
            <div id="first">
                <div class="hidden">Banque Son</div>
                <span>Banque Son</span>
            </div>
        </a>

        <a href="?action=tutos">
            <div id="second">
                <div class="hidden">Tutoriels</div>
                <span>Tutoriels</span>
            </div>
        </a>

        <a href="?action=articles">
            <div id="third">
                <div class="hidden">Articles</div>
                <span>Articles</span>
            </div>
        </a>

        <a href="?action=communaute">
            <div id="fourth">
                <div class="hidden">Communauté</div>
                <span>Communauté</span>
            </div>
        </a>


        <!--<div id="first"><div class="hidden">Banque Son</div><span></span></div>
        <div id="second"><div class="hidden">Tutoriels</div><span></span></div>
        <div id="third"><div class="hidden">Articles</div><span></span></div>
        <div id="fourth"><div class="hidden">Communauté</div><span></span></div>-->
    </div>
</nav>



