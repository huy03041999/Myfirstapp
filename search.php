<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

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
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Manage</a></li>
<?php 
  include 'dbconnector.php';
  $sqlcate="select * from category";
  $resultcate = pg_query($connection, $sqlcate);
  while($rows = pg_fetch_assoc($resultcate))
  {?>
            <li><a href="category.php?category=<?php echo $rows['cateid']?>"><?php echo $rows['catename']?></a></li>  
  <?php
  }
 ?>
          </ul>
          <form class="navbar-form navbar-right" role="search" action="ass2webdesign.php">
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
  include'dbconnector.php';
  if(isset($_GET['productname']))
  {
    $productname = $_GET['productname'];
    $sqlsearch = "Select * from product where proname like '%".$productname."%'";
    $resultsearch = pg_query($connection, $sqlsearch);
    while($rows = pg_fetch_assoc($resultsearch))
  {?>   
      <div class="item  col-xs-3 col-lg-3"> 
        <div class="thumbnail"> <img class="group list-group-image" src="<?php echo $rows['proimage']?>" alt="<?php echo $rows['proname']?>" width="300"> 
            <div class="caption"> 
                <h4 class="group inner list-group-item-heading"> <?php echo $rows['proname']?></h4> 
                <p class="group inner list-group-item-text"><?php echo $rows['prodes']?></p> 
              <div class="row"> 
                  <div class="col-xs-12 col-md-6"> 
                     <p class="lead"><?php echo $rows['price']?></p> 
                </div> 
              </div> 
            </div> 
          </div> 
        </div>
  <?php
  }
}
?>  
  </div> 

</body>
</html>