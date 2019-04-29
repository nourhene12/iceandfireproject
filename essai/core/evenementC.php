<?PHP
include "../Config.php";
class EvenementC {
function afficherEvenement ($evenement)
{
	echo "nom: ".$evenement->getnom()."<br>";
		echo "prix: ".$evenement->getprix()."<br>";
		}
	 public function ajouterEvenement($d)
    {      
        $sql = "INSERT INTO `evenements` (`nom`,`prix`) VALUES (:nom,:prix)";
        $db = config::getConnexion();
          try {

        $q=$db->prepare($sql);
        $nom = $d->getnom();
        $prix = $d->getprix();
        $q->bindValue(':nom', $nom);
        $q->bindValue(':prix', $prix);
        $q->execute();
        } 
        catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
	
	 public function AfficherEvenements()
    {
        $sql="SELECT * From `evenements`";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
	
	  public function supprimerEvenement($id)
    {
        $sql = "DELETE FROM `evenements` WHERE `id`=" . $id;
       $db = config::getConnexion();
             $q=$db->prepare($sql);
        try {
                $q->execute();

            
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
     public function modifierEvenement($d, $id)
    {
        echo "updating evenement...";
        $sql = "UPDATE `evenements` SET `nom`=:nom,`prix`=:prix WHERE `id`=" . $id;
        // $sql = "UPDATE document SET (reference=:reference,nom=:nom,date_creation=:date_creation,prix=:prix,auteur=:auteur,nbPages=:nbPages,duree=:duree,capacite=:capacite,type=:type ) WHERE reference=$ref";
        $db = config::getConnexion();

        $q=$db->prepare($sql);
        $nom = $d->getnom();
        $prix = $d->getprix();
       
        $q->bindValue(':nom', $nom);
        $q->bindValue(':prix', $prix);
      
    try {            
            $q->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

	}
    function recupererEvenement($id){
        $sql="SELECT * from `evenements` where id=$id";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
	
}
?>