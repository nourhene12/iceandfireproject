<?php
if(isset($_POST['price_range'])){
    
    //Include database configuration file
    include('dbConfig.php');
    
    //set conditions for filter by price range
    $whereSQL = $orderSQL = '';
    $priceRange = $_POST['price_range'];
    if(!empty($priceRange)){
        $priceRangeArr = explode(',', $priceRange);
        $whereSQL = "WHERE prix BETWEEN '".$priceRangeArr[0]."' AND '".$priceRangeArr[1]."'";
        $orderSQL = " ORDER BY prix ASC ";
    }else{
        $orderSQL = " ORDER BY id DESC ";
    }
    
    //get product rows
    $query = $db->query("SELECT * FROM produits $whereSQL $orderSQL");
    
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
    ?>
        <div class="list-item">
            <h2><?php echo $row["nom"]; ?></h2>
            <h4>Price: <?php echo $row["prix"]; ?></h4>
        </div>
    <?php }
    }else{
        echo 'Product(s) not found';
    }
}
?>