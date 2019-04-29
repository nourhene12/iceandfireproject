<?php
/**
 * Created by PhpStorm.
 * User: Maalej Safa
 * Date: 20/03/2019
 * Time: 9:11 PM
 */
include_once "../../Config.php";
class Livraison
{
    private $id;
    private $name;
    private $prenom;
    private $adresse;
	private $ville;
    private $code;
    private $cmp;
    private $civ;

	public function __construct(){
$this->db = new Config();
$this->db =$this ->db->connect();	}
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $date
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $date
     */
    public function setadresse($adresse)
    {
        $this->adresse = $adresse;
    }
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $date
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }
     public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $date
     */
    public function setCode($code)
    {
        $this->code = $code;
    }
    /**
     * @return mixed
     */
	   public function getCmp()
    {
        return $this->cmp;
    }

    /**
     * @param mixed $date
     */
    public function setCmp($cmp)
    {
        $this->cmp = $cmp;
    }
	  public function getCiv()
    {
        return $this->civ;
    }

    /**
     * @param mixed $date
     */
    public function setCiv($civ)
    {
        $this->civ = $civ;
    }
    
    //fonction pour inserer des données
    public function insertLivraison($d)
    {      
        $sql = "INSERT INTO `livraison` (`name`,`prenom`,`adresse`,`ville`,`code`,`cmp`,`civ`) VALUES (:name,:prenom,:adresse,:ville,:code,:cmp,:civ)";
        $q = $this->db->prepare($sql);
        $name = $d->getName();
        $prenom = $d->getPrenom();
        $adresse = $d->getAdresse();
        $ville = $d->getVille();
        $code = $d->getCode();
        $cmp = $d->getCmp();
        $civ = $d->getCiv();
		
		$q->bindValue(':name', $name);
        $q->bindValue(':prenom', $prenom);
        $q->bindValue(':adresse', $adresse);
        $q->bindValue(':ville', $ville);
        $q->bindValue(':code', $code);
        $q->bindValue(':cmp', $cmp);
        $q->bindValue(':civ', $civ);

        try {
		$q->execute();
			} catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //sélectionner une ligne de table document
    public function selectLivraison($id)
    {
        $sql = "SELECT * FROM livraison WHERE `id`=" . $id;
        try {
            $q = $this->db->query($sql);
            return $q;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //Update document
    public function updateLivraison($d, $id)
    {
        echo "updating Livraison...";
        $sql = "UPDATE `livraison` SET `name`=:name,`prenom`=:prenom,`adresse`=:adresse,`ville`=:ville,`code`=:code,`cmp`=:cmp,`civ`=:civ WHERE `id`=" . $id;
        // $sql = "UPDATE document SET (reference=:reference,nom=:nom,date_creation=:date_creation,prix=:prix,auteur=:auteur,nbPages=:nbPages,duree=:duree,capacite=:capacite,type=:type ) WHERE reference=$ref";
        $q = $this->db->prepare($sql);
        $name = $d->getName();
        $prenom = $d->getPrenom();
        $adresse = $d->getAdresse();
        $ville = $d->getVille();
        $code = $d->getCode();
        $cmp = $d->getCmp();
        $civ = $d->getCiv();
		
		$q->bindValue(':name', $name);
        $q->bindValue(':prenom', $prenom);
        $q->bindValue(':adresse', $adresse);
        $q->bindValue(':ville', $ville);
        $q->bindValue(':code', $code);
        $q->bindValue(':cmp', $cmp);
        $q->bindValue(':civ', $civ);
        try {            
		    $q->execute();
                header('Location: livraison.php');

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
    public function afficheLivraison()
    {
        $sql = "select * from livraison ";
        try {
            $res = $this->db->query($sql);
            echo "<table  class='table table-striped' >";
            echo "<tr><th scope='col'>Id</th><th scope='col'>Name</th><th scope='col'>Prenom</th><th scope='col'>Adresse</th><th scope='col'>Ville</th><th scope='col'>Code</th><<th scope='col'>Cmp</th><<th scope='col'>civ</th><<th scope='col'>DELETE</th><th scope='col'>UPDATE</th></tr>";
            foreach ($res as $row) {
                 echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['prenom'] . "</td><td>" . $row['adresse'] . "</td><td>" . $row['ville'] . "</td><td>" . $row['code'] . "</td><td>" . $row['cmp'] . "</td><td>" . $row['civ'] . "</td>"."<td><form method='post'><input type='text' value=".$row['id']." name='ref' hidden> <input type='submit' class='btn btn-primary btn-block' style='width:84%!important' value='supp' name='supprimer'></form></td>"."<td><a href='updateLivraison.php?p=" . $row['id'] . "'>Modifier</a></td>" . "</tr>";
            }
            echo "</table>";

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //supprimer un document
    public function supprimeLivraison($id)
    {
        $sql = "DELETE FROM `livraison` WHERE `id`=" . $id;
        try {
            $this->db->exec($sql);
            header('Location: livraison.php');
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>