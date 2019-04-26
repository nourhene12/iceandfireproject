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
    private $date;
    private $message;
	private $email;
    private $time;
    private $phone;

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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $date
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $date
     */
    public function setTime($time)
    {
        $this->time = $time;
    }
     public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $date
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
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
    public function insertReclamation($d)
    {      
        $sql = "INSERT INTO `reclamation` (`name`,`date`,`message`,`email`,`phone`,`time`) VALUES (:name,:date,:message,:email,:phone,:time)";
        $q = $this->db->prepare($sql);
        $name = $d->getName();
        $date = $d->getDate();
        $message = $d->getReclamationMessage();
                $email = $d->getEmail();

        $phone = $d->getPhone();

        $time = $d->getTime();

		
		$q->bindValue(':name', $name);
        $q->bindValue(':date', $date);
        $q->bindValue(':message', $message);
                $q->bindValue(':email', $email);
        $q->bindValue(':phone', $phone);
        $q->bindValue(':time', $time);

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
        echo "updating Reclamation...";
        $sql = "UPDATE `reclamation` SET `name`=:name,`date`=:date,`message`=:message,`email`=:email,`time`=:time,`phone`=:phone WHERE `id`=" . $id;
        // $sql = "UPDATE document SET (reference=:reference,nom=:nom,date_creation=:date_creation,prix=:prix,auteur=:auteur,nbPages=:nbPages,duree=:duree,capacite=:capacite,type=:type ) WHERE reference=$ref";
        $q = $this->db->prepare($sql);
        $name = $d->getName();
        $date = $d->getDate();
        $message = $d->getTemoignageMessage();
         $email = $d->getEmail();

        $phone = $d->getPhone();

        $time = $d->getTime();

		$q->bindValue(':name', $name);
        $q->bindValue(':date', $date);
        $q->bindValue(':message', $message);
            $q->bindValue(':email', $email);
                $q->bindValue(':phone', $phone);
                    $q->bindValue(':time', $time);
		
        try {            
		    $q->execute();
			header('Location: api.php');
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
    public function afficheReclamation()
    {
        $sql = "select * from reclamation ";
        try {
            $res = $this->db->query($sql);
            echo "<table  class='table table-striped' >";
            echo "<tr><th scope='col'>Id</th><th scope='col'>Name</th><th scope='col'>Date</th><th scope='col'>Message</th><th scope='col'>Email</th><th scope='col'>Phone</th><<th scope='col'>Time</th><<th scope='col'>Supprimer</th><th scope='col'>SMS</th></tr>";
            foreach ($res as $row) {
                 echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['date'] . "</td><td>" . $row['message'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone'] . "</td><td>" . $row['time'] . "</td>"."<td><form method='post' action='#'><input type='text' value=".$row['id']." name='ref' hidden> <input type='submit' class='btn btn-primary btn-block' style='width:100%!important' value='supprmier' name='supprimer'></form></td>"."<td><a href='send_sms.php?p=" . $row['id'] . "'>Envoyer</a></td>" . "</tr>";
            }
            echo "</table>";

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

       public function afficheReclamationdash()
    {
        $sql = "select * from reclamation ";
        try {
            $res = $this->db->query($sql);
            foreach ($res as $row) {
                 echo "<tr><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone'] . "</td></tr>";
            }
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
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
}