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
                <form data-ajax="false" enctype="multipart/form-data">
                    <div data-role="collapsible-set" data-theme="c" data-content-theme="d">
                        <div data-role="collapsible">
                            <h3>Fichiers</h3>
                            <p>
                            <p>Afin de minimiser le coût pour vous, nous imprimons les pages couleurs et les pages noires sur deux imprimantes différentes.
                                Merci de nous fournir séparément les couleurs et les noires et blanches au format PDF (afin d'éviter tout changement dans votre mise en page) et d'indiquer la quantité correspondant à un seul exemplaire.</p>
                            <p>Pour des raisons techniques, nous limitons le nombre de pages à 500 par exemplaire.</p>
                            <ul data-role="listview" data-inset="true">
                                <li data-role="fieldcontain">
                                    <label for="nbExemplaire">Nombre d'exemplaire :</label>
                                    <input type="range" id="nbExemplaire" name="nbExemplaire" min='0' max='100' value='0' step='1'/>
                                </li>
                                <li data-role="fieldcontain">
                                    <label for="noirs">NOIRES uniquement</label>
                                    <input type="file" id="noirs" name="noirs"/>
                                </li>
                                <li data-role='fieldcontain'>
                                    <label for='nbNoires'>Nombre de feuilles noires</label>
                                    <input type='range' name='nbNoires' id='nbNoires' min='0' max='500' value='0' step='1'/>
                                </li>
                                <li data-role="fieldcontain">
                                    <label for="couleurs">COULEURS uniquement</label>
                                    <input type="file" id="couleurs" name="couleurs"/>
                                </li>
                                <li data-role='fieldcontain'>
                                    <label for='nbCouleurs'>Nombre de feuilles couleurs</label>
                                    <input type='range' name='nbCouleurs' id='nbCouleurs' min='0' max='500' value='0' step='1'/>
                                </li>
                            </ul>
                            </p>
                        </div>
                        <div data-role="collapsible">
                            <h3>Papier</h3>
                            <p>
                            <ul data-role="listview" data-inset="true">
                                <li data-role="fieldcontain">
                                    <label for="papCorps">Papier intérieur <br/> (hors couverture)</label>
                                    <select id="papCorps" name="papCorps" data-native-menu="false" data-icon="grid" data-iconpos="left">
                                        <optgroup label='Blanc'>
                                            <option value='75'>Standard</option>
                                            <option value='90'>90 grammes</option>
                                            <option value='120'>120 grammes</option>
                                            <option value='160'>160 grammes</option>
                                            <option value='200'>200 grammes</option>
                                            <option value='250'>250 grammes</option>
                                            <option value='300'>300 grammes</option>
                                        </optgroup>
                                        <optgroup label='Couleurs'>
                                            <option value='framboise'>Framboise</option>
                                            <option value='orange'>Orange</option>
                                            <option value='or'>Jaune or</option>
                                            <option value='paille'>Jaune paille</option>
                                            <option value='sapin'>Vert Sapin</option>
                                            <option value='menthe'>Vert Menthe</option>
                                            <option value='alizee'>Bleu ciel</option>
                                            <option value='turquoise'>Turquoise</option>
                                            <option value='bleuF'>Bleu Foncé</option>
                                            <option value='violet'>Violet</option>
                                        </optgroup>
                                    </select>
                                </li>
                                <li data-role='fieldcontain'>
                                    <label for='couvAv'>Couverture Avant</label>
                                    <select id="couvAv" name="CouvAv" data-native-menu="false" data-icon="grid" data-iconpos="left">
                                        <option value='non'>Aucune</option>
                                        <optgroup label='Blanc'>
                                            <option value='75'>Standard</option>
                                            <option value='90'>90 grammes</option>
                                            <option value='120'>120 grammes</option>
                                            <option value='160'>160 grammes</option>
                                            <option value='200'>200 grammes</option>
                                            <option value='250'>250 grammes</option>
                                            <option value='300'>300 grammes</option>
                                        </optgroup>
                                        <optgroup label='Couleurs'>
                                            <option value='framboise'>Framboise</option>
                                            <option value='orange'>Orange</option>
                                            <option value='or'>Jaune or</option>
                                            <option value='paille'>Jaune paille</option>
                                            <option value='sapin'>Vert Sapin</option>
                                            <option value='menthe'>Vert Menthe</option>
                                            <option value='alizee'>Bleu ciel</option>
                                            <option value='turquoise'>Turquoise</option>
                                            <option value='bleuF'>Bleu Foncé</option>
                                            <option value='violet'>Violet</option>
                                        </optgroup>
                                        <optgroup label='Spéciaux'>
                                            <option value='couvHEC'>Couverture Mémoire HEC</option>
                                        </optgroup>
                                    </select>
                                </li>
                                <li data-role="fieldcontain">
                                    <label for="couvAr">Couverture Arrière</label>
                                    <select id="couvAr" name="couvAr" data-native-menu="false" data-icon="grid" data-iconpos="left">
                                        <option value='non'>Aucune</option>
                                        <optgroup label='Blanc'>
                                            <option value='75'>Standard</option>
                                            <option value='90'>90 grammes</option>
                                            <option value='120'>120 grammes</option>
                                            <option value='160'>160 grammes</option>
                                            <option value='200'>200 grammes</option>
                                            <option value='250'>250 grammes</option>
                                            <option value='300'>300 grammes</option>
                                        </optgroup>
                                        <optgroup label='Couleurs'>
                                            <option value='framboise'>Framboise</option>
                                            <option value='orange'>Orange</option>
                                            <option value='or'>Jaune or</option>
                                            <option value='paille'>Jaune paille</option>
                                            <option value='sapin'>Vert Sapin</option>
                                            <option value='menthe'>Vert Menthe</option>
                                            <option value='alizee'>Bleu ciel</option>
                                            <option value='turquoise'>Turquoise</option>
                                            <option value='bleuF'>Bleu Foncé</option>
                                            <option value='violet'>Violet</option>
                                        </optgroup>
                                        <optgroup label='Spéciaux'>
                                            <option value='couvHEC'>Dos Mémoire HEC</option>
                                        </optgroup>
                                    </select>
                                </li>
                                <li data-role='fieldcontain'>
                                    <fieldset data-role="controlgroup" data-type="horizontal">
                                        <legend>Couverture Avant : </legend>
                                        <input name="couvOption" id="couvNon" value="couvNon" checked="checked" type="radio">
                                        <label for="couvNon">Pas de couverture</label>
                                        <input name="couvOption" id="premierePageNoir" value="premierePageNoir" type="radio">
                                        <label for="premierePageNoir">Première page du fichier Noir</label>
                                        <input name="couvOption" id="premierePageCouleur" value="premierePageCouleur" type="radio">
                                        <label for="premierePageCouleur">Première page du fichier Couleur</label>
                                    </fieldset>
                                </li>
                                <li data-role='fieldcontain'>
                                    <label for='papierComm'>Commentaires : </label>
                                    <textarea name='papierComm' id='papierComm'></textarea>
                                </li>
                            </ul>
                            </p>
                        </div>
                        <div data-role="collapsible">
                            <h3>Reliures/Finitions</h3>
                            <p>
                            <ul data-role="listview" data-inset="true">
                                <li data-role='fieldcontain'>
                                    <label for="couvAr">Reliure/Agrafage</label>
                                    <select id="reliure" name="reliure" data-native-menu="false" data-icon="grid" data-iconpos="left">
                                        <option value='non'>Pas de reliure</option>
                                        <optgroup label='Ecoles'>
                                            <option value='reliureHEC'>Mémoire HEC</option>
                                        </optgroup>
                                        <optgroup label='Agrafage'>
                                            <option value='agrafeOblique'>Oblique dans coin supérieur gacuche</option>
                                            <option value='agrapheDroite'>Droite dans coin supérieur gauche</option>
                                            <option value='agrapheDouble'>Double à gauche</option>
                                        </optgroup>
                                        <optgroup label='Anneaux'>
                                            <option value='anneaux'>Anneaux plastiques</option>
                                        </optgroup>
                                        <optgroup label='Fast-Back'>
                                            <option value='blanc'>Blanc</option>
                                            <option value='noir'>Noir</option>
                                            <option value='grisHEC'>Gris foncé (HEC)</option>
                                            <option value='grisC'>Gris clair</option>
                                            <option value='rouge'>Rouge</option>
                                            <option value='bleuF'>Bleu foncé</option>
                                            <option value='bleuC'>Bleu clair</option>
                                            <option value='vert'>Vert</option>
                                            <option value='brun'>Brun</option>
                                            <option value='brunF'>Brun Foncé</option>
                                        </optgroup>
                                    </select>
                                </li>
                                <li data-role='fieldcontain'>
                                    <fieldset data-role="controlgroup" data-type="horizontal">
                                        <legend>Perforation </legend>
                                        <input name="perfo" id="perfoNon" value="perfoNon" checked="checked" type="radio">
                                        <label for="perfoNon">Non</label>
                                        <input name="perfo" id="2trous" value="2trous" type="radio">
                                        <label for="2trous">Deux trous</label>
                                        <input name="perfo" id="4trous" value="4trous" type="radio">
                                        <label for="4trous">Quatre trous</label>
                                    </fieldset>
                                </li>
                                <li data-role='fieldcontain'>
                                    <fieldset data-role="controlgroup" data-type="horizontal">
                                        <legend>Transparents de protection</legend>
                                        <input name="cellos" id="cellosNon" value="cellosNon" checked="checked" type="radio">
                                        <label for="cellosNon">Non</label>
                                        <input name="cellos" id="cellosAv" value="cellosAv" type="radio">
                                        <label for="cellosAv">Devant</label>
                                        <input name="cellos" id="cellosAr" value="cellosAr" type="radio">
                                        <label for="cellosAr">Derrière</label>
                                        <input name="cellos" id="cellosAvAr" value="cellosAvAr" type="radio">
                                        <label for="cellosAvAr">Devant et derrière</label>
                                    </fieldset>
                                </li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div data-role="footer" data-position="fixed" data-theme="c">
                <h2>Net 2 Print - Service d'impression en ligne</h2>
            </div>
        </div>
    </body>
</html>