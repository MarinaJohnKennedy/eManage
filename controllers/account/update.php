<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'];

$id= $_SESSION['user']['id'];

$row=$db->query("select id,fname, lname, gender,mobilenumber,email,dob, addr,role,sal, design from employees
 where id = :id", ['id' => $id])->findOrFail();

authorize($row['id'] === $id);

$errors=[];

if(! Validator::email($email))
{
    $errors['email']= "Please a provide a valid email address";
}


if(count($errors))
{
    return view('account/edit.view.php',[
        'heading' => 'My Account',
        'errors' => $errors,
        'row' => $row
    ]);
}

    $db->query('UPDATE  employees set fname=:fname ,lname= :lname,gender= :gender,mobilenumber=:mobilenumber,email=:email,dob=:dob,addr=:addr where id=:id',[
        'fname' => $_POST['firstname'],
        'lname' => $_POST['lastname'],
        'gender' => $_POST['gender'],
        'mobilenumber' => $_POST['mobilenumber'],
        'email' => $_POST['email'],
        'dob' => $_POST['dob'],
        'addr' => $_POST['address'],
        'id' => $id
    ]);

   
$row=$db->query("select id,fname, lname, gender,mobilenumber,email,dob, addr,role,sal, design from employees
where id = :id", ['id' => $id])->findOrFail();

    return view('account/show.view.php',[
        'heading' => 'My Account',
        'errors' => $errors,
        'row' => $row
    ]);
    die();
