<?php 

$msg='';
$msg1='';

$idss=$_SESSION['id'];
$utype=$_SESSION['usertype'];
$email=$_SESSION['email'];

use Core\App;
use Core\Database;
use Core\Validator;

$db= App::resolve(Database::class);

$errors= [];

$id= $_SESSION['user']['id'];

if(! Validator::string($_POST['firstname'],1, 200))
{
    $errors['body'] ='First Name is NOT valid'; 
}

if(! Validator::string($_POST['lastname'],1, 200))
{
    $errors['body'] ='Last Name is NOT valid'; 
}
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
        view("myaccount.view.php",[
            'heading' => 'My Account',
            'errors' => $errors
            ]);
    }
       
    if(empty($errors))
    {
      

        $db->query('UPDATE  employees set fname=:fname ,lname= :lname,gender= :gender,mobilenumber=:mobilenumber,email=:email,password=:password,dob=:dob,addr=:addr where id=:id',[
            'fname' => $_POST['firstname'],
            'lname' => $_POST['lastname'],
            'gender' => $_POST['gender'],
            'mobilenumber' => $_POST['mobilenumber'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'dob' => $_POST['dob'],
            'address' => $_POST['address'],
            'id' => $$id
        ]);
        header('location: /employees');
        die();
    }

authorize($note['user_id'] === $currentUserId);
                




      
view("myaccount.view.php", [
'heading' => 'My Account',
]);

?>

