<?php

class ClientManager
{

    protected $bdd;

    public function __construct()
    {
        $this->bdd = new BDD();
    }
    
    public function insert(Client $client)
    {
        if($client->societe() == '')
        {
            $client->setSociete(NULL);
        }
        
        $q = $this->bdd->prepare("INSERT INTO clients(Email, Nom, Prenom, Rue, Numero, CP, Localite, Societe, MDP, Tel) VALUES(:email, :nom, :prenom, :rue, :numero, :cp, :localite, :societe, :mdp, :tel)");
        $q->bindValue("email", $client->email());
        $q->bindValue("nom", $client->nom());
        $q->bindValue("prenom", $client->prenom());
        $q->bindValue("rue", $client->rue());
        $q->bindValue("numero", $client->numero());
        $q->bindValue("cp", $client->cp());
        $q->bindValue("localite", $client->localite());
        $q->bindValue("societe", $client->societe());
        $q->bindValue("mdp", $client->mdp());
        $q->bindValue("tel", $client->tel());
        
        $q->execute();
        
        if($q->rowCount() == 1)
        {
            return true; 
        }
        
        else
        {
            return $q->errorInfo();
        }
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
            return array(4, "Impossible d'établir la connexion avec nos serveurs, merci de réessayer plus tard.");
        }
    }

}

?>
