<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<title>GearCl</title>
	<style>
		
		.thumbnail img{
			width: 400px;
			height: 150px;
		}
	</style>
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
						<li><a href="manage.php">Manage</a></li>
<?php 
	require_once ('./dbconnector.php');
	$con=new DBConnector();
	$sql=("select * from category");
	$rows = $con->runQuery($sql);
	foreach($rows as $r)
	{?>
						<li><a href="category.php?category=<?=$r['cateid']?>"><?=$r['catename']?></a></li>	
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
<div class="container">
				
<?php 
	require_once ('./dbconnector.php');
	$category = $_GET['category'];
	$con=new DBConnector();
	$sql="SELECT * FROM product WHERE cateid =".$category;
	$rows = $con->runQuery($sql);
	foreach($rows as $r)
	{?>		
			<div class="item  col-xs-12 col-lg-8"> 
				<div class="thumbnail"> <img class="group list-group-image" src="<?=$r['proimage']?>" alt="<?=$r['proname']?>" width="300"> 
    				<div class="caption"> 
    						<h4 class="group inner list-group-item-heading"> <?=$r['proname']?></h4> 
     						<p class="group inner list-group-item-text"><?=$r['prodes']?></p> 
     					<div class="row"> 
      						<div class="col-xs-12 col-md-6"> 
      							 <p class="lead"><?=$r['price']?>$</p> 
     						</div> 
    		 			<div class="col-xs-12 col-md-6"> 
    		 				<a class="btn btn-success">Go</a> 
      					</div> 
     					</div> 
   					</div> 
  				</div> 
  			</div>
  		<?php } ?>
  		</div>
</body>
</html>