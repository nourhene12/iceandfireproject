<?php 
session_start();
 include "../corp/catégoriesc.php";
 $update=false;
 	$id1="";
  $id="";
    $name="";
 if(isset($_POST['ajouter'])){
 	$name=$_POST['name'];
  $id=$_POST['id'];
 	$catégories1=new catégories($id,$name);
 	$catégories1c=new categoriec;
 	$catégories1c->ajoutercatégories($catégories1);
	header('location:index2.php');
	$_SESSION['response']="l'ajout c'est bien effectué!";
	$_SESSION['res_type']="success";
 }
 $catégories2c=new categoriec;
 	$catégories2c->supprimercatégories();
 if(isset($_GET['edit'])){

 	$id=$_GET['edit'];
 	$catégories0c=new categoriec;
 	$row1=$catégories0c->modifiercatégories($id);
 	$id1=$row1['id'];
    $name=$row1['nom'];
    $update=true;
}
if(isset($_POST['Modifier'])){
  $id=$_POST['id'];
    $id1=$_POST['id1'];	
    $name=$_POST['name'];
    $catégories1=new catégories($id,$name);
 	$catégories3c=new categoriec;
 	$catégories3c->modifiercatégories1($catégories1,$_POST['id1']);
$_SESSION['response']="la modification c'est bien effectué!";
  $_SESSION['res_type']="primary";
  header('location:index2.php');
    
}
 if(isset($_GET['details']))
 {
   $id=$_GET['details'];
    $catégories0c=new categoriec;
  $row=$catégories0c->detailscatégories($id);
 	$vid=$row['id'];
 	$vname=$row['nom'];
 }	

?>