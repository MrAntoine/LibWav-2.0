<?php

// Checker si le nom de FICHIER est deja utiliser



$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}

if ($autorisation === true) {

    if( isset($_POST['upload'])){

        var_dump($_FILES);
        print_r($_FILES['fichier']);
        $erreur = 0;
        $content_dir = 'uploads/'; // dossier où sera déplacé le fichier
        $tmp_file = $_FILES['fichier']['tmp_name'];

        if (!is_uploaded_file($tmp_file)) {
            exit("Le fichier est introuvable");
            $erreur = 1;
        }

        // on vérifie maintenant l'extension
        $type_file = $_FILES['fichier']['type'];

        if (!strstr($type_file, 'mp3')) {
            exit("Le fichier n'est pas un mp3 !");
            $erreur = 1;
        }

        // on vérifie la taille du fichier
        if ($_FILES["fichier"]["size"] > 1000000) {
            $erreur = 1;
            echo "<script type='text/javascript'>alert(\"Sorry, your file is too large.\");</script>";
        }

/*
        // Check if image file is a actual image or fake image
        $check = getimagesize($tmp_file);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
        } else {
            echo "<script type='text/javascript'>alert(\"File is not an image.\");</script>";
            $erreur = 1;
        }
*/

        $Filepath = $content_dir;
        $Filepath = $Filepath.basename($_FILES['fichier']['name']);
        // Check if file already exists
        if (file_exists($Filepath)) {
            $erreur = 1;
            echo "<script type='text/javascript'>alert(\"Sorry, file already exists.\");</script>";
        }


// CE CODE NE FAIT RIEN

        //$_FILES['fichier']['name'] = $_POST['post_title']; // Renomme le fichier avec le titre
        $name_file = $_FILES['fichier']['name'];
        // Check if file already exists
        if (file_exists($name_file)) {
            $erreur = 1;
            echo "<script type='text/javascript'>alert(\"Sorry, file already exists.\");</script>";
        }
// CE CODE NE FAIT RIEN



        /*
        //
        ////////////////////////////////////////////////////////////////////////////////
        // Peut-être faudrait-il renommer les fihcier uploader avec le nom du titre ?!
        ////////////////////////////////////////////////////////////////////////////////
        //
        */


        $sql = "SELECT * FROM son WHERE titre LIKE Concat (?,'%')";
        $query = $pdo->prepare($sql);
        $query->execute(array($_POST['post_title']));
        $incrementation = 0;
        if($query->fetch()) {
            while ($result = $query->fetch()) {
                $incrementation = $incrementation + 1;
            }
            $_POST['post_title'] = $_POST['post_title'].$incrementation;
        }






        if ($erreur === 0){

            // on copie le fichier dans le dossier de destination
            move_uploaded_file($tmp_file, $content_dir . $name_file);


            $date = date('j.m.Y');
            if (isset($_POST["post_description"])) {
                $description = $_POST['post_description'];
            } else {
                $description = "";
            }
            $file = $_FILES["fichier"]["name"]/*.".".$type_file*/;
            $sql2 = "INSERT INTO son VALUES(NULL,?,?,?,?,?,0,0)";
            $query2 = $pdo->prepare($sql2);
            $query2->execute(array($file,$_POST['post_title'], $description, $_SESSION['id'], $date));

            echo "<script type='text/javascript'>alert(\"Upload Successfull\");</script>";

            //redirection

            //reset les champs



        }else {
            exit("Impossible de copier le fichier dans $content_dir");
        }
    }else {
        echo"erreur dans l'nvoi du formulaire";
    }


}else {
    //header("Location:index.php?action=uploadSound");
    echo "erreur vous devez etre connecter";
}



?>




