<link rel="stylesheet" href="../assets/css/general.css" type="text/css">
<?php

?>
<header id="mainnav">
    <a href='index.php'><img src="" alt="LibWav"/></a>
    <a href='?action=homepage'>Qui sommes-nous ?</a>

    <?php
    echo "<form action=\"index.php?action=connexion\" method=\"POST\">
        <input type=\"text\" placeholder=\"Votre email\" name=\"email\" required>
        <input type=\"password\" placeholder=\"Votre mot de passe\" name=\"password\" required>

        <input type=\"submit\" value=\"Se connecter\">
    </form>";
    ?>
</header>
<div id="subheader">
    <?php
    echo "<div id='mdp'> Mot de passé oublié ?</div>";
    echo "<div id='inscription'><a href='index.php?action=login'>Pas encore inscrit(e) ?</a></div>";
    ?>
</div>

<?php
include('vues/nav.php');
?>