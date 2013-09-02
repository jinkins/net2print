<?php

class ClientManager
{

    protected $bdd;

    public function __construct()
    {
        $this->bdd = new BDD();
    }

    public function connexion($u, $pw)
    {
        try
        {
            $q = $this->bdd->prepare("SELECT * FROM clients WHERE Email = :email AND MDP = :mdp");
            $q->bindValue("email", $u);
            $q->bindValue("mdp", $pw);

            $q->execute();

            if ($q->rowCount() == 1)
            {
                return array(1, new Client($q->fetch()));
            }
            else
            {
                $q2 = $this->bdd->prepare("SELECT * FROM clients WHERE Email = :email");
                $q2->bindValue("email", $u);
                $q2->execute();

                if ($q2->rowCount() == 1) 
                {
                    return array(2, "Erreur, le mot de passe est incorrect");
                }
                
                else
                {
                    return array(3, "Vous n'êtes pas encore client chez nous.");
                }
            }
        }
        catch (Exception $ex)
        {
            
        }
    }

}

?>
