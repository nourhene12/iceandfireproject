<?PHP
include "../entities/event.php";
include "../core/evenementC.php";
if (isset($_GET['id'])){
	$evenementC=new EvenementC();
    $result=$evenementC->recupererEvenement($_GET['id']);
	foreach($result as $row){
		$nom=$row['nom'];
		$prix=$row['prix'];
		
?>
<HTML>
<head>
</head>
<body>

<form method="POST">
<table>
<caption>Modifier Evenement</caption>
<tr>
<td>Nom</td>
<td><input type="text" name="nom" value="<?PHP echo $nom ?>"></td>
</tr>
<tr>
<td>Prix</td>
<td><input type="number" name="prix" value="<?PHP echo $prix ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="Modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>"></td>
</tr>

</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$evenement=new evenement($_POST['nom'],$_POST['prix']);
	$evenementC->modifierEvenement($evenement,$_POST['id_ini']);
	echo $_POST['id_ini'];
	header('Location: afficherEvenement.php');
}
?>
</body>
</HTMl>