<?php

header('Content-Type: text/html; charset=utf-8');

class Commande
{

    protected
            $id,
            $preneur,
            $date,
            $fichier,
            $echeance,
            $prix,
            $nbPages,
            $nbExemplaires,
            $memoire,
            $intervalles,
            $bdd;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
        $this->bdd = new BDD();
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

    public function prixCouleurs()
    {
        if ($this->memoire == true)
        {
            $q = $this->bdd->prepare('SELECT Prix FROM prixImpressions WHERE Min < :quantite AND Max > :quantite AND NC = 4'); // Couleurs mémoires
        }
        else
        {
            $q = $this->bdd->prepare('SELECT Prix FROM prixImpressions WHERE Min < :quantite AND Max > :quantite AND NC = 2'); // Couleurs non mémoires
        }

        $q->bindValue("quantite", $this->nbCouleurs());
        $q->execute();

        $ligne        = $q->fetch();
        $prixCouleurs = $ligne[0];

        return $prixCouleurs;
    }

    public function prixNoires()
    {
        if ($this->memoire == true)
        {
            $q = $this->bdd->prepare('SELECT Prix FROM prixImpressions WHERE Min < :quantite AND Max > :quantite AND NC = 3'); // Noires mémoires
        }
        else
        {
            $q = $this->bdd->prepare('SELECT Prix FROM prixImpressions WHERE Min < :quantite AND Max > :quantite AND NC = 1'); // Noires non mémoires
        }

        $q->bindValue("quantite", $this->nbNoires());
        $q->execute();

        $ligne      = $q->fetch();
        $prixNoires = $ligne[0];

        return $prixNoires;
    }

    public static function calculNbPages($intervalC, $total)
    {
        if ($intervalC != '')
        {
            $couleurs = 0;

            $intervalC = str_replace(" ", "", $intervalC);
            $groupes   = explode(";", $intervalC);

            for ($i = 0; $i < sizeof($groupes); $i++)
            {

                if ($groupes[$i] != '')
                {
                    $feuilles = explode("-", $groupes[$i]);

                    if (sizeof($feuilles) > 1)
                    {
                        if (is_numeric($feuilles[0]) && is_numeric($feuilles[1]))
                        {
                            $couleurs += ($feuilles[1] - $feuilles[0] + 1);

                            for ($j = $feuilles[0]; $j <= $feuilles[1]; $j++)
                            {
                                $tableauCouleur[] = (int) $j;
                            }
                        }
                        else
                        {
                            return array(2, "Erreur dans l'intervalle. Vous avez indiqué une valeur non numérique");
                        }
                    }
                    else
                    {
                        if (is_numeric($feuilles[0]))
                        {
                            $couleurs++;
                            $tableauCouleur[] = (int) $feuilles[0];
                        }
                        else
                        {
                            return array(2, "Erreur dans l'intervalle. Vous avez indiqué une valeur non numérique");
                        }
                    }
                }
            }
        }
        
        else
        {
            $tableauCouleur = array();
            $couleurs = 0;
        }

        for ($i = 1; $i <= $total; $i++)
        {
            if (!in_array($i, $tableauCouleur))
            {
                $tableauNoires[] = $i;
            }
        }

        $noires = $total - $couleurs;

        if ($noires >= 0 AND $couleurs >= 0)
        {
            return array(1, array("NBNoires" => $noires, "NBCouleurs" => $couleurs, "Couleurs" => $tableauCouleur, "Noires" => $tableauNoires, "InterCouleur" => Commande::intervalle($tableauCouleur), "InterNoires" => Commande::intervalle($tableauNoires)));
        }
        else
        {
            return array(2, "Erreur dans l'intervalle. Vous voulez imprimer plus de pages que ce que votre fichier en contient.");
        }
    }

    public static function intervalle(array $tableau)
    {
        $r = $tableau[0];

        if (($tableau[0] + 1) != $tableau[1])
        {
            $r .= ";" . $tableau[1];
        }

        for ($i = 1; $i < sizeof($tableau); $i++)
        {
            if (isset($tableau[$i + 1]))
            {
                if (($tableau[$i] + 1 ) != $tableau[$i + 1]) // On vérifie si les valeurs se suivent. 
                {
                    $r .= '-' . $tableau[$i];
                    $r .= ";" . $tableau[$i + 1];
                }
            }
            else
            {
                $r .= "-" . $tableau[$i];
            }
        }
        return $r;
    }

    public function memoire()
    {
        return $this->memoire;
    }

    public function interCouleurs()
    {
        return $this->intervalles["couleurs"];
    }

    public function interNoires()
    {
        return $this->intervalles["noires"];
    }

    public function nbExemplaires()
    {
        return $this->nbExemplaires;
    }

    public function nbCouleurs()
    {
        return $this->nbPages["couleurs"];
    }

    public function nbNoires()
    {
        return $this->nbPages["noires"];
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setPreneur($p)
    {
        $this->preneur = $p;
    }

    public function setFichier($f)
    {
        $this->fichier = $f;
    }

    public function setEcheance($e)
    {
        $this->echeance = $e;
    }

    public function setPrix($p)
    {
        $this->prix = $p;
    }

    public function setNoires($noires)
    {
        $this->nbPages["noires"] = (int) $noires;
    }

    public function setCouleurs($couleurs)
    {
        $this->nbPages["couleurs"] = (int) $couleurs;
    }

    public function setExemplaires($e)
    {
        $this->nbExemplaires = (int) $e;
    }

    public function setMemoire($m)
    {
        $this->memoire = $m;
    }

    public function setInterNoires($n)
    {
        $this->intervalles["noires"] = $n;
    }

    public function setInterCouleurs($c)
    {
        $this->intervalles["couleurs"] = $c;
    }

}

?>
