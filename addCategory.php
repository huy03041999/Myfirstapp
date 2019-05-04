<!DOCTYPE html>
<html>
<head>
	<title>Add Category</title>
</head>
<body>
<?php 
$CatName = $_GET['CatName'];
$sql = " Insert into category(CatName) values ('" . $CatName "')";
$conn = DBConnector();
$conn->runQuery	 ?>
	<form action="">
		<h1>Add more Category</h1>
		Category: <input type="text" name="CatName"> <br>
		<input type="Submit" value="Add Category">
	</form>
</body>
</html>