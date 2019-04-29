<?PHP
include "../Config.php";
class EvenementC {


    public function __construct(){
$this->db = new Config();
$this->db =$this ->db->connect();   }
function afficherEvenement ($evenement)
{
    echo "nom: ".$evenement->getnom()."<br>";
        echo "prix: ".$evenement->getprix()."<br>";
        }
     public function ajouterEvenement($d)
    {      
        $sql = "INSERT INTO evenements (nom,`prix`) VALUES (:nom,:prix)";
         $q = $this->db->prepare($sql);
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
    
     public function AfficherEvenements()
    {
        $sql="SELECT * From evenements";
        try{
        $liste=$this->db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
       
       
    }
    
      public function supprimerEvenement($id)
    {
        $sql = "DELETE FROM evenements WHERE `id`=" . $id;
           $q=$this->db->query($sql);
        try {
                $q->execute();

            
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
     public function modifierEvenement($d, $id)
    {
        echo "updating evenement...";
        $sql = "UPDATE evenements SET nom`=:nom,prix`=:prix WHERE `id`=" . $id;
        // $sql = "UPDATE document SET (reference=:reference,nom=:nom,date_creation=:date_creation,prix=:prix,auteur=:auteur,nbPages=:nbPages,duree=:duree,capacite=:capacite,type=:type ) WHERE reference=$ref";
        $q = $this->db->prepare($sql);

       
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
        $sql="SELECT * from evenements where id=$id";
     //$q = $this->db->prepare($sql);
        try{
        $liste=$this->db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function rechercherEvenement($s)
    {
         $query = "select * from evenements where nom LIKE ?";
         $result = $this->db->prepare($query);
        //$result = $db->prepare($query);
         $result->bindValue(1, "%$s%", PDO::PARAM_STR);
         $result->execute();
           return $result->fetchAll();
    }
    
}
?>