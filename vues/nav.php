<link rel="stylesheet" href="../assets/css/general.css" type="text/css">

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


//$_SESSION['id']=21;
//echo $_SESSION['id'];
?>

<div id="mainnav">
    <a href='index.php'><img src="./assets/img/logo.png" alt="LibWav" id="logo"/></a>
    <a href='?action=homepage' class="maintext">Qui sommes-nous ?</a>
    <?php
    if(isset($_GET['action'])) {
            $action = $_GET['action'];
            if($action = 'profil'){
                echo "";
            }else {
        ?>
        <a href='?action=son' id="pagebanque" class="maintext">Banque Son</a>
        <a href='?action=tutoriels' id="pagetutos" class="maintext">Tutoriels</a>
        <a href='?action=articles' id="pagearticles" class="maintext">Articles</a>
        <a href='?action=communaute' id="pagecommunaute" class="maintext">Communauté</a>
        <?php
            }
    }
    if($action = 'profilConfiguration'){
        echo "";
    }
    if(isset($_SESSION['id'])) {
        ?>
        <a href='?action=profil' class="maintext">Mon Profil</a>
        <?php
    }
    if(isset($_SESSION['id'])){
        ?>
        <a href='?action=deconnexion' class="maintext">Deconnexion</a>
        <?php
    }

    /*LOGIN*/
    if(!isset($_SESSION['id'])) {

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



        <?php
    }
    ?>
</div>


            <nav>
                <div class="navbar">
                    <a href="?action=son">
                        <div id="first">
                            <div class="hidden">Banque Son</div>
                            <span>Banque Son</span>
                        </div>
                    </a>

                    <a href="?action=tutoriels">
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

                </div>
            </nav>
            <?php


     if(isset($_GET['action'])) {
         $action = $_GET['action'];
         if ($action == 'profil') {
             echo "";
         }
     }

    if(isset($_GET['action'])) {
        $action = $_GET['action'];
        if ($action == 'profilConfiguration') {
            echo "";
        }
    }
?>



