
<?PHP
include "../core/evenementC.php";
$evenement1C=new EvenementC();
$listeEvenements=$evenement1C->afficherEvenements();

//var_dump($listeEmployes->fetchAll());
?>
<table border="1">
<tr>
<td>nom</td>
<td>prix</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listeEvenements as $row){
	?>
	<tr>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['prix']; ?></td>
	
	<td><form method="POST" action="supprimerEvenement.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	</form>
	</td>
	<td><a href="modifierEvenement.php?id=<?PHP echo $row['id']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>


