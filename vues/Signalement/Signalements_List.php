<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 17/01/2019
 * Time: 20:36
 */

$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("admin")) {
        $autorisation = true;
    }
}

if ($autorisation === true) {

// Affichage des signalements utilisateurs du plus recent au plus ancien //

    $avert_user = "SELECT * FROM signalements_users WHERE etat!='traité'";
    $query_user = $pdo->prepare($avert_user);
    $query_user->execute();

    echo "<h2>Utilisateurs signalés : </h2>";

    echo "<div id='utilisateurs_signales'>";

    while ($result = $query_user->fetch()) {

        echo  "<br/>"."<span class='intitule'>Utilisateur signalé :</span> " . lien('?action=profil&id='.getUserInfo($result['id_user'])['id'],getUserInfo($result['id_user'])['pseudo']) ;
        echo  "<br/>"."<span class='intitule'>Utilsateur signalant :</span> " . lien('?action=profil&id='.getUserInfo($result['id_demandeur'])['id'],getUserInfo($result['id_demandeur'])['pseudo']) ;
        echo "<br/>"."<span class='intitule'>Raison :</span> ".$result['raison'];
        echo "<br/>"."<span class='intitule'>Date :</span> ".$result['date'];
        echo "<br/>"."<span class='intitule'>État du signalement :</span> ".$result['etat'];
        echo"<br/>";
    }
    echo "</div>";

// Affichage des signalements utilisateurs du plus recent au plus ancien //

    $avert_post = "SELECT * FROM signalements_posts WHERE etat!='traité'";
    $query_post = $pdo->prepare($avert_post);
    $query_post->execute();

    echo "<h2>Sons signalés :</h2>";

    echo "<div id='sons_signales'>";


    while ($result = $query_post->fetch()) {
        echo "<ul>";
        echo  "<li>"."<span class='intitule'>Son signalé :</span> " . getSonInfo($result['id_post'])['titre'] ;
        echo  "<li>"."<span class='intitule'>Utilisateur signalant :</span>" . lien('?action=profil&id='.getUserInfo($result['id_demandeur'])['id'],getUserInfo($result['id_demandeur'])['pseudo']) ;
        echo "<li>"."<span class='intitule'>Raison :</span>".$result['raison'];
        echo "<li>"."<span class='intitule'>Date :</span>".$result['date'];
        echo "<li>"."<span class='intitule'>État du signalement :</span>".$result['etat'];
        echo "</ul> <br/>";
    }

    echo "</div>";

}else{
    echo "erreur:";
}
?>