<?php

session_start();

function chargerClasse($classe)
{
    require($classe . '.class.php');
}

spl_autoload_register('chargerClasse');
?>