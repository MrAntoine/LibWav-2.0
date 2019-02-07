<?php

$autorisation=false;

if (isset($_SESSION["id"])) {
    $autorisation = true;
}

if ($autorisation === true) {

    session_destroy();
    //header("Location: index.php");
    header("Location: index.php?action=son");

}

?>