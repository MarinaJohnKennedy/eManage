<?php 

use Core\App;
use Core\Database;

$db= App::resolve(Database::class);



$row=$db->query("select id,fname, lname, gender,mobilenumber,email,dob, addr,role,sal, design from employees where id = :id", ['id' => $_GET['id']])->find();



view("employees/show.view.php",[
    'heading' => 'View Employee',
    'row'=> $row
    ]);

?>