<?php

include "../base.php";

class Reservation
{   private $id;
    private $nom;
    private $prenon;
    private $date;
    private $description;
    private $email;
    private $time;
    private $phone;

    /*function __construct($nom,$prenom,$date,$description,$email,$time,$phone)
    {
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->date=$date;
        $this->description=$description;
        $this->email=$email;
        $this->time=$time;
        $this->phone=$phone;
}*/
   
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
   


function afficherEvenement ($reservation)
{
    echo "nom: ".$reservation->getnom()."<br>";
        echo "prenom: ".$reservation->getprenom()."<br>";
        echo "date: ".$reservation->getDate()."<br>";
        echo "description: ".$reservation->getdescriptionreservation()."<br>";
        echo "email: ".$reservation->getEmail()."<br>";
        echo "time: ".$reservation->getTime()."<br>";
        echo "phone: ".$reservation->getPhone()."<br>";
        }
     public function ajouterEvenement($d)
    {      
        $sql = "INSERT INTO `reservation` (`nom`,`prenom`,`date`,`description`,`email`,`time`,`phone`) VALUES (:nom,:prenom,:date,:description,:email,:time,:phone)";
        $db = Config1::getConnexion();
          try {

        $q=$db->prepare($sql);
        $nom = $d->getnom();
        $prenom = $d->getprenom();
        $date = $d->getDate();
        $description = $d->getdescriptionreservation();
        $email = $d->getEmail();
        $time = $d-> getTime();
        $phone = $d->getPhone();
       
        $q->bindValue(':nom', $nom);
        $q->bindValue(':prenom', $prenom);
        $q->bindValue(':date', $date);
        $q->bindValue(':description', $description);
        $q->bindValue(':email', $email);
        $q->bindValue(':time', $time);
        $q->bindValue(':phone', $phone);
        $q->execute();
        } 
        catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    
     public function AfficherReservations()
    {
        $sql="SELECT * From `reservation`";
        $db = Config1::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
    
      public function supprimerReservation($id)
    {
        $sql = "DELETE FROM `reservation` WHERE `id`=" . $id;
       $db = Config1::getConnexion();
             $q=$db->prepare($sql);
        try {
                $q->execute();

            
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
     public function modifierReservation($d, $id)
    {
        echo "updating Reservation...";
        $sql = "UPDATE `reservation` SET `nom`=:nom,`prenom`=:prenom,`date`=:date ,`description`=:description ,`email`=:email ,`time`=:time  ,`phone`=:phone WHERE `id`=" . $id;
        // $sql = "UPDATE document SET (reference=:reference,nom=:nom,date_creation=:date_creation,prix=:prix,auteur=:auteur,nbPages=:nbPages,duree=:duree,capacite=:capacite,type=:type ) WHERE reference=$ref";
        $db = Config1::getConnexion();

        $q=$db->prepare($sql);
        $nom = $d->getnom();
        $prenom = $d->getprenom();
        $date = $d->getDate();
        $description = $d->getdescriptionreservation();
        $email = $d->getEmail();
        $time = $d-> getTime();
        $phone = $d->getPhone();
       
        $q->bindValue(':nom', $nom);
        $q->bindValue(':prenom', $prenom);
        $q->bindValue(':date', $date);
        $q->bindValue(':description', $description);
        $q->bindValue(':email', $email);
        $q->bindValue(':time', $time);
        $q->bindValue(':phone', $phone);
      
    try {            
            $q->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
    function recupererReservation($id){
        $sql="SELECT * from `reservation` where id=$id";
        $db = Config1::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}