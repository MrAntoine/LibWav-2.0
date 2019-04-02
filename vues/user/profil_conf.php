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

    echo "<div id='profil_conf'><h2>Modifier mon profil</h2>";


    $id = $_SESSION["id"];
    include('vues/user/infos_user_avatar.php');


    // IMAGE
    echo "<div id='photoprofil'><form method='post' action='index.php?action=setAvatar' enctype='multipart/form-data'> ";
    echo " <label for='actual__img'><h3>Photo de profil actuelle :</h3></label>";
    echo "<img src='uploads/avatar/" . $affiche_user['avatar'] . "' alt='Photo de profil' id='profil_avatar_conf'>";
    echo "<br><br>";
    echo "<label for='fileToUpload' class='choisirbox'>Choisir ma nouvelle photo de profil</label>";
    echo "<input type='file' name='fileToUpload' id='fileToUpload' required>";
    echo "<br><br>";
    echo "<input type='submit' name='submit_avatar' id='update_profil_avatar' value='Mettre à jour ma photo de profil'>";
    echo "</form>";

    echo "<br></div>";

    //TOUT
    echo "<br /><h3>Mes données personnelles : </h3><form method='POST' action='index.php?action=changements'><div id='dataperso'>";


    echo "<label id='changer_pseudo'>Changer mon pseudo : </label>";
    if (getUserInfo($_SESSION["id"])['pseudo'] != NULL) {
        echo "<input type='text' name='pseudo' id='pseudo' placeholder='" . getUserInfo($_SESSION['id'])['pseudo'] . "'>";
    };


    echo "<label id='changer_nom'>Mon nom : </label>";
    if (getUserInfo($_SESSION["id"])['nom'] != NULL) {
        echo "<input type='text' name='nom' class='nom' placeholder='" . getUserInfo($_SESSION['id'])['nom'] . "'>";
    } else {
        echo "<input type='text' name='nom' class='nom' >";
    }

    echo "<label id='changer_prenom'>Mon prénom : </label>";
    if (getUserInfo($_SESSION["id"])['prenom'] != NULL) {
        echo "<input type='text' name='prenom' class='prenom' placeholder='" . getUserInfo($_SESSION['id'])['prenom'] . "'>";
    } else {
        echo "<input type='text' name='prenom' class='prenom'>";
    }


    echo "<label id='changer_sexe'>Je suis êtes un(e) : </label>";
    if($affiche_user["sexe"] == NULL ){
        echo "<select name=\"sexe\" class='sexe' required='required'>
                    <option value=''>Sélectionner votre sexe...</option>
                    <option value='Homme'>Homme</option>
                    <option value='Femme'>Femme</option>
                    <option value='Autre'>Autre</option>
               </select>";
    }else {
        echo "<p class='sexe'>".$affiche_user["sexe"]."</p>";
    };



    echo "<label id='changer_anniv'>Je suis né(e) le : </label>";
    if ($affiche_user['anniversaire']==NULL) {
        echo "<input type=\"date\" name=\"anniversaire\" class='anniv' value=\"date('Y-m-d')\" />";
    }else {
        echo "<p class='anniv'>".$affiche_user["anniversaire"]."</p>";
    }



    echo "<label id='changer_lieu'>Je viens de : </label>";
    if ($affiche_user['pays'] == NULL){
        echo "<input type='text' name='pays' class='pays' required='required'/>";
    }else{
        echo "<p class='pays'>".$affiche_user['pays']."</p>";
    }


    if ($affiche_user['region'] == NULL){
        echo "<select name='region' class='region' required='required'>
                    <option value=''>Sélectionnez une région...</option>
                    <option value='Auvergne-Rhône-Alpes'>Auvergne-Rhône-Alpes</option>
                    <option value='Bourgogne-Franche-Comté'>Bourgogne-Franche-Comté</option>
                    <option value='Bretagne'>Bretagne</option>
                    <option value='Centre-Val de Loire'>Centre-Val de Loire</option>
                    <option value='Corse'>Corse</option>
                    <option value='Grand Est'>Grand Est</option>
                    <option value='Guadeloupe'>Guadeloupe</option>
                    <option value='Guyane'>Guyane</option>
                    <option value='Hauts-de-France'>Hauts-de-France</option>
                    <option value='Île-de-France'>Île-de-France</option>
                    <option value='Martinique'>Martinique</option>
                    <option value='Mayotte'>Mayotte</option>
                    <option value='Normandie'>Normandie</option>
                    <option value='Nouvelle-Aquitaine'>Nouvelle-Aquitaine</option>
                    <option value='Occitanie'>Occitanie</option>
                    <option value='Pays de la Loire'>Pays de la Loire</option>
                    <option value='Provence-Alpes-Côte d'Azur'>Provence-Alpes-Côte d'Azur</option>
                    <option value='La Réunion'>La Réunion</option>
                    <option value='Autre'>Autre</option>
                </select>";
    }else{
        echo "<p class='region'>".$affiche_user['region']."</p>";
    };

    echo "</div><br/><input type='submit' id='enregistrermodifs' value='Enregistrer les modifications'/>";
    echo "</form>";


    echo "<br /><a href='?action=downloadData' id='downloaddata'>Télécharger mes données</a>";

    echo "</div>";
}


?>
