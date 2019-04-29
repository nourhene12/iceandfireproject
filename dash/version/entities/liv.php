<?php
/**
 * Created by PhpStorm.
 * User: Safa Maalej
 * Date: 20/03/2019
 * Time: 9:11 AM
 */
include_once "Config.php";
class Livraison
{
    private $id;
    private $civilite;
    private $ville;
	private $nom;
    private $prenom;
    private $adresse;
    private $complement_d_adresse;
    private $code_postal;

	public function __construct(){
$this->db = new Config();
$this->db =$this ->db->connect();	}
// *************************
//  DEBUT GET
// *************************
    public function getId()
    {
        return $this->id;
    }
	 public function getCivilite()
    {
        return $this->civilite;
    }
	 public function getVille()
    {
        return $this->ville;
    }
	 public function getNom()
    {
        return $this->nom;
    }
	 public function getPrenom()
    {
        return $this->prenom;
    }
	 public function getAdresse()
    {
        return $this->adresse;
    }
	 public function getComplementDadresse()
    {
        return $this->complement_d_adresse;
    }
	 public function getCodePostal()
    {
        return $this->code_postal;
    }
// *************************
//  FIN GET
// *************************
	
	
// *****************
// DEBUT SET
// *****************
    public function setId($id)
    {
        $this->id = $id;
    }
	 public function setCivilite($civilite)
    {
        $this->civilite = $civilite;
    }
	 public function setVille($ville)
    {
        $this->ville = $ville;
    }
	  public function setNom($nom)
    {
        $this->nom = $nom;
    }
	 public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
	 public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
	public function setComplementDadresse($complement_d_adresse)
    {
        $this->complement_d_adresse = $complement_d_adresse;
    }
	 public function setCodePostal($code_postal)
    {
        $this->code_postal = $code_postal;
    }
	
// *************************
//  FIN SET LIVRAISON
// *************************
	
	
// *************************
//  INSERER LIVRAISON
// *************************

    public function InsererLivraison($d)
    {      
        $sql = "INSERT INTO `livraison` (`civ`,`ville`,`name`,`prenom`,`adresse`,`cmp`,`code`) VALUES (:civilite,:ville,:nom,:prenom,:adresse,:complement_d_adresse,:code_postal)";
        $q = $this->db->prepare($sql);
		
        $civilite = $d->getCivilite();
        $ville = $d->getVille();
        $nom = $d->getNom();
        $prenom = $d->getPrenom();
        $adresse = $d->getAdresse();
        $complement_d_adresse = $d->getComplementDadresse();
        $code_postal = $d->getCodePostal();

		$q->bindValue(':civ', $civilite);
        $q->bindValue(':ville', $ville);
        $q->bindValue(':name', $nom);
        $q->bindValue(':prenom', $prenom);
        $q->bindValue(':adresse', $adresse);
        $q->bindValue(':cmp', $complement_d_adresse);
        $q->bindValue(':code', $code_postal);


        try {
		$q->execute();
			} catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
	
// *************************
//  FIN INSERER LIVRAISON
// *************************

// *************************
//SELECTION LIVRAISON
// *************************

    public function SelectLivraison($id)
    {
        $sql = "SELECT * FROM livraison WHERE `id`=" . $id;
        try {
            $q = $this->db->query($sql);
            return $q;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
// *************************
//  FIN SELECTION LIVRAISON
// *************************


// *************************
//  UPDATE LIVRAISON
// *************************
    public function UpdateLivraison($d, $id)
    {
        echo "UPDATE LIVRAISON...";
        $sql = "UPDATE `livraison` SET `civ`=:civilite,`ville`=:ville,`name`=:nom,`prenom`=:prenom,`adresse`=:adresse,`cmp`=:complement_d_adresse,`code`=:code_postal WHERE `id`=" . $id;
        // $sql = "UPDATE document SET (reference=:reference,nom=:nom,date_creation=:date_creation,prix=:prix,auteur=:auteur,nbPages=:nbPages,duree=:duree,capacite=:capacite,type=:type ) WHERE reference=$ref";
        $q = $this->db->prepare($sql);
		
        $civilite = $d->getCivilite();
        $ville = $d->getVille();
        $nom = $d->getNom();
        $prenom = $d->getPrenom();
        $adresse = $d->getAdresse();
        $complement_d_adresse = $d->getComplementDadresse();
        $code_postal = $d->getCodePostal();

		$q->bindValue(':civ', $civilite);
        $q->bindValue(':ville', $ville);
        $q->bindValue(':name', $nom);
        $q->bindValue(':prenom', $prenom);
        $q->bindValue(':adresse', $adresse);
        $q->bindValue(':cmp', $complement_d_adresse);
        $q->bindValue(':code', $code_postal);
		
        try {            
		    $q->execute();
                header('Location: livraison.php');

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
// *************************
// FIN UPDATE LIVRAISON
// *************************


// *************************
// AFFICHER LIVRAISON
// *************************
    public function AfficherLivraison()
    {
        $sql = "select * from livraison ";
        try {
            $res = $this->db->query($sql);
            echo "<table  class='table table-striped' >";
            echo "<tr><th scope='col'>Id</th><th scope='col'>Civilite</th><th scope='col'>Ville</th><th scope='col'>Nom</th><th scope='col'>Prenom</th><th scope='col'>Adresse</th><th scope='col'>Complement_d_adresse</th><<th scope='col'>Code_postal</th><<th scope='col'>DELETE</th><th scope='col'>UPDATE</th></tr>";
            foreach ($res as $row) {
                 echo "<tr><td>" . $row['id'] . "</td><td>" . $row['civ'] . "</td><td>" . $row['ville'] . "</td><td>" . $row['name'] . "</td><td>" . $row['prenom'] . "</td><td>" . $row['adresse'] . "</td><td>" . $row['cmp'] . "</td><td>". $row['code'] . "</td><td>". "</td>"."<td><form method='post'><input type='text' value=".$row['id']." name='ref' hidden> <input type='submit' class='btn btn-primary btn-block' style='width:84%!important' value='supp' name='supprimer'></form></td>"."<td><a href='updateLivraison.php?p=" . $row['id'] . "'>Modifier</a></td>" . "</tr>";
            }
            echo "</table>";

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
// *************************
// FIN AFFICHER LIVRAISON
// *************************


// *************************
// SUPPRIMER DES LIVRAISONS
// *************************
    public function SupprimerLivraison($id)
    {
        $sql = "DELETE FROM `livraison` WHERE `id`=" . $id;
        try {
            $this->db->exec($sql);
            header('Location: livraison.php');
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
// *************************
// FIN SUPPRIMER DES LIVRAISONS
// *************************
}
?>