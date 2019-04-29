<?php
 
$fac=new FactureC();
$result=$fac->getFacture($_SESSION["idCmd"],$_SESSION["id"]);
foreach ($result as $value) {
	?>



<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>FACTURE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" media="all" />
  </head>
  <body style="font-family: Junge;position: relative;width: 21cm;height: 29.7cm;margin: 0 auto;color: #001028;background: #FFFFFF;font-size: 14px">
    <main>
    <h1> <big>Facture n° <?php echo $value["numfacture"]?>   </big> </h1>
      <h2  class="clearfix"><small><span>DATE </span><?php echo $value["dateFacture"]?></small><br> <small><span>DATE DECHEANCE </span><?php echo $value["dateEcheance"]?></small></h2> <br>
      <table border="1" width="100%" height="100%">
        <thead>
          <tr>
            <th>PRODUIT</th>
            <th>DESCRIPTION</th>
            <th>PRIX</th>
            <th>QT</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
        <?php $ligne=new LigneCommandeC();
          $result=$ligne->detailCmd($_SESSION["idCmd"]);
          foreach($result as $val){  ?>
          <tr>
            <td><?php echo $val["nomproduit"] ?></td>
            <td><?php echo $val["description"] ?></td>
            <td><?php echo $val["coutUnitaire"] ?></td>
            <td><?php echo $val["quantite"] ?></td>
            <td><?php echo $val["total"] ?></td>
          </tr> <?php } ?>
         <?php
         $cmd=new CommandeC();
         $list=$cmd->getCommande($_SESSION["idCmd"]);
         foreach($list as $val){

         ?>
        
          <tr>
            <td colspan="4" style="text-align:right">GRAND TOTAL</td>
            <td class="grand total"><?php echo $val["total_ht"];?></td>
              <?php } ?>
          </tr>
        </tbody>
      </table>
      <br> <br> <br> <hr>
      <div>
       <p><b>Client :</b><?php echo $value["nom"]." ".$value["prenom"] ?></p> 
       <p><b> Mail:</b><?php echo $value["email"]?></p>
       <p><b>Boutique:</b> ICE AND FIRE </p> 
       <p><b> MailBoutique:</b>safa9882@gmail.com </p> 
       <?php } ?>
     </div>
     
    </main>
   
  </body>
</html> 