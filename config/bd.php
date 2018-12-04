<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 04/12/2018
 * Time: 10:30
 */

// Script login.php utilisé pour la connexion à la BD

$host="localhost";
$db="libwav";
$user="root";
$passwd="";


try {
    // création  instance de PDO.
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $passwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br />";
    die(1);
}


?>