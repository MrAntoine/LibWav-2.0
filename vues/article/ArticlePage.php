<link rel="stylesheet" href="../../assets/css/articles.css" type="text/css">


<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 22/03/2019
 * Time: 10:42
 */

?>


<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 07/03/2019
 * Time: 19:55
 */

$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}


?>
<section id="wrapper_articles">
    <?php

    if (isset($_GET["id"]) && $_GET["id"] >= 1) {


        if ($autorisation === true) {

            $id_article = $_GET['id'];

            $contenu = "SELECT * FROM articles WHERE id=? ";
            $query_contenu = $pdo->prepare($contenu);
            $query_contenu->execute(array($id_article));
            $result = $query_contenu->fetch();


            $source = $result['image'];

            echo "<a href='?action=article'>Retour à la liste des articles</a> </br>";

            echo "<img src='uploads/article/".$source."' alt='miniature_article' class='miniature' />";


            // echo  "<br/>"."Auteur: " . getUserInfo($result['idCreateur'])['pseudo'] ;
            echo "<br/><span class='article_item_date'>date: " . $result['date_publi'] . "</span>";
            echo "<br/><span class='article_item_titre'>Titre: " . $result['titre'] . "</span>";
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

        }
/*
        ?>

        <section id="commentaires">
            <h3>LES COMMENTAIRES :</h3>

            <form id='form_comment' method='post' action='?action=AddComment' >
                <?php $id = $_SESSION["id"]; include('vues/user/infos_user_avatar.php');?>
                <input type='hidden' name='post_id_comment' value='<?php echo $id_article; ?>'>
                <textarea name='post_contenu_comment' placeholder='Entrez votre commentaire' required></textarea>
                <input type='submit' value='Commenter'>
            </form>
            <div id='wrapper_comment'>
                <?php AfficheComment($id_article); ?>
            </div>
        </section>

        <?php
*/
    }else {

    if ($autorisation === true) {
        // Bouton upload //
        echo "<a id='btn-upload-son' href='?action=uploadArticle'>Publier un article</a>";
    }
    // Affichage des sons avec le lecteur et differents boutons //

    echo "<h2>Tous les articles: </h2>";

    //$contenu = "SELECT * FROM son WHERE nb_telechargements>=5";
    $contenu = "SELECT * FROM articles ";
    $query_contenu = $pdo->prepare($contenu);
    $query_contenu->execute();

    while ($result = $query_contenu->fetch()) {
        afficheArticleItem($result);
    }
    ?>

</section>

<?php
}






?>
