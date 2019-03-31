<?php

include "../base.php";

class Contact
{   private $id;
    private $nom;
    private $message;
    private $email;

 
   
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
    public function getmessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $name
     */
    public function setmessage($message)
    {
        $this->message = $message;
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


function afficherContact ($contact)
{
    echo "nom: ".$contact->getnom()."<br>";
    echo "message: ".$contact->getmessage()."<br>";
    echo "email: ".$contact->getEmail()."<br>";
}
     public function ajouterContact($d)
    {      
        $sql = "INSERT INTO `contacts` (`nom`,`message`,`email`) VALUES (:nom,:message,:email)";
        $db = config1::getConnexion();
          try {

        $q=$db->prepare($sql);
        $nom = $d->getnom();
        $message = $d->getmessage();
        $email = $d->getEmail();
        
       
        $q->bindValue(':nom', $nom);
        
        $q->bindValue(':message', $message);
        $q->bindValue(':email', $email);
            $q->execute();
        } 
        catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    
     public function AfficherContacts()
    {
        $sql="SELECT * From `contacts`";
        $db = Config1::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
    
      public function supprimerContact($id)
    {
        $sql = "DELETE FROM `contacts` WHERE `id`=" . $id;
       $db = Config1::getConnexion();
             $q=$db->prepare($sql);
        try {
                $q->execute();

            
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
     public function modifierContact($d, $id)
    {
        echo "updating Contacts...";
        $sql = "UPDATE `contacts` SET `nom`=:nom,`message`=:message ,`email`=:email  WHERE `id`=" . $id;
        // $sql = "UPDATE document SET (reference=:reference,nom=:nom,date_creation=:date_creation,prix=:prix,auteur=:auteur,nbPages=:nbPages,duree=:duree,capacite=:capacite,type=:type ) WHERE reference=$ref";
        $db = Config1::getConnexion();

        $q=$db->prepare($sql);
        $nom = $d->getnom();
        $message = $d->getmessage();
        $email = $d->getEmail();
       
        $q->bindValue(':nom', $nom);
        
        $q->bindValue(':message', $message);
        $q->bindValue(':email', $email);
      
    try {            
            $q->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
    function recupererContact($id){
        $sql="SELECT * from `contacts` where id=$id";
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