<?php
require_once('Classes/appelClasse.php');

$clientManager = new ClientManager();
header("Content-Type: text/xml ; charset=utf-8");
$resultat = '<?xml version="1.0" encoding="utf-8"?>';
$resultat .= "<reponse>";
$c = new Client($_POST);
$r = $clientManager->insert($c);

if($r === TRUE)
{
    $resultat .= "<code>1</code>";
    $_SESSION["client"] = $r;
}

else
{
    $resultat .= "<code>2</code>";
    $resultat .= "<texte>Erreur lors de l'inscription. Merci de vérifier que vous n'êtes pas déjà client et si vous avez correctement rempli tous les champs.</texte>";
}
$resultat .= "</reponse>";

echo $resultat;
?>
