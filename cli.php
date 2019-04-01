<?php

include_once "Config.php";
class Client
{
    private $ID;
    private $Nom;
    private $Prenom;
    private $CIN;
	private $Tel;
    private $mail;
    private $PWD;
    private $photo;

	public function __construct(){
$this->db = new Config();
$this->db =$this ->db->connect();	}
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->ID;
    }

    /**
     * @param mixed $id
     */
    public function setId($ID)
    {
        $this->ID= $ID;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @param mixed $name
     */
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
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
    public function getCin()
    {
        return $this->CIN;
    }

    /**
     * @param mixed $date
     */
    public function setCin($CIN)
    {
        $this->CIN = $CIN;
    }
    public function getTel()
    {
        return $this->Tel;
    }

    /**
     * @param mixed $date
     */
    public function setTel($Tel)
    {
        $this->Tel = $Tel;
    }
     public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $date
     */
    public function setMail($Mail)
    {
        $this->mail = $Mail;
    }
    /**
     * @return mixed
     */
	   public function getPwd()
    {
        return $this->PWD;
    }

    /**
     * @param mixed $date
     */
    public function setPwd($PWD)
    {
        $this->PWD = $PWD;
    }
	  public function getPhoto()
    {
        return $this->Photo;
    }

    /**
     * @param mixed $date
     */
    public function setPhoto($Photo)
    {
        $this->Photo = $Photo;
    }
    
    //fonction pour inserer des données
    public function insertClient($d)
    {      
        $sql = "INSERT INTO `client` (`Nom`,`Prenom`,`CIN`,`Tel`,`mail`,`PWD`,`Photo`) VALUES (:Nom,:Prenom,:CIN,:Tel,:mail,:PWD,:Photo)";
        $q = $this->db->prepare($sql);
        $Nom = $d->getNom();
        $Prenom = $d->getPrenom();
        $CIN = $d->getCin();
        $Tel = $d->getTel();
        $mail = $d->getMail();
        $PWD = $d->getPwd();
        $Photo = $d->getPhoto();
		
		$q->bindValue(':Nom', $Nom);
        $q->bindValue(':Prenom', $Prenom);
        $q->bindValue(':CIN', $CIN);
        $q->bindValue(':Tel', $Tel);
        $q->bindValue(':mail', $mail);
        $q->bindValue(':PWD', $PWD);
        $q->bindValue(':Photo', $Photo);

        try {
		$q->execute();
			} catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //sélectionner une ligne de table document
    public function selectClient($ID)
    {
        $sql = "SELECT * FROM client WHERE `ID`=" . $ID;
        try {
            $q = $this->db->query($sql);
            return $q;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //Update document
    public function updateClient($d, $ID)
    {
        echo "updating Client...";
        $sql = "UPDATE `client` SET `Nom`=:Nom,`Prenom`=:Prenom,`CIN`=:CIN,`Tel`=:Tel,`mail`=:mail,`PWD`=:PWD,`Photo`=:Photo WHERE `ID`=" . $ID;
        // $sql = "UPDATE document SET (reference=:reference,nom=:nom,date_creation=:date_creation,prix=:prix,auteur=:auteur,nbPages=:nbPages,duree=:duree,capacite=:capacite,type=:type ) WHERE reference=$ref";
        $q = $this->db->prepare($sql);
       $Nom = $d->getNom();
        $Prenom = $d->getPrenom();
        $CIN = $d->getCin();
        $Tel = $d->getTel();
        $mail = $d->getMail();
        $PWD = $d->getPwd();
        $Photo = $d->getPhoto();
		
		$q->bindValue(':Nom', $Nom);
        $q->bindValue(':Prenom', $Prenom);
        $q->bindValue(':CIN', $CIN);
        $q->bindValue(':Tel', $Tel);
        $q->bindValue(':mail', $mail);
        $q->bindValue(':PWD', $PWD);
        $q->bindValue(':Photo', $Photo);
        try {            
		    $q->execute();
                header('Location: client.php');

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
    public function afficheClient()
    {
        $sql = "select * from client ";
        try {
            $res = $this->db->query($sql);
            echo "<table  class='table table-striped' >";
            echo "<tr><th scope='col'>Id</th><th scope='col'>NOM</th><th scope='col'>PRENOM</th><th scope='col'>CIN</th><th scope='col'>TEL</th><th scope='col'>MAIL</th><<th scope='col'>PWD</th><<th scope='col'>Photo</th><<th scope='col'>DELETE</th><th scope='col'>UPDATE</th></tr>";
            foreach ($res as $row) {
                 echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['Nom'] . "</td><td>" . $row['Prenom'] . "</td><td>" . $row['CIN'] . "</td><td>" . $row['Tel'] . "</td><td>" . $row['mail'] . "</td><td>" . $row['PWD'] . "</td><td>" . $row['Photo'] . "</td>"."<td><form method='post'><input type='text' value=".$row['ID']." name='ref' hidden> <input type='submit' class='btn btn-primary btn-block' style='width:84%!important' value='supp' name='supprimer'></form></td>"."<td><a href='updateClient.php?p=" . $row['ID'] . "'>Modifier</a></td>" . "</tr>";
            }
            echo "</table>";

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //supprimer un document
    public function supprimeClient($ID)
    {
        $sql = "DELETE FROM `client` WHERE `ID`=" . $ID;
        try {
            $this->db->exec($sql);
            header('Location: client.php');
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>