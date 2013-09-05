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
    $resultat .= "<texte>".var_dump($r)."</texte>";
}
$resultat .= "</reponse>";

echo $resultat;
?>
