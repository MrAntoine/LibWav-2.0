<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 17/01/2019
 * Time: 19:28
 */

$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}

if ($autorisation === true) {

    // Affichage des filtres //
?>


    <!-- ON AFFFICHE LES DIFFERENTES CATEGORIES -->


    <!-- TR<IE SELON LE TYPE  -->

    <form method="post" action="">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher un titre">
        <button type="submit" name="search_submit">Chercher</button>
    </form>



    <?php
/*

    $id_type = "romantique";
    $sql1 = "SELECT * FROM son_categorie WHERE type=?";
    $query1 = $pdo->prepare($sql1);
    $query1->execute(array($id_type));

     echo "<h2>Type de son recherché : ".$id_type."</h2>";

    while ($result1 = $query1->fetch()) {


        echo" coucou";


     }
*/
     ?>












    <?php
    // Bouton upload //
    echo "<a href='?action=uploadSound'>Upload un son</a>";




    // Affichage des sons avec le lecteur et differents boutons //

    echo "<h2>Sons les plus téléchargés : </h2>";

    $contenu = "SELECT * FROM son WHERE nb_telechargements>=5";
    $query_contenu = $pdo->prepare($contenu);
    $query_contenu->execute();


    while ($result = $query_contenu->fetch()) {
        echo "<div class='sound_item'>";


        // Affichage des avatars utilisateur //
            //$id = $result["idCreateur"];
            //include('vues/user/infos_user_avatar.php');


       // echo  "<br/>"."Auteur: " . getUserInfo($result['idCreateur'])['pseudo'] ;
        echo "<br/>"."date: ".$result['date_publi'];
        echo "<br/>"."Titre: ".$result['titre'];
        echo "<br/>"."Description: ".$result['description'];

        echo"<br/>";


        // Vérifié si un like est deja mis..
        $totalLikes = countLikes($result['id']);
        $resultLike = checkLikes($_SESSION['id'],$result['id']);
        if ($resultLike == false) {
            $style = "style='background-color:black'";
        } else {
            $style = "style='background-color:red'";// style css
        }

        echo "<div class='sound_item_likes'>";
        echo "<form class='likesForm' method='POST' action='?action=like'>";
        echo "<input type='hidden'  id='postid' name='idPost' value='" . $result['id'] . "'>";
        echo "<input type='submit' name='like' value='' class='postMsg likes'" . $style . " >";
        echo "</form>";
        echo "<span> Nombre de likes : </span><div class='nb_likes'>" . $totalLikes."</div>";
        echo"</div>";


        echo "<div class='sound_item_controls'>";
        echo "<form class='reportForm' method='POST' action='?action=reportSound'>";
        echo "<input type='hidden'  id='postid' name='idPost' value='" . $result['id'] . "'>";
        echo "<input type='hidden'  id='reporterid' name='idReporter' value='" . $_SESSION['id'] . "'>";
        echo "<input type='submit' name='reportsound' value='report' class='reportsound'>";
        echo "</form>";
        echo "<form class='downloadForm' method='POST' action='?action=downloadSound'>";
        echo "<input type='hidden'  id='postid' name='idPost' value='" . $result['id'] . "'>";
        echo "<input type='hidden'  id='reporterid' name='idReporter' value='" . $_SESSION['id'] . "'>";
        echo "<input type='submit' name='downloadsound' value='download' class='downloadsound'>";
        echo "</form>";
        echo "</div>";


        echo "</div>";
    }




}
?>