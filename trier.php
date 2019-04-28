<?php
include '../entities/livreur.php';
include '../../Config.php';
class livreurc
{
	function afficherlivreur(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From livreur";
		$db = config::connect();
		try{

		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
        function trierlivreur(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql = "select * from livreur order by id desc";
		$db = config::connect();
		try{

		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function ajouterlivreur($livreur){
		$sql="insert into livreur(nom,prenom,cin,numero) values (:nom,:prenom,:cin,:numero)";
		$db = config::connect();
		try{
        $req=$db->prepare($sql);//prépare la requete sql à etre exécuté par
		
        
        $nom=$livreur->getNom();
        $prenom=$livreur->getPrenom();
		$cin=$livreur->getCin();
        $numero=$livreur->getNumero();
		
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':cin',$cin);//bind value associe une valeur à un parametre
		$req->bindValue(':numero',$numero);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	function supprimerlivreur()
{
	$conn = new mysqli("localhost","root","","iceandfiredb");
	if($conn->connect_error){
  	die("could not connect to the database".$conn->connect_error);
  }
if(isset($_GET['supprimer'])){

 	$id=$_GET['supprimer'];


 	$sql="DELETE  FROM livreur WHERE id=?";
 	$stmt=$conn->prepare($sql);
 	$stmt->bind_param("i",$id);
 	$stmt->execute();

 	header('location:index1.php');
	$_SESSION['response']="la suppression c'est bien effectué!";
	$_SESSION['res_type']="danger";}
 }
 function modifierlivreur($id)
{
	$conn = new mysqli("localhost","root","","iceandfiredb");
	if($conn->connect_error){
  	die("could not connect to the database".$conn->connect_error);
  }


 	$query="SELECT * FROM livreur WHERE id=?";
 	$stmt=$conn->prepare($query);
 	$stmt->bind_param("i",$id);
 	$stmt->execute();
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
    
   return $row;
    
 

}
function detailslivreur($id)
{
	$conn = new mysqli("localhost","root","","iceandfiredb");
   $query="SELECT * FROM livreur WHERE id=?";
  $stmt=$conn->prepare($query);
 	$stmt->bind_param("i",$id);
 	$stmt->execute();
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
return $row;
    
 

}
function modifierlivreur1($nom,$prenom,$cin,$numero,$id1)
{
	

$conn = new mysqli("localhost","root","","iceandfiredb");
 	$query="UPDATE livreur SET nom=?,prenom=?,cin=?,numero=? WHERE id=?";
 	$stmt=$conn->prepare($query);
 	$stmt->bind_param("ssssi",$nom,$prenom,$cin,$numero,$id1);
 	$stmt->execute();

 	
 

}
function recherchelivreur(){	

  $db = config::connect();
        $sql = "select *from livreur  ";
        try {
            $res = $db->query($sql);
            foreach ($res as $row) {
                  echo'<tr><td>'. $row["id"] . '</td><td>' . $row["nom"] . '</td><td>' . $row["prenom"] . '</td><td>' . $row['cin'] . '</td><td>' . $row['numero'] . '</td></tr>';
            }
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
}
}
?>