<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);



$errors=[];


if(! empty($errors))
{
    return view('employees/create.view.php',[
        'errors' => $errors
    ]);
}

if(password_verify($_POST['password'],password_hash($_POST['cpassword'],PASSWORD_BCRYPT)))
    {
    $db->query('INSERT INTO employees (fname, lname, gender,mobilenumber,email,password,dob, addr,role,sal, design) 
    VALUES(:fname, :lname, :gender, :mobilenumber, :email, :password, :dob, :addr, :role, :sal, :design)',[
        'fname' => $_POST['firstname'],
        'lname' => $_POST['lastname'],
        'gender' => $_POST['gender'],
        'mobilenumber' => $_POST['mobilenumber'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
        'dob' => $_POST['dob'],
        'addr' => $_POST['address'],
        'role' => $_POST['role'],
        'sal' => $_POST['salary'],
        'design' => $_POST['designation']
      
    ]);


header('location: /employees');
die();
    }