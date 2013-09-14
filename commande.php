<?php
require_once('Classes/appelClasse.php');
if(!isset($_SESSION["client"]))
    {
        header("Location:pageConnexion.php"); // Vérifie que la personne est bien connectée.
    }
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
    </head>
    <body>
        <div data-role="page">
            <div data-role="header" data-position="fixed" data-theme="c">
                <h2>Net 2 Print : Vos impressions faciles depuis internet</h2>
                <div data-role="navbar">
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="commande.php" data-transition='pop'>Nouvelle commande</a></li>
                        <li><a href="listeCommande.php">Mes commandes</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <?php
                if (!isset($_SESSION["client"]))
                {
                    ?>
                    <a href="#popupLogin" data-rel="popup" data-position-to="header" data-role="button" data-icon="arrow-r" data-theme="b" data-transition="slidedown" class="ui-btn-right">Connexion</a>
                    <div data-role="popup" id="popupLogin" data-theme="b" class="ui-corner-all">
                        <form method='post'>
                            <div style="padding:10px 20px;">
                                <label for="un" class="ui-hidden-accessible">Adresse e-mail:</label>
                                <input type="text" name="user" id="un" value="" placeholder="Adresse email" data-theme="a"/>
                                <label for="pw" class="ui-hidden-accessible">Mot de passe</label>
                                <input type="password" name="pass" id="pw" value="" placeholder="Mot de passe" data-theme="a"/>
                                <button type="button" data-theme="b" data-icon="check" id='clientConnexionBouton' onclick='clientConnexion()'>Connexion</button>
                                <input type='hidden' name='origine' value='index.php'/>
                                <a href='inscription.php' data-role='button'>S'inscrire</a>
                            </div>
                        </form>
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <a href='#' data-role="button" data-icon="check" data-theme="c" class="ui-btn-right">Connecté</a>
                    <?php
                }
                ?>
            </div>
            <div data-role="content">
                <p>La première étape consiste à envoyer vos fichers à nos serveurs. Nous pourrons ainsi vous fournir le prix le plus juste pour vos impressions. Toute commande non terminée implique la suppression du fichier téléchargé de nos serveurs.</p>
                <p><b><?php
                        if (isset($_SESSION["message"]))
                        {
                            echo $_SESSION["message"];
                            unset($_SESSION["message"]);
                        }
                        ?></b></p>
                <form data-ajax="false" enctype="multipart/form-data" method='post' action='telechargement.php'>
                    <ul data-role="listview" data-inset="true">
                        <li data-role="fieldcontain">
                            <label for="nbExemplaire">Nombre d'exemplaire :</label>
                            <input type="range" id="nbExemplaire" name="nbExemplaire" min='0' max='1000' value='1' step='1'/>
                        </li>
                        <li data-role="fieldcontain">
                            <label for="fichier">Fichier PDF</label>
                            <input type="file" id="fichier" name="fichier"/>
                        </li>
                        <li data-role='fieldcontain'>
                            <label for='couleurs'>Numéros des pages à imprimer en couleur <a href='#couleursInfo' data-rel="popup" data-role="button" data-rel="popup" data-role="button" class="ui-icon-alt" data-inline="true" data-transition="pop" data-icon="info" data-theme="e" data-iconpos="notext">Aide</a></label>
                            <div data-role="popup" id="couleursInfo" class="ui-content" data-theme="e" style="max-width:700px;">
                                <p>
                                    Les pages qui se suivent séparées par un "-" et les groupes de pages séparées par ";" <br/>
                                    Exemple : Pour imprimer de la page 1 à 5, la page 6 et les pages 8 à 10 <br/>
                                    1 - 5 ; 6 ; 8 - 10 <br/>
                                    Laissez vide pour tout imprimer en noir
                                </p>
                            </div>
                            <input type='text' name='couleurs' id='couleurs'>
                        </li>
                        <li data-role='fieldcontain'>
                            <label for='prixMemoire'>Mémoire</label>
                            <input type='checkbox' id='prixMemoire' name='prixMemoire'>
                        </li>
                        <button type='submit'>Télécharger</button>
                    </ul>
                </form>
            </div>
            <div data-role="footer" data-position="fixed" data-theme="c">
                <h2>Net 2 Print - Service d'impression en ligne</h2>
            </div>
        </div>
    </body>
</html>