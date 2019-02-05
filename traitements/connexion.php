<?php

$sql = "SELECT * FROM user WHERE pseudo=? AND mdp=PASSWORD(?)";

$query=$pdo->prepare($sql);
$query->execute(array($_POST['pseudo'], $_POST['mdp']));
$line = $query->fetch();

if($line==false){
    //header("Location: index.php?action=login");
    header("Location: google.com");
} else {
    $_SESSION['id'] = $line['id'];
    $_SESSION['pseudo'] = $line['pseudo'];
    //header("Location: index.php?action=actus");
    header("Location: youtube.com");
}

?>
