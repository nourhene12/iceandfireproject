<?php
include '../entities/produits.php';
include '../config.php';
class produitc
{
	function afficherproduits(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From produits";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function ajouterproduits($produits){
		$sql="insert into produits(nom,type,prix,photo) values (:nom,:type,:prix,:photo)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);//prépare la requete sql à etre exécuté par
		
        $nom=$produits->getnom();
        $type=$produits->gettype();
        $prix=$produits->getprix();
        $photo=$produits->getphoto();
		$req->bindValue(':nom',$nom);//bind value associe une valeur à un parametre
		$req->bindValue(':type',$type);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':photo',$photo);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	function supprimerproduits()
{
	$conn = new mysqli("localhost","root","","ice&fire");
	if($conn->connect_error){
  	die("could not connect to the database".$conn->connect_error);
  }
if(isset($_GET['supprimer'])){

 	$id=$_GET['supprimer'];

 	$query="SELECT photo FROM produits WHERE id=?";
 	$stmt2=$conn->prepare($query);
 	$stmt2->bind_param("i",$id);
 	$stmt2->execute();
 	$result2=$stmt2->get_result();
 	$row=$result2->fetch_assoc();

    $imagepath=$row['photo'];
    unlink($imagepath);

 	$sql="DELETE  FROM produits WHERE id=?";
 	$stmt=$conn->prepare($sql);
 	$stmt->bind_param("i",$id);
 	$stmt->execute();
 // Authorisation details.
    $username = "ghassen.namouchi@hotmail.fr";
    $hash = "e9168b14c8c8335c132cd18d6422955645ddc24eff7cf9004dc401ec0a625a47";

    // Config variables. Consult http://api.txtlocal.com/docs for more info.
    $test = "0";

    // Data for text message. This is the text message data.
    $sender = "phpsmssend"; // This is who the message appears to be from.
    $numbers = "+21623353363"; // A single number or a comma-seperated list of numbers
    $message = "un nouveau produit a était supprimé.";
    // 612 chars or less
    // A single number or a comma-seperated list of numbers
    $message = urlencode($message);
    $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
    $ch = curl_init('http://api.txtlocal.com/send/?');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch); // This is the result from the API
    curl_close($ch);
    echo(result);
 	header('location:index1.php');
	$_SESSION['response']="la suppression c'est bien effectué!";
	$_SESSION['res_type']="danger";}
 }
 function modifierproduits($id)
{
	$conn = new mysqli("localhost","root","","ice&fire");
	if($conn->connect_error){
  	die("could not connect to the database".$conn->connect_error);
  }


 	$query="SELECT * FROM produits WHERE id=?";
 	$stmt=$conn->prepare($query);
 	$stmt->bind_param("i",$id);
 	$stmt->execute();
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
    
   return $row;
    
 

}
function detailsproduits($id)
{
	$conn = new mysqli("localhost","root","","ice&fire");
   $query="SELECT * FROM produits WHERE id=?";
  $stmt=$conn->prepare($query);
 	$stmt->bind_param("i",$id);
 	$stmt->execute();
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
return $row;
    
 

}
function modifierproduits1($name,$type,$prix,$photo,$id1)
{
	

$conn = new mysqli("localhost","root","","ice&fire");
 	$query="UPDATE produits SET nom=?,type=?,prix=?,photo=? WHERE id=?";
 	$stmt=$conn->prepare($query);
 	$stmt->bind_param("ssssi",$name,$type,$prix,$photo,$id1);
 	$stmt->execute();

 	
 

}
function rechercheproduit(){	

  $db = config::getConnexion();
        $sql = "select *from produits  ";
        try {
            $res = $db->query($sql);
            foreach ($res as $row) {
                  echo'<tr><td>'. $row["id"] . '</td><td>' . $row["nom"] . '</td><td>' . $row["type"] . '</td><td>' . $row['prix'] . '</td><td>' . $row['photo'] . '</td></tr>';
            }
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
}
function sendmessage(){
  
    // Authorisation details.
    $username = "ghassen.namouchi@hotmail.fr";
    $hash = "e9168b14c8c8335c132cd18d6422955645ddc24eff7cf9004dc401ec0a625a47";

    // Config variables. Consult http://api.txtlocal.com/docs for more info.
    $test = "0";

    // Data for text message. This is the text message data.
    $sender = "iceandfire"; // This is who the message appears to be from.
    $numbers = "+21623353363"; // A single number or a comma-seperated list of numbers
    $message = "un produit a était ajouté.";
    // 612 chars or less
    // A single number or a comma-seperated list of numbers
    $message = urlencode($message);
    $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
    $ch = curl_init('http://api.txtlocal.com/send/?');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch); // This is the result from the API
    curl_close($ch);
    echo(result);
}
}
?>