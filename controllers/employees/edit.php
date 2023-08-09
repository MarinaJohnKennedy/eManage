<?php 
use Core\App;
use Core\Database;

$db= App::resolve(Database::class);



$row=$db->query("select * from employees where id = :id", ['id' => $_GET['id'] ])->findOrFail();



view("employees/edit.view.php",[
    'heading' => 'Edit Employee',
    'errors' => [],
    'row' => $row
    ]);

 
?>
       