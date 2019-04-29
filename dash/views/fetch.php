<?php

//fetch.php

include'../config.php';

$column = array('id', 'nom', 'type', 'prix', 'photo');

$query = "SELECT * FROM produits ";

if(isset($_POST['search']['value']))
{
 $query .= '
 WHERE id LIKE "%'.$_POST['search']['value'].'%" 
 OR nom LIKE "%'.$_POST['search']['value'].'%" 
 OR type LIKE "%'.$_POST['search']['value'].'%" 
 OR prix LIKE "%'.$_POST['search']['value'].'%" 
 OR photo LIKE "%'.$_POST['search']['value'].'%"';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

/*if($_POST['length'] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}*/

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['id'];
 $sub_array[] = $row['nom'];
 $sub_array[] = $row['type'];
 $sub_array[] = $row['prix'];
 $sub_array[] = $row['photo'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM produits";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 //'draw'    => intval($_POST['draw']),
 'recordsTotal'  => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'    => $data
);

echo json_encode($output);

?>