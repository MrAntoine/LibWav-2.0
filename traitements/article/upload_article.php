<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 22/03/2019
 * Time: 10:51
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


//var_dump($_FILES);
        $target_dir = "uploads/article/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if (isset($_POST["fileToUpload"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                /*echo "File is an image - " . $check["mime"] . ".";*/
                $uploadOk = 1;
            } else {
                /*echo "File is not an image.";*/
                echo "<script type='text/javascript'>alert(\"File is not an image.\");</script>";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            /*echo "Sorry, file already exists.";*/
            echo "<script type='text/javascript'>alert(\"Sorry, file already exists.\");</script>";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["fileToUpload"]["size"] > 50000000) {
            /*echo "Sorry, your file is too large.";*/
            echo "<script type='text/javascript'>alert(\"Sorry, your file is too large.\");</script>";
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            /* echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";*/
            echo "<script type='text/javascript'>alert(\"Sorry, only JPG, JPEG, PNG & GIF files are allowed.\");</script>";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error





        if ($uploadOk == 0) {
            /*echo "Sorry, your file was not uploaded.";*/
            echo "<script type='text/javascript'>alert(\"Sorry, your file was not uploaded.\");</script>";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                $url = $_FILES["fileToUpload"]["name"]/*.".".$imageFileType*/;


                $date = date('j.m.Y');
                if (isset($_POST["post_description"])) {
                    $description = $_POST['post_description'];
                } else {
                    $description = "";
                }


                $sql2 = "INSERT INTO articles VALUES(NULL,?,?,?,?,?,?,0,NULL)";
                $query2 = $pdo->prepare($sql2);
                $query2->execute(array($_POST['post_title'], $description, $url, $_POST["post_contenu"], $_SESSION['id'], $date));


                echo "<script type='text/javascript'>alert(\"Upload Successfull\");</script>";

                //redirection
                header("location:index.php?action=article");

                //reset les champs

                // Attribution des points à l'utilisateur
                addUserPoint(10, $_SESSION['id']);



            } else {
                /*echo "Sorry, there was an error uploading your file.";*/
                echo "<script type='text/javascript'>alert(\"Sorry, there was an error uploading your file\");</script>";
            }
        }



    } else {
        //header("Location:index.php?action=uploadSound");
        echo "Formulaire non envoye";
    }


    } else {
        //header("Location:index.php?action=uploadSound");
        echo "erreur vous devez etre connecter";
    }






?>




