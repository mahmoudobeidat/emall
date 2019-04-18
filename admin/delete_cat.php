<?php
include '../includes/connection.php';
$query = "delete from categories where cat_id= {$_GET['cat_id']}";
mysqli_query($con, $query);
header("location:manage_category.php");

?>
