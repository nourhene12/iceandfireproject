<?php
$connect=mysqli_connect("localhost","root","","iceandfiredb");
$ouput='';
$order = $_POST["order"];
if($order == 'desc')
{
	$order ='asc';
}
else
{
	$order= 'desc';
}
$query= "SELECT * FROM produits ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";
$result = mysqli_query($connect, $query);
$ouput .='<table class="table  table-bordered" >
    <thead>
      <tr>
        <th>#</th>
        <th>nom</th>
           <th>type</th>
          <th>prix</th>
           <th>Image</th>
          <th><a class="column_sort" data-order="'.$order.'"id="nom" href="#">trier</a></th>
          </tr>
   ';
   while($row =mysqli_fetch_array($result))
   {
   	$ouput .='
   	<tr><td>'. $row["id"] . '</td><td>' . $row["nom"] . '</td><td>' . $row["type"] . '</td><td>' . $row['prix'] . '</td><td>' . $row['photo'] . '</td></tr>';
   }
   $ouput .'</table>';
   echo $ouput;
?>