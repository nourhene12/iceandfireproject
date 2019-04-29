<?PHP
include "../core/evenementC.php";
$envnementC=new EvenementC();
if (isset($_POST["id"])){
	$envnementC->supprimerEvenement($_POST["id"]);
	header('Location: afficherEvenement.php');
}

?>