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
    $nb_points = $query->fetch();
    return $nb_points;
    //
    // Si tu as autant de points, mettre le lvl ... etc
    //

}

function Report($requette,$id_post,$id_demandeur,$raison,$date,$etat){
    global $pdo;
    $sql = $requette;
    $query = $pdo->prepare($sql);
    $query->execute(array($id_post,$id_demandeur,$raison,$date,$etat));
}

function AddDownload($id_user){
        global $pdo;
        $sql = "UPDATE user SET nb_telechargements=nb_telechargements+1 WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($id_user));
}





function AfficheSoundItem($result){

    echo "<div class='sound_item'>";

// Affichage des avatars utilisateur //
//$id = $result["idCreateur"];
//include('vues/user/infos_user_avatar.php');

// echo  "<br/>"."Auteur: " . getUserInfo($result['idCreateur'])['pseudo'] ;
    echo "<br/>"."date: ".$result['date_publi'];
    echo "<br/>"."Titre: ".$result['titre'];
    echo "<br/>"."Description: ".$result['description'];
    echo"<br/>";

// Vérifié si un like est deja mis..
    $totalLikes = countLikes($result['id']);
    $resultLike = checkLikes($_SESSION['id'],$result['id']);
    if ($resultLike == false) {
        $style = "style='background-color:black'";
    } else {
        $style = "style='background-color:red'";// style css
    }

    echo "<div class='sound_item_likes'>";
        echo "<form class='likesForm' method='POST' action='?action=like'>";
            echo "<input type='hidden'  id='postid' name='idPost' value='" . $result['id'] . "'>";
            echo "<input type='submit' name='like' value='' class='postMsg likes'" . $style . " >";
        echo "</form>";
        echo "<span> Nombre de likes : </span><div class='nb_likes'>" . $totalLikes."</div>";
        echo"</div>";

        echo "<div class='sound_item_controls'>";
        echo "<form class='reportForm' method='POST' action='?action=reportSound'>";
            echo "<input type='hidden'  id='postid' name='idPost' value='" . $result['id'] . "'>";
            echo "<input type='hidden'  id='reporterid' name='idReporter' value='" . $_SESSION['id'] . "'>";
            echo "<input type='texet'  id='raison' name='raison' value='' placeholder='Saisir la raison du signalement' required>";
            echo "<input type='checkbox' id='cgu' name='cgu' required> J'accepte les conditions";
            echo "<input type='submit' name='reportsound' value='report' class='reportsound'>";
        echo "</form>";

        echo "<form class='downloadForm' method='POST' action='?action=downloadSound'>";
            echo "<input type='hidden'  id='postid' name='idPost' value='" . $result['id'] . "'>";
            echo "<input type='hidden'  id='reporterid' name='idReporter' value='" . $_SESSION['id'] . "'>";
            echo "<input type='submit' name='downloadsound' value='download' class='downloadsound'>";
        echo "</form>";
        echo "</div>";
    echo "</div>";

}




?>