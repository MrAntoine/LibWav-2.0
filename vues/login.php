<?php

//LOGIN
echo "<div class=\"wrapper\"><div class=\"\">
        <h1>Connectez-vous !</h1>";
echo "<form action=\"index.php?action=connexion\" method=\"POST\">
<input type=\"text\" placeholder=\"Votre email\" name=\"email\" required>
<input type=\"password\" placeholder=\"Votre mot de passe\" name=\"password\" required>

<input type=\"submit\" value=\"Se connecter\">
</form>";

echo "<br><br><br>";

//CREATION COMPTE
echo "<div class=\"\">
        <h2>Pas encore inscrit(e) ?</h2><h3>Mais qu'attendez-vous ?</h3><h1>Inscrivez-vous vite ! </h1>";
echo "<form method=\"post\" action=\"index.php?action=register\" name=\"creation\">
            <input type=\"text\" required name=\"pseudo\" placeholder=\"Votre pseudo\">
            <input type=\"email\" required name=\"email\" placeholder=\"Votre e-mail\">
            <input type=\"password\" required name=\"password\" placeholder=\"Votre mot de passe\">
            <input type=\"password\" required name=\"passwordconf\" placeholder=\"Confirmez votre mot de passe\">";
echo "<input type=\"submit\" name=\"send\" value=\"Être enfin inscrit(e) sur LibWav!\">
        </form>
    </div></div>";



?>

