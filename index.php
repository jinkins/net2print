<?php
    require_once('Classes/appelClasse.php');
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
            <div data-role="header" data-position="fixed">
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
                                <a href='Inscription'>S'inscrire</a>
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
                <p>
                    Net2Print est un service d'impression en ligne de documents. Celui-ci vous permet de commander de chez vous l'impression de documents. La procédure est simple et est expliquée ci-dessous. N'hésitez pas à cliquer sur chaque partie pour des renseignements complémentaires.
                </p>
                <div data-role="collapsible-set" data-theme="c" data-content-theme="d">
                    <div data-role="collapsible" data-collapsed-icon="info" data-expanded-icon="info">
                        <h3>Vous déposez vos documents.</h3>
                        <p>...</p>
                    </div>
                    <div data-role="collapsible" data-collapsed-icon="info" data-expanded-icon="info">
                        <h3>Vous choisissez la qualité d'impression, les différentes reliures, papier, etc.</h3>
                        <p>...</p>
                    </div>
                    <div data-role="collapsible" data-collapsed-icon="info" data-expanded-icon="info">
                        <h3>Vous payez votre commande.</h3>
                        <p>...</p>
                    </div>
                    <div data-role="collapsible" data-collapsed-icon="info" data-expanded-icon="info">
                        <h3>Nous vous avertissons dès que votre commande est prête à être receptionnée.</h3>
                        <p>Différents lieux de reception sont prévus. Vous pouvez venir chercher votre commande dans un des magasins partenaires ou bien être livré par la poste. </p>
                    </div>
                </div>
            </div>
            <div data-role="footer" data-position="fixed">
                <h2>Net 2 Print - Service d'impression en ligne</h2>
            </div>
        </div>
    </body>
</html>