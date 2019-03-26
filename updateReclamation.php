
<!---------
 * Created by PhpStorm.
 * User: badiaa
 * Date: 05/10/2017
 * Time: 18:11
 */
------>
<?php
include_once 'Reclamation.php';
/**
 *  Affich Doc
 */
$id=$_GET['p'];
echo $id;

$reclamation=new reclamation();
$res=$reclamation->selectReclamation($id);
foreach($res as $row) {}
/*
 * Recupération des données soumis par l'utilsateur
 */
if(isset($_POST['modifier'])){
    if(isset($_POST['modifier'])){
    $nouveau_reclamation = new Reclamation();
    $nouveau_reclamation->setName($_POST['name']);
    $nouveau_reclamation->setEmail($_POST['email']);
    $nouveau_reclamation->setDate($_POST['phone']);
    $nouveau_reclamation->setPhone($_POST['date']);
    $nouveau_reclamation->setTime($_POST['time']);
	$nouveau_reclamation->setReclamationMessage($_POST['message']);
    $nouveau_reclamation->updateReclamation($nouveau_reclamation,$id);
    }
}
?>
<html>
<head>
    <title>Modif Reclamation</title>
    <meta charset="utf-8">
</head>
<body>
<center>
<h1>Modifier un Reclamation</h1>
    <fieldset style="width: 30%">
        <form method="post" action="#">
            <table>
                <tr><td>Name: </td><td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td></tr>
                <tr><td>Email: </td><td><input type="text" name="email" value="<?php echo $row['email']; ?>"></td></tr>
                <tr><td>Phone: </td><td><input type="" name="phone" value="<?php echo $row['phone']; ?>"></td></tr>
                <tr><td>Date: </td><td><input type="" name="date" value="<?php echo $row['date']; ?>"></td></tr>
                <tr><td>Time: </td><td><input type="" name="time" value="<?php echo $row['time']; ?>"></td></tr>
				<tr><td>Message: </td><td><input type="" name="message" value="<?php echo $row['message']; ?>"></td></tr>

		   </table>
            <input type="submit" value="Modifier" name="modifier">
        </form>
    </fieldset>
</center>
</body>
</html>