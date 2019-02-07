<?php

$sql = "SELECT * FROM user WHERE pseudo=? AND password=PASSWORD(?)";

$query=$pdo->prepare($sql);
$query->execute(array($_POST['pseudo'], $_POST['password']));
$line = $query->fetch();

if($line==false){
    header("Location: index.php?action=login");
} else {
    $_SESSION['id'] = $line['id'];
    $_SESSION['pseudo'] = $line['pseudo'];
    header("Location: index.php");
    //CHANGER LE HEADER
}



?>
