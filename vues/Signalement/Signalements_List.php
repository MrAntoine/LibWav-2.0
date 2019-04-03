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

        echo "<div class='one_user'>";
        echo  "<span class='intitule'>Utilisateur signalé :</span><span class='rempli'>" . lien('?action=profil&id='.getUserInfo($result['id_user'])['id'],getUserInfo($result['id_user'])['pseudo'])."</span>" ;
        echo  "<span class='intitule'>Utilsateur signalant :</span><span class='rempli'> " . lien('?action=profil&id='.getUserInfo($result['id_demandeur'])['id'],getUserInfo($result['id_demandeur'])['pseudo'])."</span>" ;
        echo "<span class='intitule'>Raison :</span><span class='rempli'> ".$result['raison']."</span>";
        echo "<span class='intitule'>Date :</span><span class='rempli'> ".$result['date']."</span>";
        echo "<span class='intitule'>État du signalement :</span><span class='rempli'> ".$result['etat']."</span>";
        echo"</div><br/>";
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
        echo  "<li>"."<span class='intitule'>Son signalé :</span><span class='rempli'>". getSonInfo($result['id_post'])['titre']."</span>" ;
        echo  "<li>"."<span class='intitule'>Utilisateur signalant :</span><span class='rempli'>" . lien('?action=profil&id='.getUserInfo($result['id_demandeur'])['id'],getUserInfo($result['id_demandeur'])['pseudo'])."</span>" ;
        echo "<li>"."<span class='intitule'>Raison :</span><span class='rempli'>".$result['raison']."</span>";
        echo "<li>"."<span class='intitule'>Date :</span><span class='rempli'>".$result['date']."</span>";
        echo "<li>"."<span class='intitule'>État du signalement :</span><span class='rempli'>".$result['etat']."</span>";
        echo "</ul> <br/>";
    }

    echo "</div>";

}else{
    echo "erreur:";
}
?>