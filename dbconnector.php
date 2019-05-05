<?php
$connection = pg_connect("host=ec2-184-72-237-95.compute-1.amazonaws.com
 port=5432 dbname=dbtephttujcrda user=jhscfhryimhzkt password=cdbda63178f465787640a210f1e45fc258ad7860cab14a9a8ec73ea9ea6aa1a4
");  
 if(!$connection) {
     die("Database connection failed");
 }
 ?>