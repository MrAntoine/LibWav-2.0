<?php

if(isset($_POST["pseudo"]) && isset($_POST['email']) && isset($_POST['password'])) {
    $sql = "INSERT INTO user ( id, pseudo, email, password )VALUES( NULL, ?,?, PASSWORD(?) )";
    $query = $pdo->prepare($sql);
    $query->execute(array($_POST['pseudo'], $_POST['email'], $_POST['password']));

    session_start();
    //$id = $pdo->lastInsertId();
    //$_SESSION['id'] = $id;
    $_SESSION['pseudo'] = $_POST['pseudo'];
    $_SESSION['password'] = $_POST['password'];
    //header("Location: index.php?action=son");
}

?>
