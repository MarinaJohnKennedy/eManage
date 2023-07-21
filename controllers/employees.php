<?php

const BASE_PATH = __DIR__.'/../';



$heading = "Employees";
require BASE_PATH.'db.php';
require BASE_PATH.'router.php';
echo $uri;
session_start();


$msg="";
$query="select id,fname,lname,mobilenumber,emailid from employees where ut='Employee'";

$result=mysqli_query($conn, $query);
$emps=mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
require BASE_PATH ."views/employees.view.php";


?>
