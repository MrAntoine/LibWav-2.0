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
    $sql = "SELECT DISTINCT categorie_name, id FROM son_categorie";
    $query = $pdo->prepare($sql);
    $query->execute();
    ?>

    <div id="upload_sound">
    <form method="post" enctype="multipart/form-data" action="index.php?action=soundUpload">
        <p>
            <span>
                <label for='fileToUpload' class='choisirbox'>Choisir le son à ajouter</label>
                <input type='file' name='fichier' id='fileToUpload' required size="30">
                <input type='text' name='post_title' placeholder='Entrez un titre' required>
                <select name='post_categorie' placeholder='Choisir une catégorie' required>
                    <?php
                    while ($result = $query->fetch()) {
                        echo "<option value='".$result['id'] ."'>" . $result['categorie_name'] . "</option> ";
                    }
                    ?>
                </select>
            </span>
            <span id="center">
            <input type='checkbox' name='conditions_utilisation' required><a href="?action=cgu">J'accepte les conditions générales
                    d'utilisation, et d'upload de fichier sonore</a></span>
            <input type="submit" name="upload" value="Uploader">
        </p>
    </form>
    </div>

    <?php
}
?>