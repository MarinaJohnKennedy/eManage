<?php 
use Core\App;
use Core\Database;


$db= App::resolve(Database::class);



$db->query("delete from employees where id= :id", ['id' => $_POST['id']]); 

header('location: /employees');
exit();