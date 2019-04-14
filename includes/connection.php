<?php
// connect to DB
    $con = mysqli_connect("localhost","root","","emall");
    if(!$con){
        die("cannot connect to server");
    }