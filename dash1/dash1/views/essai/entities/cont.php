<?php

include_once "config.php";
class contact
{   private $id;
    private $nom;
    private $message;
    private $email;
   

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
   
    public function insertContacts($d)
    {      
        $sql = "INSERT INTO `contacts` (`nom`,`message`,`email`) VALUES (:nom,:message,:email)";
        $q = $this->db->prepare($sql);
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

    //sélectionner une ligne de table document
    public function selectContacts($id)
    {
        $sql = "SELECT * FROM contacts WHERE `id`=" . $id;
        try {
            $q = $this->db->query($sql);
            return $q;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //Update document
    public function updateContacts($d, $id)
    {
        echo "updating Contacts...";
        $sql = "UPDATE `contacts` SET `nom`=:nom,`message`=:message,`email`=:email WHERE `id`=" . $id;
        // $sql = "UPDATE document SET (reference=:reference,nom=:nom,date_creation=:date_creation,prix=:prix,auteur=:auteur,nbPages=:nbPages,duree=:duree,capacite=:capacite,type=:type ) WHERE reference=$ref";
        $q = $this->db->prepare($sql);
        $nom = $d->getnom();
        $message = $d->getmessages();
        
         $email = $d->getEmail();

       
        $q->bindValue(':nom', $nom);
        $q->bindValue(':message', $message);
        $q->bindValue(':email', $email);
        
        
        try {            
            $q->execute();
            header('Location: contact.php');
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
    public function afficheContacts()
    {
        $sql = "select * from contacts ";
        try {
            $res = $this->db->query($sql);
            echo "<table  class='table table-striped' >";
            echo "<tr><th scope='col'>id</th><tr><th scope='col'>nom</th><th scope='col'>message</th><th scope='col'>Email</th><th scope='col'>DELETE</th><th scope='col'>UPDATE</th></tr>";
            foreach ($res as $row) {
                 echo "<tr><td>" . $row['id'] . "</td><tr><td>" . $row['nom'] . "</td><td>" . $row['message'] . "</td><td>" . $row['email'] ."<td><form method='post' action='#'><input type='text' value=".$row['id']." name='ref' hidden> <input type='submit' class='btn btn-primary btn-block' style='width:84%!important' value='supp' name='supprimer'></form></td>"."<td><a href='updateContact.php?p=" . $row['id'] . "'>Modifier</a></td>" . "</tr>";
            }
            echo "</table>";

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //supprimer un document
    public function supprimeContacts($id)
    {
        $sql = "DELETE FROM `contacts` WHERE `id`=" . $id;
        try {
            $this->db->exec($sql);
            header('Location: contact.php');
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
}