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

if(! Validator::string($password))
{
    $errors['password']= "Please a provide a valid password";
}

if(! empty($errors))
{
    return view('sessions/create.view.php',[
        'errors' => $errors
    ]);
}

$user=$db->query('select * from employees where email = :email', [
    'email' => $email,
   
    ])->find();

  $_SESSION['id']=$user['id'];
  $_SESSION['fname']=$user['fname'];
  $_SESSION['lname']=$user['lname'];
    if ($user) {
        if (password_verify($password, $user['password'])) {
            login([
                'id' => $_SESSION['id'],
                'email' => $email,
                'fname' =>$_SESSION['fname'],
                'lname' =>$_SESSION['lname']
                
            ]);
    
            if($user['role']==='Employee')
{
    header('location: /account');
}
else if($user['role']==='Admin')
{
    header('location: /employees');
}
        }
    }
    
    return view('sessions/create.view.php', [
        'errors' => [
            'email' => 'No matching account found for that email address and password.'
        ]
    ]);