<?php 
use Core\App;
use Core\Database;

$db= App::resolve(Database::class);

$currentUserId= $_SESSION['user']['id'];

$row=$db->query("select * from employees where id = :id", ['id' => $currentUserId ])->findOrFail();

authorize($row['id'] === $currentUserId);

view("account/edit.view.php",[
    'heading' => 'Edit Account',
    'row' => $row
    ]);

 
?>
       