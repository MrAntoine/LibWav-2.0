<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 18/02/2019
 * Time: 18:03
 */



$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}

if ($autorisation === true) {

//var_dump($_FILES);
    $target_dir = "uploads/avatar/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if (isset($_POST["submit_avatar"])) {
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
            /*echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";*/
            /*
                        $updateavatar = $bdd->prepare('UPDATE user SET avatar = :avatar WHERE id = :id');
                        $updateavatar->execute(array(
                            'avatar' => $_SESSION['id'].".".$extensionUpload,
                            'id' => $_SESSION['id']
                        ));
            */
            $sql2 = "UPDATE user SET avatar = :avatar WHERE id = :id";
            $query2 = $pdo->prepare($sql2);
            $query2->execute(array(
                'avatar' => $_FILES["fileToUpload"]["name"]/*.".".$imageFileType*/,
                'id' => $_SESSION['id']
            ));
        } else {
            /*echo "Sorry, there was an error uploading your file.";*/
            echo "<script type='text/javascript'>alert(\"Sorry, there was an error uploading your file\");</script>";
        }
    }
}
?>