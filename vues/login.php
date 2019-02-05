<?php

//LOGIN
echo "<div class=\"wrapper\"><div class=\"\">
        <img src=\"LOGO\" alt=\"Logo\" class=\"\">
        <h1>Connectez-vous !</h1>";
echo "<form action=\"index.php?action=connexion\" method=\"POST\">
<input type=\"text\" placeholder=\"Votre pseudo\" name=\"login\" required>
<input type=\"password\" placeholder=\"Votre mot de passe\" name=\"mdp\" required>

<input type=\"submit\" value=\"Se connecter\">
</form>";

echo "<br><br><br>";

//CREATION COMPTE
echo "<div class=\"\">
        <h2>Pas encore inscrit(e) ?</h2><h3>Mais qu'attendez-vous ?</h3><h1>Inscrivez-vous vite ! </h1>";
echo "<form method=\"post\" action=\"index.php?action=register\" name=\"creation\">
            <input type=\"text\" required name=\"Pseudo\" placeholder=\"Votre pseudo\">
            <input type=\"email\" required name=\"email\" placeholder=\"Votre e-mail\">
            <input type=\"password\" required name=\"mdp\" placeholder=\"Votre mot de passe\">";
echo "<input type=\"submit\" name=\"send\" value=\"Être enfin inscrit(e) sur LibWav!\">
        </form>
    </div></div>";

?>
