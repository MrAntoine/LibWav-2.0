<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 17/01/2019
 * Time: 18:49
 */

function roleUser($role){

    switch ($role) {

        case "admin":
            $role = 5;
            break;
        case "modo":
            $role = 4;
            break;
        case "user":
            $role = 3;
            break;
        default:
            $role = 0;
   }

    return $role;
}



function getUserInfo($id) {
    global $pdo;
    $sql = "select * from user where id=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($id));
    $user = $query->fetch();
    return $user;
}


function getSonInfo($id) {
    global $pdo;
    $sql = "select * from son where id=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($id));
    $user = $query->fetch();
    return $user;
}

function needConnect(){
    $message = "Vous devez être connecté pour accéder à ceci ! ";
    return $message;
}

function checkLikes($id_user,$id_contenu){
    global $pdo;
    $sql = "SELECT * FROM likes WHERE (id_user=? AND id_contenu=?)";
    $query = $pdo->prepare($sql);
    $query->execute(array($id_user,$id_contenu));
    $result = $query->fetch();
    return $result;
}

function addLikes($id_user,$id_contenu){
    global $pdo;
    $sql = "INSERT INTO likes VALUES(NULL,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute(array($id_user,$id_contenu));

}

function deleteLikes($id_user,$id_contenu){
    global $pdo;
    $sql = "DELETE FROM likes WHERE (id_user=? AND id_contenu=?)";
    $query = $pdo->prepare($sql);
    $query->execute(array($id_user,$id_contenu));

}

function countLikes($id_contenu){
    global $pdo;
    $sql = "SELECT * FROM likes WHERE id_contenu=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($id_contenu));
    $total = 0;
    while ($result = $query->fetch()) {
        $total = $total +1;
    }
    return $total;
}



function checkSignalementsUser($id_user){
    global $pdo;
    $sql = "SELECT * FROM signalements_users WHERE id_user=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($id_user));
    $total = 0;
    while ($result = $query->fetch()) {
       $total = $total +1;
    }
    return $total;
}

function addUserPoint($nb_points,$id_user){
    global $pdo;
    $sql = "UPDATE user SET points=points+? WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($nb_points,$id_user));

    ConvertPointsToLvl($id_user);

}

function ConvertPointsToLvl($id_user){
    global $pdo;
    $sql = "SELECT points FROM user WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($id_user));
    $result = $query->fetch();
    return $result;
    //
    // Si tu as autant de points, mettre le lvl ... etc
    //
}




?>