<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 18/02/2019
 * Time: 16:05
 */


$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
            $autorisation = true;
    }
}

if ($autorisation === true) {
    echo "<div id='div_report'>";
    echo "<form class='reportForm' method='POST' action='?action=reportSound'>";
    echo "<input type='hidden'  id='postid' name='idPost' value='" . $_POST['idPost'] . "'>";
    echo "<input type='hidden'  id='reporterid' name='idReporter' value='" . $_SESSION['id'] . "'>";
    echo "<input type='text'  id='raison' name='raison' value='' placeholder='Saisir la raison du signalement' required><br />";
    echo "<span id='conditions'><input type='checkbox' id='cgu' name='cgu' required> <a href='?action=cgu' target='_blank'>J'accepte les conditions</a>";
    echo "<input type='submit' name='reportsound' value='' class='reportsound'></span>";
    echo "</form>";
    echo "</div>";

}
?>