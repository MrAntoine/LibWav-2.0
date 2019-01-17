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


?>