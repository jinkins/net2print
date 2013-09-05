<?php

class Client
{

    protected
            $id,
            $nom,
            $prenom,
            $email,
            $rue,
            $num,
            $cp,
            $localite,
            $societe,
            $mdp;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate($donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set' . $key;
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
    
    
    // XML
    
    public function toXML()
    {
        $t = "<client id='".$this->id."'>";
        $t .= "<nom>".$this->nom."</nom>";
        $t .= "<prenom>".$this->prenom."</prenom>";
        $t .= "<rue>".$this->rue."</rue>";
        $t .= "<numero>".$this->num."</numero>";
        $t .= "<cp>".$this->cp."</cp>";
        $t .= "<localite>".$this->localite."</localite>";
        $t .= "<societe>".$this->societe."</societe>";
        $t .= "<email>".$this->email."</email>";
        $t .= "</client>";
        
        return $t;
        
        
    }

    // GETTERS

    public function id()
    {
        return $this->id;
    }

    public function nom()
    {
        return $this->nom;
    }

    public function prenom()
    {
        return $this->prenom;
    }
    
    public function adresse()
    {
        return $this->rue." ".$this->num." à ".$this->cp." ".$this->localite;
    }

    public function rue()
    {
        return $this->rue;
    }

    public function numero()
    {
        return $this->num;
    }

    public function cp()
    {
        return $this->cp;
    }

    public function localite()
    {
        return $this->localite;
    }

    public function email()
    {
        return $this->email;
    }
    
    public function mdp()
    {
        return $this->mdp;
    }
    
    public function societe()
    {
        return $this->societe; 
    }
    

    // SETTERS

    public function setID($id)
    {
        $this->id = (int) $id;
    }

    public function setNom($n)
    {
        $this->nom = $n;
    }

    public function setPrenom($n)
    {
        $this->prenom = $n;
    }

    public function setEmail($e)
    {
        $this->email = $e;
    }

    public function setRue($r)
    {
        $this->rue = $r;
    }

    public function setNumero($n)
    {
        $this->num = $n;
    }

    public function setCP($cp)
    {
        $this->cp = $cp;
    }

    public function setLocalite($l)
    {
        $this->localite = $l;
    }

    public function setSociete($s)
    {
        $this->societe = $s;
    }
    
    public function setMDP($mdp)
    {
        $this->mdp = $mdp;
    }

}

?>
