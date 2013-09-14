<?php

class Upload
{
    protected 
            $nom,
            $nbPages;
    
    public function __construct()
    {
        
    }
    
    public function nom()
    {
        return $this->nom;
    }
    
    public function nbPages()
    {
        return $this->nbPages;
    }
    
    public function link($f)
    {
        $dossier     = 'Depot/';
        $taille_maxi = 10000000000000;
        $taille      = filesize($f['tmp_name']);
        $extensions  = array('.pdf');
        $extension   = strrchr($f['name'], '.');
//Début des vérifications de sécurité...
        if (!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
            $erreur = "Vous devez convertir vos fichiers au format PDF. En effet, celui-ci d'être certain que la mise en page ne bougera pas.";
        }
        if ($taille > $taille_maxi)
        {
            $erreur = 'Le fichier est trop gros...';
        }

        if (!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = date("Y-m-d-H-i-s")."_".$_SESSION["client"].".pdf";
            if (move_uploaded_file($f['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {
                

                $pdf = new FPDI();
                
                $pagecount = $pdf->setSourceFile("Depot/" . $fichier);
                
                $this->nom = $fichier;
                $this->nbPages = $pagecount;
                
                return array(1, array("nom" => $fichier, "nbPages" => $pagecount));
                
            }
            else //Sinon (la fonction renvoie FALSE).
            {
                return array(2,"Echec de l'upload !");
            }
        }
        else
        {
            return array(2, $erreur);
        }
    }
}

?>
