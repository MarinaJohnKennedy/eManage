<?php 
use Core\App;
use Core\Database;

$db= App::resolve(Database::class);



//$employees=$db->query("select * from employees where role='Employee'")->get();




$query="select fname,lname,gender,mobilenumber,email,dob,addr,role,sal,design from employees where role='Employee'";
$result=mysqli_query($db->connection, $query);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);



view("employees/export.view.php",[
    'heading' => 'Export Employee',
    'employees' => $employees,
    'errors' => []
    ]);






?>