<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 20/01/2019
 * Time: 16:43
 */


$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}

if ($autorisation === true) {

    $id = $_SESSION["id"];
    include('vues/user/infos_user_avatar.php');




    echo " <div class=''>";
    echo "<h1>Changez votre photo de profil :</h1>";
    echo "<form method='post' action='index.php?action=setAvatar' enctype='multipart/form-data'> ";
    echo " <label for='actual__img'>Photo de profil actuelle</label>";
    echo "<img src='uploads/avatar/" . $affiche_user['avatar'] . "' alt='Photo de profil' id='profil_avatar_conf'>";
    echo "<br><br>";
    echo "<label for='fileToUpload''>Changez de photo de profil</label>";
    echo "<input type='file' name='fileToUpload' id='fileToUpload' required>";
    echo "<br><br>";
    echo "<input type='submit' name='submit_avatar' id='update_profil_avatar' value='Mettre à jour'>";
    echo "</form>";



    echo "<a href='?action=downloadData'>Télécharger mes données</a>";
}

?>