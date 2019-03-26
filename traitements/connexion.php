<?php

$sql = "SELECT * FROM user WHERE email=? AND password=PASSWORD(?)";

$query=$pdo->prepare($sql);
$query->execute(array($_POST['email'], $_POST['password']));
$line = $query->fetch();

if($line==false){
    header("Location: index.php?action=login");
} else {
    $_SESSION['id'] = $line['id'];
    $_SESSION['email'] = $line['email'];
    header("Location: index.php?action=son");
    //CHANGER LE HEADER


}


?>
