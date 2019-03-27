<link rel="stylesheet" href="../../assets/css/general.css" type="text/css">
<link rel="stylesheet" href="../../assets/css/tutos.css" type="text/css">


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
    <section id="wrapper_tutoriel">
<?php

if (isset($_GET["id"]) && $_GET["id"] >= 1) {


    if ($autorisation === true) {

        $id_tuto = $_GET['id'];

        $contenu = "SELECT * FROM tutos WHERE id=? ";
        $query_contenu = $pdo->prepare($contenu);
        $query_contenu->execute(array($id_tuto));
        $result = $query_contenu->fetch();


        $source = $result['video_lien'];

        echo "<a href='?action=tutoriels' id='retour_tutos'>Retour à la liste des tutoriels</a> </br>";

        echo "<br/><h2 class='tutoriel_item_titre'> Tuto Conseils et Matériel PART1 en intérieur</h2>";
        echo "<br/><h4 class='tutoriel_item_date'>Tuto publié le " . /*$result['date_publi'] .*/ " 2019-03-28</h4><br />";


        echo "<div id='two_sides'>";
        echo "<iframe allow='fullscreen' width='420' height='315' src='" . $source . "' id=\'video\'> </iframe>";


        // echo  "<br/>"."Auteur: " . getUserInfo($result['idCreateur'])['pseudo'] ;

        /*. $result['titre'] .*/

        echo "<br/><div id='texte'>" /*.$result['contenu'];*/
        ?>

        Bonjour à tous !
        Libwav vous propose dès maintenant un tutoriel pour vous présenter le matériel à utiliser ainsi que quelques
        conseils et astuces lorsque vous voulez tourner une vidéo et obtenir une bande son correcte. Celui-ci est découpé
        en deux parties : la première partie concerne le matériel utile en intérieur et la deuxième partie traite
        l'utilisation du matériel en prise de son extérieure.
        Je vous laisse avec la vidéo et je vous souhaite une bonne captation !
    <?php
        echo "</div></div><br/>";

        // Vérifié si un like est deja mis..
        $totalLikes = countLikes($result['id']);
        $resultLike = checkLikes($_SESSION["id"], $result['id']);
        if ($resultLike == false) {
            $style = "style='background-color:black'";
        } else {
            $style = "style='background-color:red'";// style css
        }

    }

        ?>

        <section id="commentaires">
            <h3>Vos commentaires : </h3>

            <form id='form_comment' method='post' action='?action=AddComment' >
                <?php $id = $_SESSION["id"]; include('vues/user/infos_user_avatar.php');?>
                <input type='hidden' name='post_id_tuto' value='<?php echo $id_tuto; ?>'>
                <div id="commentaires">
                <textarea name='post_contenu_tuto' placeholder='Entrez votre commentaire' required></textarea>
                <input type='submit' value='Commenter'></div>
            </form>
            <div id='wrapper_comment'>
                <?php AfficheComment($id_tuto); ?>
            </div>
        </section>

    <?php
}else {

        if ($autorisation === true) {
            // Bouton upload //
            echo "<a id='btn-upload-son' href='?action=uploadTutoriel'>Publier un tutoriel</a>";
        }
        // Affichage des sons avec le lecteur et differents boutons //

        echo "<h2>Nos derniers tutos :</h2>";

        //$contenu = "SELECT * FROM son WHERE nb_telechargements>=5";
        $contenu = "SELECT * FROM tutos ";
        $query_contenu = $pdo->prepare($contenu);
        $query_contenu->execute();

        while ($result = $query_contenu->fetch()) {
            afficheTutorielItem($result);
        }
        ?>

    </section>

    <?php
}






?>