<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 17/01/2019
 * Time: 19:24
 */

//var_dump($_POST);

if(!isset($_POST['categorie_name']) || ($_POST['categorie_name'] == NULL)) {
    //exit(header('Location: ?action=son'));

}else {
    if(isset($_POST['categorie_name'])) {
        $filtre = $_POST['categorie_name'];
    }

    echo "<h2>Sons correspondant à la catégorie : ".$filtre ."</h2>";

    $contenu = "SELECT * FROM son WHERE id_son_categorie IN (SELECT id FROM son_categorie WHERE categorie_name=?)";
    $query_contenu = $pdo->prepare($contenu);
    $query_contenu->execute(array($filtre));
    $nb = 0;
        while ($result = $query_contenu->fetch()) {
            $nb++;
            afficheSoundItem($result);
        }

        if($nb == 0){
            echo "Aucun résultat";
        }


}


?>

