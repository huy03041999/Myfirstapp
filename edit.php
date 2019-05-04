<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Product</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
		
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="ass2webdesign.php">Home</a></li>
						<li><a href="#">Manage</a></li>
				<?php 
					require_once ('./dbconnector.php');
					$con=new DBConnector();
					$sql=("select * from category");
					$rows = $con->runQuery($sql);
					foreach($rows as $r)
					{?>
						<li><a href="detail.php?category=<?=$r['cateid']?>"><?=$r['catename']?></a></li>	
					<?php
					}
				 ?>
					</ul>
					<form class="navbar-form navbar-right" role="search" action="search.php">
						<div class="form-group">
							<input type="text" class="form-control" name="productname" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Search</button>
					</form>
				</div>
			</div>
		</nav>
		<div class="row">
			<div class="col-xs-8">
				<form action="manage.php" method="POST">
					<legend>Edit Product</legend>
					<?php 
						if (isset($_GET['id'])) {
							require_once ('./dbconnector.php');
							$con=new DBConnector();
							$sql="SELECT*FROM product WHERE proid =".$_GET['id'];
							$rows = $con -> runQuery($sql);
						}
					 ?>
					<div class="form-group">
						<?php foreach ($rows as $r) { ?>
							<label for="proid">Product ID: <?php echo $r['proid'] ?></label>
							<input type="hidden" class="form-control" id="proid" name="oldproid" placeholder="Product ID please" value="<?php echo $r['proid'] ?>">
							<label for="proname">Product Name</label>
							<input type="text" class="form-control" id="proname" name="proname" placeholder="" value="<?php echo $r['proname'] ?>">
							<label for="proimage">Product Image</label>
							<input type="text" class="form-control" id="proimage" name="proimage" placeholder="" value="<?php echo $r['proimage'] ?>">
							<label for="price">Product Price</label>
							<input type="text" class="form-control" id="price" name="price" placeholder="Product ID please" value="<?php echo $r['price'] ?>">
							<label for="prodes">Description</label>
							<input type="text" class="form-control" id="prodes" name="prodes" placeholder="Product ID please" value="<?php echo $r['prodes'] ?>">
							<?php 
								require_once ('./dbconnector.php');
								$con=new DBConnector();
								$sql=("select * from category");
								$rows = $con->runQuery($sql);
							 ?>
							 <label for="">Category</label>
							 <select name="cateid" class="form-control">
							 <?php foreach ($rows as $key) { ?>
							 	
							 		<option value="<?php echo $key['cateid'] ?>"><?php echo $key['catename'] ?></option>
							 
							 <?php } ?>
							</select>
						<?php } ?>
						
					</div>
					
					

					<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
</body>
</html>