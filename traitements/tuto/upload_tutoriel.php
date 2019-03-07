<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 19/01/2019
 * Time: 14:54
 */

$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}

if ($autorisation === true) {

    if (isset($_POST['upload'])) {
$erreur = 0;

        if ($erreur === 0) {

            /*$categoriename = "SELECT id_categorie FROM son_categorie WHERE categorie_name = $_POST['post_categorie']";
            $querycat = $pdo->prepare($categoriename);
            $querycat->execute();
            $resultatCategorie = $query->fetch();
            */

            // on copie le fichier dans le dossier de destination


            $date = date('j.m.Y');
            if (isset($_POST["post_description"])) {
                $description = $_POST['post_description'];
            } else {
                $description = "";
            }


            $sql2 = "INSERT INTO tutos VALUES(NULL,?,?,?,?,?,?,0,NULL)";
            $query2 = $pdo->prepare($sql2);
            $query2->execute(array($_POST['post_title'], $description, $_POST["post_video"], $_POST["post_contenu"], $_SESSION['id'], $date));


            echo "<script type='text/javascript'>alert(\"Upload Successfull\");</script>";

            //redirection
            header("location:index.php?action=tutoriels");

            //reset les champs

            // Attribution des points à l'utilisateur
            addUserPoint(10, $_SESSION['id']);


        } else {
            echo "Une erreur est survenue";
        }


    } else {
        //header("Location:index.php?action=uploadSound");
        echo "erreur vous devez etre connecter";
    }
}

?>




