<!DOCTYPE html>
<html lang="en">
<head>
<title>Create Price Range Slider for Product in jQuery & PHP with MySQL by lisenme</title>
<style>
.container{padding: 20px;}
.filter-panel{width:100%;}
.filter-panel p{margin-right: 30px;float: left;}
#productContainer{float: left;width: 100%;}
.list-item{
    float: left;
    width: 15%;
    height: 80px;
    padding: 10px;
    border: 2px solid #cacaca;
    margin: 10px 10px 10px 0px;
}
.list-item h2{margin: 0;}
</style>
<link rel="stylesheet" href="jquery.range.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="jquery.range.js"></script>
<script>
function filterProducts() {
    var price_range = $('.price_range').val();
    $.ajax({
        type: 'POST',
        url: 'getProducts.php',
        data:'price_range='+price_range,
        beforeSend: function () {
            $('.container').css("opacity", ".5");
        },
        success: function (html) {
            $('#productContainer').html(html);
            $('.container').css("opacity", "");
        }
    });
}
</script>
</head>
<body>
<h1>Create Price Range Slider For Product in JQuery & PHP with MySQL</h1>
<div class="container">
    <div class="filter-panel">
        <p><input type="hidden" class="price_range" value="0,500" /></p>
        <input type="button" onclick="filterProducts()" value="FILTER" />
    </div>
    <div id="productContainer">
        <?php
        //Include database configuration file
        include('dbConfig.php');
        
        //get product rows
        $query = $db->query("SELECT * FROM produits ORDER BY id DESC");
        
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
        } ?>
    </div>
</div>

<script>
$('.price_range').jRange({
    from: 0,
    to: 500,
    step: 50,
    format: '%s USD',
    width: 1150,
    showLabels: true,
    isRange : true
});
</script>
</body>
</html>