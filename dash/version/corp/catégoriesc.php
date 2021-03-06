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
		$sql="insert into categories(id,nom) values (:id,:nom)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);//prépare la requete sql à etre exécuté par
		
        $nom=$catégories->getnom();
$id=$catégories->getid();
		$req->bindValue(':nom',$nom);//bind value associe une valeur à un parametre
	    $req->bindValue(':id',$id);
		
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
function modifiercatégories1($categories,$id)
{
	

$sql="UPDATE categories SET id=:idd, nom=:nom WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idd=$categories->getid();
        $nom=$categories->getnom();
		$datas = array(':idd'=>$idd, ':id'=>$id, ':nom'=>$nom);
		$req->bindValue(':idd',$idd);
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
 

}
function recherchecategories(){	

  $db = config::getConnexion();
        $sql = "select *from categories  ";
        try {
            $res = $db->query($sql);
            foreach ($res as $row) {
                  echo'<tr><td>'. $row["id"] . '</td><td>' . $row["nom"] . '</td></tr>';
            }
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
}
}
?>
}

?>