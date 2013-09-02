<?php
require_once('Classes/appelClasse.php');
$clientManager = new ClientManager();
$r = $clientManager->connexion($_POST["Email"], $_POST["MDP"]);
header("Content-Type: text/xml ; charset=utf-8");
$resultat = '<?xml version="1.0" encoding="utf-8"?>';
$resultat .= "<reponse>";
$resultat .= "<code>".$r[0]."</code>";
if($r[0]==1)
{
    $resultat .= $r[1]->toXML();
    $_SESSION["client"] = $r[1];
}
else
{
    $resultat .= "<texte>".$r[1]."</texte>";
}
$resultat .= "</reponse>";

echo $resultat;
?>
