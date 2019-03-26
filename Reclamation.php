<?php
/**
 * Created by PhpStorm.
 * User: mdallelahmed
 * Date: 20/03/2019
 * Time: 9:11 PM
 */
include_once "Config.php";
class Reclamation
{
    private $id;
    private $name;
    private $email;
    private $phone;
    private $date;
    private $time;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
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
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getReclamationMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setReclamationMessage($message)
    {
        $this->message = $message;
    }
    //fonction pour inserer des données
    public function insertRecalamtion($d)
    {      
        $sql = "INSERT INTO `reclamation` (`name`,`email`,`phone`,`date`,`time`,`message`) VALUES (:name,:email,:phone,:date,:time,:message)";
        $q = $this->db->prepare($sql);
        $name = $d->getName();
        $email = $d->getEmail();
        $phone = $d->getPhone();
        $date = $d->getDate();
        $time = $d->getTime();
        $message = $d->getReclamationMessage();
		

      
		$q->bindValue(':name', $name);
        $q->bindValue(':email', $email);
        $q->bindValue(':phone', $phone);
        $q->bindValue(':date', $date);
        $q->bindValue(':time', $time);
        $q->bindValue(':message', $message);
		var_dump($q);
        try {
 $q->execute();
 } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //sélectionner une ligne de table document
    public function selectReclamation($id)
    {
        $sql = "SELECT * FROM reclamation WHERE `id`=" . $id;
        try {
            $q = $this->db->query($sql);
            return $q;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //Update document
    public function updateReclamation($d, $id)
    {
        echo "updating reclamation...";
        $sql = "UPDATE `reclamation` SET `name`=:name,`email`=:email,`phone`=:phone,`date`=:date,`time`=:time,`message`=:message WHERE `id`=" . $id;
        // $sql = "UPDATE document SET (reference=:reference,nom=:nom,date_creation=:date_creation,prix=:prix,auteur=:auteur,nbPages=:nbPages,duree=:duree,capacite=:capacite,type=:type ) WHERE reference=$ref";
        $q = $this->db->prepare($sql);
        $name = $d->getName();
        $email = $d->getEmail();
        $phone = $d->getPhone();
        $date = $d->getDate();
        $time = $d->getTime();
        $message = $d->getReclamationMessage();
        $q->bindValue(':name', $name);
        $q->bindValue(':email', $email);
        $q->bindValue(':phone', $phone);
        $q->bindValue(':date', $date);
        $q->bindValue(':time', $time);
        $q->bindValue(':message', $message);
		
        try {            
		    $q->execute();
			header('Location: index.php');
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
    public function afficheReclamation()
    {
        $sql = "select * from reclamation ";
        try {
            $res = $this->db->query($sql);
            echo "<table style='border: double;'>";
            echo "<tr><td>Id</td><td>Name</td><td>email</td><td>Phone</td><td>Date</td><td>Time</td><td>Message</td></tr>";
            foreach ($res as $row) {
                echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone'] . "</td><td>" . $row['date'] . "</td><td>" . $row['time'] . "</td><td>" . $row['message'] . "</td>"."<td><form method='post' action='#'><input type='text' value=".$row['id']." name='ref' hidden> <input type='submit' value='supprmier' name='supprimer'></form></td>"."<td><a href='updateReclamation.php?p=" . $row['id'] . "'>Modifier</a></td>" . "</tr>";
            }
            echo "</table>";

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //supprimer un document
    public function supprimeReclamation($id)
    {
        $sql = "DELETE FROM `reclamation` WHERE `id`=" . $id;
        try {
            $this->db->exec($sql);
            header('Location: index.php');
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
}