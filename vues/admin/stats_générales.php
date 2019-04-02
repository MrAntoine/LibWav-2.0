<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 07/03/2019
 * Time: 14h36
 */



$sql = "SELECT COUNT(*) FROM son";
// $sql = "SELECT COUNT(*) FROM user HAVING SUM(nb_telechargements)";
$query = $pdo->prepare($sql);
$query->execute();
$result =$query->fetch();



echo "</br>Nombre de total sons uploadés : ". Statistique("son");
echo "</br>Nombre de total d'utilisateurs : ". Statistique("user");
echo "</br>Nombre de total catégories : ". Statistique("son_categorie");
//echo "</br>Nombre de total téléchargements : ". Statistique("user", "nb_telechargements");


?>