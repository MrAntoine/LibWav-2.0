<?php
    if(isset($_POST["sexe"]) && isset($_POST['jour']) && isset($_POST['mois']) && isset($_POST['année'])) {
        $sql = "INSERT INTO user (sexe, anniversaire)VALUES(?, ?-?-?)";


        //session_start();
        //$id = $pdo->lastInsertId();
        header("Location: index.php?action=son");
    }

    ?>