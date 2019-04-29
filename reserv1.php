<?php
/**
 * Created by PhpStorm.
 * User: mdallelahmed
 * Date: 20/03/2019
 * Time: 9:11 PM
 */
include_once "Config.php";
class Reservation
{   private $id;
    private $nom;
    private $prenon;
    private $date;
    private $description;
    private $email;
    private $time;
    private $phone;

    public function __construct(){
$this->db = new Config();
$this->db =$this ->db->connect();   }
    /**
     * @return mixed
     */
        public function getid()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setid($id)
    {
        $this->id = $id;
    }
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $id
     */
    public function setnom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getprenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $name
     */
    public function setprenom($prenom)
    {
        $this->prenom = $prenom;
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
    public function getdescriptionreservation()
    {
        return $this->description;
    }

    /**
     * @param mixed $message
     */
    public function setdescriptionreservation($description)
    {
        $this->description = $description;
    }
    //fonction pour inserer des données
    public function insertReservation($d)
    {      
        $sql = "INSERT INTO `reservation` (`nom`,`prenom`,`date`,`description`,`email`,`phone`,`time`) VALUES (:nom,:prenom,:date,:description,:email,:phone,:time)";
        $q = $this->db->prepare($sql);
        $nom = $d->getnom();
        $prenom = $d->getprenom();
        $date = $d->getDate();
        $description = $d->getdescriptionreservation();
        $email = $d->getEmail();

        $phone = $d->getPhone();

        $time = $d->getTime();

        $q->bindValue(':nom', $nom);
        $q->bindValue(':prenom', $prenom);
        $q->bindValue(':date', $date);
        $q->bindValue(':description', $description);
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
    public function selectReservation($id)
    {
        $sql = "SELECT * FROM reservation WHERE `id`=" . $id;
        try {
            $q = $this->db->query($sql);
            return $q;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //Update document
    public function updateReservation($d, $id)
    {
        echo "updating reservation...";
        $sql = "UPDATE `reservation` SET `nom`=:nom,`prenom`=:prenom,`date`=:date,`description`=:description,`email`=:email,`time`=:time,`phone`=:phone WHERE `id`=" . $id;
        // $sql = "UPDATE document SET (reference=:reference,nom=:nom,date_creation=:date_creation,prix=:prix,auteur=:auteur,nbPages=:nbPages,duree=:duree,capacite=:capacite,type=:type ) WHERE reference=$ref";
        $q = $this->db->prepare($sql);
        $nom = $d->getnom();
        $prenom = $d->getprenom();
        $date = $d->getDate();
        $description = $d->getdescriptionreservation();
         $email = $d->getEmail();

        $phone = $d->getPhone();

        $time = $d->getTime();
        $q->bindValue(':nom', $nom);
        $q->bindValue(':prenom', $prenom);
        $q->bindValue(':date', $date);
        $q->bindValue(':description', $description);
        $q->bindValue(':email', $email);
        $q->bindValue(':phone', $phone);
        $q->bindValue(':time', $time);
        
        try {            
            $q->execute();
            header('Location: reservation.php');
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
    public function afficheReservation()
    {
        $sql = "select * from reservation ";
        try {
            $res = $this->db->query($sql);
            echo "<table  class='table table-striped' >";
            echo "<tr><th scope='col'>id</th><tr><th scope='col'>nom</th><th scope='col'>prenom</th><th scope='col'>Date</th><th scope='col'>description</th><th scope='col'>Email</th><th scope='col'>phone</th><<th scope='col'>Time</th><<th scope='col'>DELETE</th><th scope='col'>UPDATE</th></tr>";
            foreach ($res as $row) {
                 echo "<tr><td>" . $row['id'] . "</td><tr><td>" . $row['nom'] . "</td><td>" . $row['prenom'] . "</td><td>" . $row['date'] . "</td><td>" . $row['description'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone'] . "</td><td>" . $row['time'] . "</td>"."<td><form method='post' action='#'><input type='text' value=".$row['id']." name='ref' hidden> <input type='submit' class='btn btn-primary btn-block' style='width:84%!important' value='supp' name='supprimer'></form></td>"."<td><a href='updateReservation.php?p=" . $row['id'] . "'>Modifier</a></td>" . "</tr>";
            }
            echo "</table>";

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //supprimer un document
    public function supprimeReservation($id)
    {
        $sql = "DELETE FROM `reservation` WHERE `id`=" . $id;
        try {
            $this->db->exec($sql);
            header('Location: reservation.php');
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
}