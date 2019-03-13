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

    // IMAGE
    echo "<form method='post' action='index.php?action=setAvatar' enctype='multipart/form-data'> ";
    echo " <label for='actual__img'>Photo de profil actuelle</label>";
    echo "<img src='uploads/avatar/" . $affiche_user['avatar'] . "' alt='Photo de profil' id='profil_avatar_conf'>";
    echo "<br><br>";
    echo "<label for='fileToUpload''>Changez de photo de profil</label>";
    echo "<input type='file' name='fileToUpload' id='fileToUpload' required>";
    echo "<br><br>";
    echo "<input type='submit' name='submit_avatar' id='update_profil_avatar' value='Mettre à jour ma photo'>";
    echo "</form>";

    echo "<br>";

    //TOUT
    echo "<form method='POST' action='index.php?action=changements'>";


    echo "<label>Changer votre pseudo : </label>";
    if (getUserInfo($_SESSION["id"])['pseudo'] != NULL) {
        echo "<input type='text' name='pseudo' placeholder='" . getUserInfo($_SESSION['id'])['pseudo'] . "'><br />";
    };


    echo "<label>Votre nom ? </label>";
    if (getUserInfo($_SESSION["id"])['nom'] != NULL) {
        echo "<input type='text' name='nom' placeholder='" . getUserInfo($_SESSION['id'])['nom'] . "'><br />";
    } else {
        echo "<input type='text' name='nom'><br />";
    }

    echo "<label>Votre prénom ? </label>";
    if (getUserInfo($_SESSION["id"])['prenom'] != NULL) {
        echo "<input type='text' name='prenom' placeholder='" . getUserInfo($_SESSION['id'])['prenom'] . "'><br />";
    } else {
        echo "<input type='text' name='prenom'><br />";
    }

    echo "<label>Vous êtes : </label>";
    if($affiche_user["sexe"] == NULL ){
        echo "<select name=\"sexe\">
                    <option>Homme</option>
                    <option>Femme</option>
                    <option>Autre</option>
               </select><br />";
    }else {
        echo $affiche_user["sexe"];
    };



    echo "<label>Vous êtes né(e) le: </label>";
    if ($affiche_user['anniversaire']=="0000-00-00"){
        echo "<input type=\"text\" placeholder=\"JJ\" name=\"jour\" maxlength=\"2\"/>
              <input type=\"text\" placeholder=\"MM\" name=\"mois\" maxlength=\"2\"/>
              <input type=\"text\" placeholder=\"AAAA\" name=\"année\" maxlength=\"4\"/>";
    }else {
        echo $affiche_user["anniversaire"];
    };


    echo "<br /><label>Vous venez de : </label>";
    if ($affiche_user['pays'] == NULL){
        echo "<input type='text' name='pays' />";
    }else{
        echo $affiche_user['pays'];
    }

    echo ", ";

    if ($affiche_user['region'] == NULL){
        echo "<select name='region'>
                    <option>Auvergne-Rhône-Alpes</option>
                    <option>Bourgogne-Franche-Comté</option>
                    <option>Bretagne</option>
                    <option>Centre-Val de Loire</option>
                    <option>Corse</option>
                    <option>Grand Est</option>
                    <option>Guadeloupe</option>
                    <option>Guyane</option>
                    <option>Hauts-de-France</option>
                    <option>Île-de-France</option>
                    <option>Martinique</option>
                    <option>Mayotte</option>
                    <option>Normandie</option>
                    <option>Nouvelle-Aquitaine</option>
                    <option>Occitanie</option>
                    <option>Pays de la Loire</option>
                    <option>Provence-Alpes-Côte d'Azur</option>
                    <option>La Réunion</option>
                    <option>Autre</option>
                </select>";
    }else{
        echo $affiche_user['region'];
    };

    echo "<br/><input type='submit' value='Enregistrer les modifications' />";
    echo "</form>";


    echo "<br /><a href='?action=downloadData'>Télécharger mes données</a>";
}


?>