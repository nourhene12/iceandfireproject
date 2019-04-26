<?php
include '../entities/catégories.php';
include '../config.php';
class categoriec
{
	
	function affichercatégories(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * FROM categories";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function ajoutercatégories($catégories){
		$sql="insert into categories(nom) values (:nom)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);//prépare la requete sql à etre exécuté par
		
        $nom=$catégories->getnom();
		$req->bindValue(':nom',$nom);//bind value associe une valeur à un parametre
	
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	function supprimercatégories()
{
	$conn = new mysqli("localhost","root","","ice&fire");
	if($conn->connect_error){
  	die("could not connect to the database".$conn->connect_error);
  }
if(isset($_GET['supprimer'])){

 	$id=$_GET['supprimer'];

 	$sql="DELETE  FROM categories WHERE id=?";
 	$stmt=$conn->prepare($sql);
 	$stmt->bind_param("i",$id);
 	$stmt->execute();

 	header('location:index2.php');
	$_SESSION['response']="la suppression c'est bien effectué!";
	$_SESSION['res_type']="danger";}
 }
 function modifiercatégories($id)
{
	$conn = new mysqli("localhost","root","","ice&fire");
	if($conn->connect_error){
  	die("could not connect to the database".$conn->connect_error);
  }


 	$query="SELECT * FROM categories WHERE id=?";
 	$stmt=$conn->prepare($query);
 	$stmt->bind_param("i",$id);
 	$stmt->execute();
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
    
   return $row;
    
 

}
function detailscatégories($id)
{
	$conn = new mysqli("localhost","root","","ice&fire");
   $query="SELECT * FROM categories WHERE id=?";
  $stmt=$conn->prepare($query);
 	$stmt->bind_param("i",$id);
 	$stmt->execute();
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
return $row;
    
 

}
function modifiercatégories1($name,$id)
{
	

$conn = new mysqli("localhost","root","","ice&fire");
 	$query="UPDATE categories SET nom=? WHERE id=?";
 	$stmt=$conn->prepare($query);
 	$stmt->bind_param("si",$name,$id);
 	$stmt->execute();

 	
 

}
}
?>