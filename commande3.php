<?php
if (!isset($_SESSION["client"]))
{
    header("Location:pageConnexion.php"); // Vérifie que la personne est bien connectée.
}
require_once("Classes/appelClasse.php");
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Net 2 Print - Impressions depuis internet</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
        <script src="JS/index.js"></script>
        <script src="JS/inscription.js"></script>
        <script src="JS/commande.js"></script>
    </head>
    <body>
        <div data-role="page">
            <div data-role="header" data-position="fixed">
                <h2>Net 2 Print : Vos impressions faciles depuis internet</h2>
                <div data-role="navbar">
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="commande.php" data-transition='slide'>Nouvelle commande</a></li>
                        <li><a href="listeCommande.php">Mes commandes</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <?php
                if (!isset($_SESSION["client"]))
                {
                    ?>
                    <a href="#popupLogin" data-rel="popup" data-position-to="header" data-role="button" data-icon="arrow-r" data-theme="a" data-transition="slidedown" class="ui-btn-right">Connexion</a>
                    <div data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">
                        <form method='post'>
                            <div style="padding:10px 20px;">
                                <label for="un" class="ui-hidden-accessible">Adresse e-mail:</label>
                                <input type="text" name="user" id="un" value="" placeholder="Adresse email" data-theme="a">
                                <label for="pw" class="ui-hidden-accessible">Mot de passe</label>
                                <input type="password" name="pass" id="pw" value="" placeholder="Mot de passe" data-theme="a">
                                <button type="button" data-theme="b" data-icon="check" id='clientConnexionBouton' onclick='clientConnexion()'>Connexion</button>
                                <input type='hidden' name='origine' value='index.php'>
                                <a href='inscription.php' data-role='button'>S'inscrire</a>
                            </div>
                        </form>
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <a href='#' data-role="button" data-icon="check" data-theme="b" class="ui-btn-right">Connecté</a>
                    <?php
                }
                ?>
            </div>
            <div data-role="content">
                <?php
                $upload = new Upload();
                $r      = $upload->link($_FILES["fichier"]);
                if ($r[0] == 1)
                {
                    // Le téléchargement a été effectué correctement et le fichier est correct. 

                    var_dump($_POST)
                    ?> 








                    <?php
                }
                else
                {
                    echo "Erreur lors de l'envoi : " . $r[2];
                }
                ?>
            </div>
            <div data-role="footer" data-position="fixed">
                <h2>Net 2 Print - Service d'impression en ligne</h2>
            </div>
        </div>
    </body>
</html>