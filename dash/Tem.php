<?php
ob_start();
/**
 * Created by PhpStorm.
 * User: mdallelahmed
 * Date: 20/03/2019
 * Time: 9:11 PM
 */
include_once "Config.php";
class Temoignage
{
    private $id;
    private $name;
    private $date;
    private $message;
	

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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
    /**
     * @return mixed
     */
    public function getTemoignageMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setTemoignageMessage($message)
    {
        $this->message = $message;
    }
    //fonction pour inserer des données
    public function insertTemoignage($d)
    {      
        $sql = "INSERT INTO `temoignage` (`name`,`date`,`message`) VALUES (:name,:date,:message)";
        $q = $this->db->prepare($sql);
        $name = $d->getName();
        $date = $d->getDate();
        $message = $d->getTemoignageMessage();
		
		$q->bindValue(':name', $name);
        $q->bindValue(':date', $date);
        $q->bindValue(':message', $message);
        try {
		$q->execute();
			} catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //sélectionner une ligne de table document
    public function selectTemoignage($id)
    {
        $sql = "SELECT * FROM temoignage WHERE `id`=" . $id;
        try {
            $q = $this->db->query($sql);
            return $q;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //Update document
    public function updateTemoignage($d, $id)
    {
        echo "updating Temoignage...";
        $sql = "UPDATE `temoignage` SET `name`=:name,`date`=:date,`message`=:message WHERE `id`=" . $id;
        // $sql = "UPDATE document SET (reference=:reference,nom=:nom,date_creation=:date_creation,prix=:prix,auteur=:auteur,nbPages=:nbPages,duree=:duree,capacite=:capacite,type=:type ) WHERE reference=$ref";
        $q = $this->db->prepare($sql);
        $name = $d->getName();
        $date = $d->getDate();
        $message = $d->getTemoignageMessage();
		$q->bindValue(':name', $name);
        $q->bindValue(':date', $date);
        $q->bindValue(':message', $message);
		
        try {            
		    $q->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
    public function afficheTemoignage()
    {
        $sql = "select * from temoignage ";
        try {
            $res = $this->db->query($sql);
            echo "<table  class='table table-striped' >";
            echo "<tr><th scope='col'>Id</th><th scope='col'>Name</th><th scope='col'>Date</th><th scope='col'>Message</th><th scope='col'>DELETE</th></tr>";
            foreach ($res as $row) {
                 echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['date'] . "</td><td>" . $row['message'] . "</td>"."<td><form method='post'><input type='text' value=".$row['id']." name='ref' hidden> <input type='submit' class='btn btn-primary btn-block' style='width:100%!important' value='supprmier' name='supprimer'></form></td>"."</tr>";
            }
            echo "</table>";

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //supprimer un document
    public function supprimeTemoignage($id)
    {
        $sql = "DELETE FROM `temoignage` WHERE `id`=" . $id;
        try {
            $this->db->exec($sql);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
}
ob_end_flush();
?>