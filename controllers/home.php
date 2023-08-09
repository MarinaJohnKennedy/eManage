<?php 


use Core\App;
use Core\Database;

$db= App::resolve(Database::class);

$currentUserId= $_SESSION['user']['id'];

$row=$db->query("select id,fname,lname,gender,mobilenumber,email,password,dob,addr,role,sal,design from employees where id = :id", ['id' => $currentUserId])->findOrFail();

authorize($row['id'] === $currentUserId);

view("home.view.php",[
    'heading' => 'Home'
]
);
?>

