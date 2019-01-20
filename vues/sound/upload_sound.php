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


    echo "
<form method=\"post\" enctype=\"multipart/form-data\" action=\"index.php?action=soundUpload\">
 <p> 
 <input type=\"file\" name=\"fichier\" size=\"30\">
<input type='text' name='post_title' placeholder='Entrez un titre' required>
<input type='checkbox' name='conditions_utilisation' required>J'accepte les conditions générales d'utilisation, et d'upload de fichier sonore
  <input type=\"submit\" name=\"upload\" value=\"Uploader\"> 
  </p> 
  </form>";
}

?>