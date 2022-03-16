<?php
require_once ('../database/dbhelper.php');
$ProductId = '';
if (isset($_GET['ProductId'])) {
	$ProductId       = $_GET['ProductId'];
	$sql      = 'select * from categories where ProductId = '.$ProductId;
	$products = executeSingleResult($sql);
	if ($products != null) {
		$ProductName = $products['ProductName'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Category Page - <?=$ProductName?></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center"></h2>
			</div>
			<div class="panel-body">
				<div class="row">
<?php
	$sql = 'select products.ProductId, products.thumbnail, products.CategoryId,
     	 products.ProductName, products.Price, products.SIZE, products.Brand, products.Quantity, products.TotalSellQuantity,
     	 CategoryName from products left join categories on (products.CategoryId = categories.CategoryId) where categories.CategoryId = '.$CategoryId;
	$productList = executeResult($sql);

foreach ($productList as $item) {
	echo '<div class="col-lg-3">
			<a href="detail.php?ProductId='.$item['ProductId'].'"><img src="'.$item['thumbnail'].'" style="width: 100%"></a>
			<a href="detail.php?ProductId='.$item['ProductId'].'"><p>'.$item['ProductName'].'</p></a>
			<p style="color: red; font-weight: bold;">'.$item['Price'].'</p>
		</div>';
}
?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>




<div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="text-center">Quản Lý Danh Mục</h2>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="300px">Thumbnail</th>
                                            <th>ProductName</th>
                                            <th>CategoryName</th>
                                            <th>Price</th>
                                            <th>Size</th>
                                            <th>Brand</th>
                                            <th width="50px"></th>
                                            <th width="50px"></th>
                                        </tr>
                                    </thead>
					<tbody>
                        <?php
                        //Lay danh sach danh muc tu database
                        $sql          = 'select * from products';
                        $productList = executeResult($sql);

                        $index = 1;
                        foreach ($productList as $item) {
                            echo '<tr>
                                        <td>'.($index++).'</td>
                                        <td><a href="product.php?ProductId='.$item['ProductId'].'">'.$item['ProductName'].'</a></td>
                                    </tr>';
                        }
                        ?>