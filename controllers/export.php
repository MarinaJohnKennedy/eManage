<?php 
const BASE_PATH = __DIR__ . "/../";
require BASE_PATH .'db.php';

session_start();
$heading="Export Employees";

$query="select fname,lname,gender,mobilenumber,emailid,password,dob,addr,role,sal,design from employees where ut='Employee'";
$result=mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
require BASE_PATH ."views/export.view.php";

?>