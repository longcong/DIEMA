<?php
require_once ('../../database/dbhelper.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Danh Mục</title>
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
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#">Quản Lý Danh Mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../product">Quản Lý Sản Phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../../index.php">Home</a>
        </li>
        
    </ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center" style="padding-top:10px;"> Quản Lý Danh Mục </h2>
			</div>
			<div class="panel-body">
            <a href="add.php">
                <button class="btn btn-success" style="
                margin-bottom: 15px;"> Thêm Thể Loại </button>
            </a>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width='50px'>STT</th>
                <th>Thể loại</th>
                <th width='50px'></th>
                <th width='50px'></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = 'select * from categories';
            $categoryList = executeResult($sql);

            $index =1;
            foreach ($categoryList as $item){
                echo ' <tr>
                            <td>'.($index++).'</td>
                            <td>'.$item['CategoryName'].'</td>
                            <td>
                                <a href="add.php?CategoryId='.$item['CategoryId'].'">
                                    <button class="btn btn-warning" > Sửa </button>
                                </a>
                            </td>
                            <td>
                                <button class="btn btn-danger" onclick= "deleteCategory('.$item['CategoryId'].')"> Xóa </button>
                            </td>
                        </tr>';
            }
            ?>

            
        </tbody>
    </table>
    </div>
		</d iv>
    </div>

    <script type="text/javascript">
		function deleteCategory(CategoryId) {
			var option = confirm('Bạn có chắc chắn muốn xoá danh mục này không?')
			if(!option) {
				return;
			}

			console.log(CategoryId)
			//ajax - lenh post
			$.post('ajax.php', {
				'CategoryId': CategoryId,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>
</body>
</html>