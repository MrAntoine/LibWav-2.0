<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 07/03/2019
 * Time: 20:27
 */


$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}


?>
<section id="wrapper_tutoriel">
    <?php

    if ($autorisation === true) {

        $id_tuto = $_GET['id'];

        $contenu = "SELECT * FROM tutos WHERE id=? ";
        $query_contenu = $pdo->prepare($contenu);
        $query_contenu->execute(array($id_tuto));
        $result = $query_contenu->fetch();


        $source = $result['video_lien'];

        echo "
    <iframe width='420' height='315' src='".$source."'> </iframe>";



    // echo  "<br/>"."Auteur: " . getUserInfo($result['idCreateur'])['pseudo'] ;
    echo "<br/><span class='tutoriel_item_date'>date: " . $result['date_publi'] . "</span>";
    echo "<br/><span class='tutoriel_item_titre'>Titre: " . $result['titre'] . "</span>";
    echo "<br/>" . "Contenu: " . $result['contenu'];
    echo "<br/>";

    // Vérifié si un like est deja mis..
    $totalLikes = countLikes($result['id']);
    $resultLike = checkLikes($_SESSION["id"], $result['id']);
    if ($resultLike == false) {
        $style = "style='background-color:black'";
    } else {
        $style = "style='background-color:red'";// style css
    }


    /*
    echo "<div class='tutoriel_item_likes'>";
    echo "<form class='likesForm' method='POST' action='?action=like'>";
    echo "<input type='hidden'  id='postid' name='idPost' value='" . $result['id'] . "'>";
    echo "<input type='submit' name='like' value='' class='postMsg likes'" . $style . " >";
    echo "</form>";
    echo "<span> Nombre de likes : </span><div class='nb_likes'>" . $totalLikes . "</div>";
    echo "</div>";


    echo "<div class='sound_item_controls'>";
    echo "<form class='formReport' method='POST' action='?action=soundReport'>";
    echo "<input type='hidden'  id='postid' name='idPost' value='" . $result['id'] . "'>";
    echo "<input type='hidden'  id='reporterid' name='idReporter' value='" . $_SESSION["id"] . "'>";
    echo "<input type='submit' name='reportsound' value='' class='reportsound'>";
    echo "</form>";
    echo "</div>";
    */



    ?>

    <section id="commentaires">
       Commentaires à venir
    </sectio>



        </section>

<?php

/*
        print_r($_GET);

        if ($_GET['id'] == 1) {
            echo " OK";
        } else {
            echo "BYE !";
        }
*/



    }
?>

