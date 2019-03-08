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
echo "Nombre de sons uploadés".$result['COUNT(*)'];




echo "Nombre de sons uploadés : ". Statistique("son");
echo "Nombre de catégories : ". Statistique("son_categorie");
echo "Nombre de téléchargements : ". Statistique("user", "nb_telechargements");

?>