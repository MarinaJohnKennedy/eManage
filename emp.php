<?php

require("db.php");
$heading = "Employees";
session_start();

$msg="";
$query="select id,fname,lname,mobilenumber,emailid from employees where ut='Employee'";

$result=mysqli_query($conn, $query);
$emps=mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
require("views/emp.view.php");

?>
