<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors=[];
if(! Validator::email($email))
{
    $errors['email']= "Please a provide a valid email address";
}

if(! Validator::string($password,7,255))
{
    $errors['password']= "Please a provide a password of at least 7 characters";
}

if(! empty($errors))
{
    return view('registration/create.view.php',[
        'errors' => $errors
    ]);
}



$user= $db->query('select * from employees where email= :email',[
    'email' => $email,
])->find();

if($user)
{
    
logout();

header('location: /');
exit(); 

}
else 
{
    
    $db->query('INSERT INTO employees (fname, lname, gender,mobilenumber,email,password,dob, addr,role,sal, design) 
    VALUES(:fname, :lname, :gender, :mobilenumber, :email, :password, :dob, :addr, :role, :sal, :design)',[
        'fname' => $_POST['firstname'],
        'lname' => $_POST['lastname'],
        'gender' => $_POST['gender'],
        'mobilenumber' => $_POST['mobilenumber'],
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
        'dob' => $_POST['dob'],
        'addr' => $_POST['address'],
        'role' => $_POST['role'],
        'sal' => $_POST['salary'],
        'design' => $_POST['designation']
      
    ]);

    $user=$db->query('select * from employees where email = :email', [
        'email' => $email,
       
        ])->find();
    
      $_SESSION['id']=$user['id'];
      $_SESSION['firstname']=$user['fname'];
      $_SESSION['lastname']=$user['lname'];

    login([
        'id' => $_SESSION['id'],
        'email' => $email
    ]);
if($user['role']==='Employee')
{
    header('location: /account');
}
else if($user['role']==='Admin')
{
    header('location: /employees');
}
    exit();
}