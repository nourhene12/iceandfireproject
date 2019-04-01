<?php

include_once "Config.php";
class Commande
{
    private $ID;
    private $id_client;
    private $facture;
   
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
    public function getid_client()
    {
        return $this->id_client;
    }

    /**
     * @param mixed $name
     */
    public function setid_client($id_client)
    {
        $this->id_client = $id_client;
    }

    /**
     * @return mixed
     */
    public function getfacture()
    {
        return $this->facture;
    }

    /**
     * @param mixed $date
     */
    public function setfacture($facture)
    {
        $this->facture= $facture;
    }
   
    //fonction pour inserer des données
    public function insertCommande($d)
    {      
        $sql = "INSERT INTO `commande` (`id_client`,`facture`) VALUES (:id_client,:facture)";
        $q = $this->db->prepare($sql);
        $id_client = $d->getid_client();
        $facture = $d->getfacture();
       
		
		$q->bindValue(':id_client', $id_client);
        $q->bindValue(':facture', $facture);
       
        try {
		$q->execute();
			} catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //sélectionner une ligne de table document
    public function selectCommande($ID)
    {
        $sql = "SELECT * FROM commande WHERE `ID`=" . $ID;
        try {
            $q = $this->db->query($sql);
            return $q;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //Update document
    public function updateCommande($d, $ID)
    {
        echo "updating Commande..";
        $sql = "UPDATE `commande` SET `id_client`=:id_client,`facture`=:facture WHERE `ID`=" . $ID;
        // $sql = "UPDATE document SET (reference=:reference,nom=:nom,date_creation=:date_creation,prix=:prix,auteur=:auteur,nbPages=:nbPages,duree=:duree,capacite=:capacite,type=:type ) WHERE reference=$ref";
        $q = $this->db->prepare($sql);
       $id_client = $d->getid_client();
        $facture= $d->getfacture();
      
		$q->bindValue(':id_client', $id_client);
        $q->bindValue(':facture', $facture);
       
        try {            
		    $q->execute();
                header('Location: commande.php');

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
    public function afficheCommande()
    {
        $sql = "select * from commande ";
        try {
            $res = $this->db->query($sql);
            echo "<table  class='table table-striped' >";
            echo "<tr><th scope='col'>Id</th><th scope='col'>NOM</th><th scope='col'>PRENOM</th><th scope='col'>CIN</th><th scope='col'>TEL</th><th scope='col'>MAIL</th><<th scope='col'>PWD</th><<th scope='col'>Photo</th><<th scope='col'>DELETE</th><th scope='col'>UPDATE</th></tr>";
            foreach ($res as $row) {
                   echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['id_client'] . "</td><td>" . $row['facture'] . "<td><form method='post'><input type='text' value=".$row['ID']." name='ref' hidden> <input type='submit' class='btn btn-primary btn-block' style='width:84%!important' value='supp' name='supprimer'></form></td>"."<td><a href='updateClient.php?p=" . $row['ID'] . "'>Modifier</a></td>" . "</tr>";
            }
            echo "</table>";

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //supprimer un document
    public function supprimeCommande($ID)
    {
        $sql = "DELETE FROM `commande` WHERE `ID`=" . $ID;
        try {
            $this->db->exec($sql);
            header('Location: commande.php');
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>