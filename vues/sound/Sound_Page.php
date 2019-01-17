<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 17/01/2019
 * Time: 19:28
 */
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
    if ($role >= 5) {
        $autorisation = true;
    }
}

if ($autorisation === true) {

// Affichage des signalements utilisateurs du plus recent au plus ancien //

    $avert_user = "SELECT * FROM signalements_users";
    $query_user = $pdo->prepare($avert_user);
    $query_user->execute();

    while ($result = $query_user->fetch()) {

        echo  "<br/>"."utilisateur signalé: " . getUserInfo($result['id_user'])['pseudo'] ;
        echo  "<br/>"."demandeur: " . getUserInfo($result['id_demandeur'])['pseudo'] ;
        echo "<br/>"."raison: ".$result['raison'];
        echo "<br/>"."date: ".$result['date'];
        echo "<br/>"."etat: ".$result['etat'];
        echo"<br/>";
    }



}
?>