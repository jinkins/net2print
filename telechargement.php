<?php

require_once("Classes/appelClasse.php");
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');

$upload = new Upload();
$r      = $upload->link($_FILES["fichier"]);
if ($r[0] == 1)
{
    // Le téléchargement a été effectué correctement et le fichier est correct. 
    unset($_SESSION["fichier"]);
    $_SESSION["fichier"]["nom"] = $r[1]["nom"];
    $_SESSION["fichier"]["nbPages"] = $r[1]["nbPages"];
    $_SESSION["infos"] = $_POST;
    header('Location:commande2.php');
}
else
{
    $_SESSION["message"] = $r[1];
    header("Location:commande.php");
}
?>