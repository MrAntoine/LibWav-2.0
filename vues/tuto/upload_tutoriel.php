<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 19/01/2019
 * Time: 15:32
 */


$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}

if ($autorisation === true) {
    /*  echo"<br/><br/><br/><br/>";
      echo "<form method='POST' action='index.php?action=soundUpload' enctype='multipart/form-data>'";
      echo "<br/>";
      echo "<input type='text' name='post_title' placeholder='Entrez un titre' required>";
      echo "<br/>";
      echo "<input type='text' name='post_description' placeholder='Entrez une courte description'>";
      echo "<br/>";
      echo "<input type='file' name='fichier'>";
      echo "<br/>";
      echo "<input type='checkbox' name='conditions_utilisation' required>J'accepte les conditions générales d'utilisation, et d'upload de fichier sonore";
      echo "<br/>";
      echo "<input type='submit' name='upload' value='Upload'></form>";
  */



    ?>
    <div id="ajout_tuto">
    <form method="post" enctype="multipart/form-data" action="index.php?action=tutorielUpload">
        <p>
            <input type='text' name='post_video' id='post_video' placeholder='Entrez le lien de la vidéo' required><br />
            <input type='text' name='post_title' id='post_title' placeholder='Entrez un titre' required>
            <textarea rows="4" cols="50" name="post_description" maxlength="100" placeholder='Entrez une courte description' required></textarea>
            <textarea rows="4" cols="50" name="post_contenu" placeholder='Entrez le contenu' required></textarea>
            <span id="checkbox"><input type='checkbox' name='conditions_utilisation' required>J'accepte les <br><a href="?action=cgu">conditions générales
                    d'utilisation</a>, et d'upload de fichier sonore</span>
            <input type="submit" name="upload" value="Publier">
        </p>
    </form>
    </div>
    <?php
}

?>