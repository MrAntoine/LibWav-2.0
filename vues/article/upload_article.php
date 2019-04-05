<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 22/03/2019
 * Time: 10:50
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



    <div id="ajout_article">
    <form method="post" enctype="multipart/form-data" action="index.php?action=articleUpload">
        <p>
            <label for="fileToUpload" class="choisirbox">Sélectionnez une miniature</label>
            <input type='file' name='fileToUpload' id='fileToUpload' required>
            <input type='text' name='post_title' placeholder='Entrez un titre' required>
            <textarea rows="4" cols="50" name="post_description" placeholder='Entrez une courte description' required></textarea>
            <textarea rows="4" cols="50" name="post_contenu" placeholder='Entrez le contenu' required></textarea>

            <span id="checkbox">
            <input type='checkbox' name='conditions_utilisation' required><a href="?action=cgu">J'accepte les conditions générales
                    d'utilisation, et d'ajout de fichier sonore.</a></span>
            <input type="submit" name="upload" value="Publier">
        </p>
    </form>
    </div>

    <?php
}

?>
