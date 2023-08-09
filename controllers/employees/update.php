<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);



$id= $_POST['id'];

$row=$db->query("select id,fname, lname, gender,mobilenumber,email,dob, addr,role,sal, design from employees
 where id = :id", ['id' => $id])->findOrFail();


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

   
header('location: /employees');

    die();
