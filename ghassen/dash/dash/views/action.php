<?php 
session_start();
 include "../corp/produitc.php";
 $update=false;
 	$id1="";
    $name="";
    $type="";
    $prix="";
    $photo="";
 if(isset($_POST['ajouter'])){
 	$name=$_POST['name'];
 	$type=$_POST['type'];
 	$prix=$_POST['prix'];
 	$photo=$_FILES['image']['name'];
 	$upload="uploads/".$photo;
 	$produits1=new produits($name,$type,$prix,$upload);
 	$produits1c=new produitc;
 	$produits1c->ajouterproduits($produits1);
	move_uploaded_file($_FILES['image']['tmp_name'],$upload);
	header('location:index1.php');
	$_SESSION['response']="l'ajout c'est bien effectué!";
	$_SESSION['res_type']="success";
 }
 $produits2c=new produitc;
 	$produits2c->supprimerproduits();
 if(isset($_GET['edit'])){

 	$id=$_GET['edit'];
 	$produits0c=new produitc;
 	$row1=$produits0c->modifierproduits($id);
 	$id1=$row1['id'];
    $name=$row1['nom'];
    $type=$row1['type'];
    $prix=$row1['prix'];
    $photo=$row1['photo'];
    $update=true;
}
if(isset($_POST['Modifier'])){
    $id1=$_POST['id'];	
    $name=$_POST['name'];
 	$type=$_POST['type'];
 	$prix=$_POST['prix'];
 	$oldimage=$_POST['oldimage'];
 	$newimage=$_FILES['image']['name'];
 	if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!=""))
 	{
 	$newimage="uploads/".$_FILES['image']['name'];	
 	unlink($oldimage);
 	move_uploaded_file($_FILES['image']['tmp_name'], $newimage);

 	}
 	else{
 		$newimage=$oldimage;
 	}
 	$produits3c=new produitc;
 	$produits3c->modifierproduits1($name,$type,$prix,$newimage,$id1);
$_SESSION['response']="la modification c'est bien effectué!";
  $_SESSION['res_type']="primary";
  header('location:index1.php');
    
}
 if(isset($_GET['details']))
 {
   $id=$_GET['details'];
    $produits0c=new produitc;
  $row=$produits0c->detailsproduits($id);
 	$vid=$row['id'];
 	$vname=$row['nom'];
 	$vtype=$row['type'];
 	$vprix=$row['prix'];
 	$vphoto=$row['photo'];
 }
 recherche();
 function recherche(){	
  $output='';
  $conn = new mysqli("localhost","root","","ice&fire");

if(isset($_POST['query'])){
  $search=$_POST['query'];
  
$stmt=$conn->prepare("SELECT * FROM produits WHERE nom LIKE CONCAT('%',?,'%') ");
$stmt->bind_param("ss",$search,$search);
}
else{
  $stmt=$conn->prepare("SELECT * FROM produits");
}
$stmt->execute();
$result=$stmt->get_result();
if($result->num_rows>0){
  $output ="<thead>
      <tr>
        <th>#</th>
        <th>Image</th>
        <th>nom</th>
         <th>type</th>
          <th>prix</th>
          <th>Actions</th>
      </tr>
    </thead>
    <tbody>";
    while($row=$result->fetch_assoc()){
      $output .="<tr>
        <td>".$row['id']."</td>
        <td>".$row['nom']." </td>
        <td>".$row['type']." </td>
        <td>".$row['prix']." </td>
        </tr>
      ";
      
    }
    $output.="</tbody>";
    echo $output;
}
else{
  echo"<h3>aucune infos</h3>";
}
}
?>
