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

        echo "<iframe width='420' height='315' src='".$source."'> </iframe>";



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



    ?>

    <section id="commentaires">
       Commentaires à venir

        <form id='form_comment' method='post' action='?action=AddComment' >
           <?php $id = $_SESSION["id"]; include('vues/user/infos_user_avatar.php');?>
            <input type='hidden' name='post_id_tuto' value='<?php echo $id_tuto; ?>'>
            <textarea name='post_contenu_tuto' placeholder='Entrez votre commentaire' required></textarea>
            <input type='submit' value='Commenter'>
        </form>
        <div id='wrapper_comment'>
        <?php AfficheComment($id_tuto); ?>
        </div>
    </section>



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

