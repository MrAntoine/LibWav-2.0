<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 20/01/2019
 * Time: 16:36
 */


$sql = "SELECT * FROM user WHERE id=?";
$query = $pdo->prepare($sql);
$query->execute(array($_SESSION['id']));

while($result = $query->fetch()) {

    /*
        $taille = sizeof($result);
        for ($i = 0; $i <$taille; $i++){
            unset($result[$i]);
        }
        foreach ($result as $key => $value) {
            echo $key." : ".$value;
            echo "<br/>";
        }
    */


    $File = $result['nom'] . "-" . $result['prenom'] . "-" . date('j.m.Y') . ".txt";


        $Handle = fopen($File, 'w');

        $Data = "Votre pseudo : " . $result['pseudo'] . "\n";
        fwrite($Handle, $Data);
        $Data = "Votre nom : " . $result['nom'] . "\n";
        fwrite($Handle, $Data);
        $Data = "Votre prénom : " . $result['prenom'] . "\n";
        fwrite($Handle, $Data);
        $Data = "Votre email : " . $result['email'] . "\n";
        fwrite($Handle, $Data);
        $Data = "Votre sexe : " . $result['sexe'] . "\n";
        fwrite($Handle, $Data);
        $Data = "Votre date de naissance : " . $result['anniversaire'] . "\n";
        fwrite($Handle, $Data);
        $Data = "Votre région : " . $result['region'] . "\n";
        fwrite($Handle, $Data);
        $Data = "Votre pays : " . $result['pays'] . "\n";
        fwrite($Handle, $Data);
        $Data = "Votre statut : " . $result['statut'] . "\n";
        fwrite($Handle, $Data);
        $Data = "Date de création du compte : " . $result['created_at'] . "\n";
        fwrite($Handle, $Data);
        $Data = "Votre temps total de connexion : " . $result['temps_connexion'] . "\n";
        fwrite($Handle, $Data);
        $Data = "Votre nombre de téléchargements : " . $result['nb_telechargements'] . "\n";
        fwrite($Handle, $Data);
        $Data = "Votre nombre de points : " . $result['points'] . "\n";
        fwrite($Handle, $Data);
        $Data = "©Libwav\n";
        fwrite($Handle, $Data);

        fclose($Handle);



    // TELECHARGEMENT AUTOMATIQUE DU FICHIER

    switch(strrchr(basename($File), ".")) {
        case ".gz": $type = "application/x-gzip"; break;
        case ".tgz": $type = "application/x-gzip"; break;
        case ".zip": $type = "application/zip"; break;
        case ".pdf": $type = "application/pdf"; break;
        case ".png": $type = "image/png"; break;
        case ".gif": $type = "image/gif"; break;
        case ".jpg": $type = "image/jpeg"; break;
        case ".txt": $type = "text/plain"; break;
        case ".htm": $type = "text/html"; break;
        case ".html": $type = "text/html"; break;
        default: $type = "application/octet-stream"; break;
    }
    header("Content-disposition: attachment; filename=$File");
    header("Content-Type: application/force-download");
    header("Content-Transfer-Encoding: $type\n"); // ne pas enlever le \n
    header("Content-Length: ".filesize($File));
    header("Pragma: no-cache");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
    header("Expires: 0");
    readfile($File);


    // suppression du fichier :
    //unlink($File);




    /*
        // create handle for new PDF document
        $pdf = pdf_new();
    // open a file
        pdf_open_file($pdf, "test.pdf");
    // start a new page (A4)
        pdf_begin_page($pdf, 595, 842);
    // get and use a font object
        $arial = pdf_findfont($pdf, "Arial", "host", 1); pdf_setfont($pdf, $arial, 10);
    // print text
        pdf_show_xy($pdf, "There are more things in heaven and earth, Horatio,",50, 750);
        pdf_show_xy($pdf, "than are dreamt of in your philosophy", 50,730);
    // end page
        pdf_end_page($pdf);
    // close and save file
        pdf_close($pdf);
    */

}
?>