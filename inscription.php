<?php require_once('Classes/appelClasse.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Net 2 Print - Impressions depuis internet</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
        <script src="JS/inscription.js"></script>
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
                <form method='post'>
                    <ul data-role="listview" data-inset="true">
                        <li data-role='fieldcontain'>
                            <label for='email'>Email</label>
                            <input type='text' name='email' id='email'>
                        </li>
                        <li data-role='fieldcontain'>
                            <label for='mdp'>Mot de passe</label>
                            <input type='password' name='mdp' id='mdp'>
                        </li>
                        <li data-role='fieldcontain'>
                            <label for='nom'>Nom</label>
                            <input type='text' name='nom' id='nom'>
                        </li>
                        <li data-role='fieldcontain'>
                            <label for='prenom'>Prénom</label>
                            <input type='text' name='prenom' id='prenom'>
                        </li>
                        <li data-role='fieldcontain'>
                            <label for='rue'>Rue</label>
                            <input type='text' name='rue' id='rue'>
                        </li>
                        <li data-role='fieldcontain'>
                            <label for='numero'>Numéro</label>
                            <input type='text' name='numero' id='numero'>
                        </li>
                        <li data-role='fieldcontain'>
                            <label for='cp'>Code Postal</label>
                            <input type='text' name='cp' id='cp'>
                        </li>
                        <li data-role='fieldcontain'>
                            <label for='localite'>Localité</label>
                            <input type='text' name='localite' id='localite'>
                        </li>
                        <li data-role='fieldcontain'>
                            <label for='tel'>GSM</label>
                            <input type='text' name='tel' id='tel'>
                        </li>
                        <li data-role='fieldcontain'>
                            <label for='societe'>Société/Ecole</label>
                            <input type='text' name='societe' id='societe'>
                        </li>
                        <li data-role='fieldcontain'>
                            <label for='cgv'>J'ai lu, compris et approuvé les conditions générales d'utilisation et de vente ci dessous. </label>
                            <input type='checkbox' name='cgv' id='cgv'>
                        </li>
                        <li data-role='fieldcontain'>
                            <label for='cgvTexte'>Conditions générales de vente</label>
                            <textarea id='cgvTexte'>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis velit auctor, lacinia purus sed, viverra ante. Donec vel commodo sem. Phasellus libero nisi, cursus sagittis arcu nec, viverra rutrum ipsum. Pellentesque porttitor lorem non elit mollis vestibulum. Sed urna enim, tincidunt eget mattis quis, molestie nec libero. Aenean eu neque lacus. Quisque ultrices est sit amet tincidunt laoreet. Donec quis placerat tortor. Nulla sollicitudin aliquet cursus. Quisque libero quam, aliquam sit amet turpis eu, lobortis malesuada dolor. Fusce tempus, felis in fringilla posuere, ligula diam pellentesque tortor, nec faucibus massa lacus vitae libero. Sed condimentum justo venenatis metus volutpat, ac congue lorem varius. Nam ornare sit amet libero at pellentesque. Sed vel lorem in est porta aliquam. Quisque pulvinar ullamcorper est ac interdum. Sed sed elit at magna condimentum commodo vel nec lectus.

Aliquam velit nunc, vulputate ut varius ac, interdum volutpat ante. Vestibulum nunc lectus, luctus sit amet magna at, vestibulum congue purus. Fusce dictum iaculis erat, quis blandit felis vulputate vel. Pellentesque rhoncus lacus id erat feugiat tincidunt. Sed eleifend non arcu at fermentum. Phasellus odio lorem, pellentesque ut semper sit amet, rhoncus at erat. Duis metus velit, consequat eu sollicitudin sed, porta eu nunc. Nunc id scelerisque neque. Nulla blandit felis quis erat dapibus, id blandit nunc rhoncus. Ut ut euismod velit. Fusce consectetur sem nisi, et lobortis enim porttitor in.

Duis quis convallis nunc. Sed ultricies iaculis nisi, eu porttitor arcu ultricies nec. Quisque imperdiet a erat in vulputate. Suspendisse ipsum elit, vestibulum et libero sed, accumsan sagittis dolor. Proin ut magna ac diam scelerisque aliquet et quis est. Quisque sed accumsan ligula. Morbi laoreet ac ligula non tincidunt. Nunc eleifend consectetur tellus. Ut vel tellus nibh. Donec quis massa rhoncus, luctus nisl ut, consequat quam. Sed ultricies dolor tristique, adipiscing sapien non, euismod orci. Donec eros tortor, consectetur eu massa sed, varius volutpat dui. Nam enim enim, eleifend at lectus id, sagittis ornare risus. Suspendisse potenti. Maecenas dictum nulla odio, eu commodo nisl facilisis ac.

Vivamus ut nulla a odio condimentum ornare ut eget est. Vestibulum at lectus mi. Aenean vel viverra leo. Sed posuere justo diam, sed porttitor tortor dapibus et. In commodo massa eget metus pharetra, vel volutpat tortor scelerisque. Donec cursus elit sit amet arcu posuere gravida. Mauris elementum purus vitae porta interdum. Aliquam fringilla erat eu tellus facilisis, id rutrum odio volutpat. Nullam at metus eu purus ullamcorper blandit. Sed vitae mauris ipsum. Morbi convallis, metus gravida ornare vulputate, odio urna rutrum justo, vitae vehicula justo diam ac augue.

In at risus ac velit pharetra malesuada vel eget justo. Vestibulum varius iaculis tortor, eget suscipit ante volutpat at. Vestibulum est urna, sodales id mauris id, fringilla lacinia libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis bibendum lectus eget dapibus interdum. Phasellus lacinia pretium nibh, quis adipiscing mi imperdiet et. Ut pharetra arcu arcu, rutrum mattis massa auctor id. Etiam ut arcu leo. Proin est sem, posuere non magna eget, hendrerit gravida orci. Nunc eget mauris consequat, porta leo vitae, ullamcorper dolor. Nam sagittis justo ornare dui pretium, nec molestie sapien euismod.

In adipiscing est commodo est dignissim, nec mollis nulla aliquet. In tristique urna dolor, eu placerat purus convallis sit amet. Curabitur fermentum fringilla nisi, vel bibendum nibh consequat non. Vestibulum aliquet sem vitae porttitor rutrum. Ut vitae magna dapibus mauris porttitor porttitor sit amet venenatis arcu. Vestibulum et auctor erat. Morbi interdum augue mauris, et placerat purus semper pellentesque. Donec non augue sit amet erat euismod placerat. Donec aliquam magna at mi gravida luctus. Cras et magna ut est aliquam tristique.

Nulla porttitor purus vitae eros accumsan, ac condimentum augue ultrices. Nulla diam nisl, fringilla ut condimentum et, consequat at dui. Suspendisse gravida tellus placerat sem cursus semper. Donec non congue metus. Nam interdum ante id nisi lacinia tincidunt. Nunc mattis lorem magna, at porta mi dignissim bibendum. Mauris pharetra neque ipsum, luctus malesuada orci blandit ut.

Etiam ullamcorper nibh vitae nunc dictum, sit amet porta elit euismod. Donec dictum eu purus et dapibus. Quisque fringilla, elit a porta feugiat, sapien metus hendrerit enim, eu volutpat tortor diam id lacus. Etiam aliquam bibendum dui. Aenean ut neque imperdiet, commodo sapien iaculis, volutpat eros. Nulla non ultrices est, semper pharetra velit. Donec et facilisis odio, sit amet accumsan ante. Pellentesque ultricies elementum lectus ut ullamcorper. Mauris sagittis dignissim lectus a pharetra. Vivamus nunc quam, bibendum vel vehicula vel, venenatis non est. Fusce condimentum purus sed sem posuere pellentesque. Duis porttitor congue sem ut adipiscing. Praesent eu sodales justo. Nam at ornare lacus, vitae blandit neque. Cras cursus turpis augue, eget euismod ante hendrerit et.

Cras sodales luctus urna ac viverra. Nam semper, lacus ac suscipit commodo, urna mauris fermentum mi, quis luctus dolor quam vitae quam. Praesent egestas diam in libero imperdiet dapibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum consectetur convallis neque. Cras sed pulvinar elit. Ut felis quam, dapibus sit amet neque ut, fringilla volutpat metus. Sed consequat ligula in magna laoreet, quis vestibulum massa adipiscing. Curabitur ultrices ullamcorper ipsum nec condimentum. Morbi vel fermentum nisl. Pellentesque vitae ligula dui. Pellentesque vestibulum ipsum vel suscipit fringilla. Phasellus imperdiet placerat risus at feugiat. Duis dui mi, elementum nec libero a, imperdiet consequat eros. Quisque aliquet orci eu arcu malesuada, non bibendum massa mollis.

Phasellus id lorem bibendum, venenatis arcu vitae, cursus nulla. Maecenas eu iaculis odio, et rutrum nibh. Cras adipiscing viverra nisl vel dapibus. Aliquam fringilla arcu eu lorem vulputate, eget pretium purus lacinia. Cras varius pretium dapibus. Maecenas et tellus nec arcu elementum lacinia. Mauris non nisl quis est pulvinar mattis id sit amet libero. Donec tristique, sem sit amet posuere blandit, lorem magna dictum nulla, dictum lobortis felis urna at enim. Cras in viverra ligula, eu blandit augue.
                            </textarea>
                        </li>
                        <li data-role='fieldcontain'>
                            <button type='button' onclick='inscription()'>Envoyer le formulaire</button>
                        </li>
                    </ul>
                </form>

            </div>
            <div data-role="footer" data-position="fixed">
                <h2>Net 2 Print - Service d'impression en ligne</h2>
            </div>
        </div>
    </body>
</html>