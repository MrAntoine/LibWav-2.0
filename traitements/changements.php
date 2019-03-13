<?php

$id = $_SESSION['id'];
echo $id;
    if(($_POST["pseudo"])!= NULL){
        $pseudo = $_POST["pseudo"];

        $sql = "UPDATE user SET pseudo = :pseudo WHERE id= :id";
        $query = $pdo->prepare($sql);
        $query->execute(array ('pseudo' => $pseudo, 'id' => $_SESSION['id']));
    };

    if(($_POST["nom"])!= NULL){
        $nom = $_POST["nom"];

        $sql = "UPDATE user SET nom = :nom WHERE id= :id";
        $query = $pdo->prepare($sql);
        $query->execute(array ('nom' => $nom, 'id' => $_SESSION['id']));
    };

    if(($_POST["prenom"])!= NULL){
        $prenom= $_POST["prenom"];

        $sql = "UPDATE user SET prenom = :prenom WHERE id= :id";
        $query = $pdo->prepare($sql);
        $query->execute(array ('prenom' => $prenom, 'id' => $_SESSION['id']));
    };

    if(($_POST["sexe"])!= NULL){
    $sexe = $_POST["sexe"];

    $sql = "UPDATE user SET sexe = :sexe WHERE id= :id";
    $query = $pdo->prepare($sql);
    $query->execute(array ('sexe' => $sexe, 'id' => $_SESSION['id']));
    };

    if(($_POST["anniversaire"])!= NULL){
        $anniversaire = $_POST["anniversaire"];

        $sql = "UPDATE user SET anniversaire = :anniversaire WHERE id= :id";
        $query = $pdo->prepare($sql);
        $query->execute(array ('anniversaire' => $anniversaire, 'id' => $_SESSION['id']));
    };


    if(($_POST["pays"])!= NULL){
        $pays = $_POST["pays"];

        $sql = "UPDATE user SET pays = :pays WHERE id= :id";
        $query = $pdo->prepare($sql);
        $query->execute(array ('pays' => $pays, 'id' => $_SESSION['id']));
    };


    if(($_POST["region"])!= NULL){
        $region = $_POST["region"];

        $sql = "UPDATE user SET region = :region WHERE id= :id";
        $query = $pdo->prepare($sql);
        $query->execute(array ('region' => $region, 'id' => $_SESSION['id']));
    };

        header("Location: index.php?action=login");
//  }

    ?>