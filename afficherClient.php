
<?PHP
include "../core/ClientC.php";
$ClientC=new ClientC();
$listeClient=$ClientC->afficherClient();

//var_dump($listeEmployes->fetchAll());
?>
<table border="1">
<tr>
<td>Nom</td>
<td>Prenom</td>
<td>ID</td>
<td>Tel</td>
<td>mail</td>
<td>CIN</td>
<td>PWD</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listeClient as $row){
	?>
	<tr>
	<td><?PHP echo $row['Nom']; ?></td>
	<td><?PHP echo $row['Prenom']; ?></td>
	<td><?PHP echo $row['ID']; ?></td>
	<td><?PHP echo $row['Tel']; ?></td>
	<td><?PHP echo $row['mail']; ?></td>
	<td><?PHP echo $row['CIN']; ?></td>
	<td><?PHP echo $row['PWD']; ?></td>
	
	<td><form method="POST" action="supprimerClient.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['ID']; ?>" name="ID">
	</form>
	</td>
	<td><a href="modifierClient.php?id=<?PHP echo $row['ID']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>


