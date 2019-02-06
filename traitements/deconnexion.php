<?php


if (!isset($_SESSION["id"])) {
    $autorisation = false;
}

if ($autorisation === true) {

    session_destroy();
    header("Location: index.php");
}

?>