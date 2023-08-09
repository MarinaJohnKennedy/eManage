<?php 

use Core\App;
use Core\Database;

$db= App::resolve(Database::class);



$employees=$db->query("select * from employees where role='Employee'")->get();


view("employees/index.view.php",[
    'heading' => 'Employees',
    'employees' => $employees
    ]);

 
?>