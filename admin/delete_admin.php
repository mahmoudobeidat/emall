<?php
include '../includes/connection.php';

$query = "delete from admin where admin_id={$_GET['admin_id']}";
mysqli_query($con, $query);
header("location:manage_admin.php");