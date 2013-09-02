<?php require_once('Classes/appelClasse.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
    </head>
    <body>
        <?php
            $clientManager = new ClientManager();
            $r = $clientManager->connection("nick-1138@hotmail.com","TheG@nts10032007");
            
            if($r[0] == 1)
            {
                $client = $r[1];
                
                $_SESSION;
            }
        ?>
    </body>
</html>