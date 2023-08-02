<?php


const BASE_PATH = __DIR__.'/../';

$heading="Login";


require("db.php");



$msg='';
session_start();


if(isset($_POST['submit'])){
    
    $email=$_POST['emailid'];
    $pass=$_POST['password'];
    $_SESSION['emailid'] = $email;
    $_SESSION['password'] = $pass;

}
$msg='';
if(filter_has_var(INPUT_POST,'submit'))
{
    $email=$_POST['emailid'];
    $pass=$_POST['password'];
   

    if(!empty($email) && !empty($pass) )
    {
         if(filter_var($email, FILTER_VALIDATE_EMAIL)=== false)
        {
            $msg="Please use a valid E-mail ID";
        }
        
        else 
        {
            
        $query="select * from employees where emailid='$email' and password='$pass'";
        $result=mysqli_query($conn, $query);
        
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            if($count==1)
            {                
                session_start();        
                $_SESSION['usertype']=$row['ut'];
                $utype=$_SESSION['usertype'];
                $_SESSION['ids']=$row['id'];
                $idss=$_SESSION['ids'];
                $_SESSION['firstname']=$row['fname'];
                $_SESSION['lastname']=$row['lname'];
                
                if($utype=="Admin")
                {
                 
                    header('Location: /employees');
                  
                }
                else if($utype=="Employee")
                {
                    header('Location: /home');
                    
                }
                
            }
            else
            {
                $msg="Invalid Email ID or Password";
        
            }
        }
    }
    else
    {
        $msg="Please fill in all the fields";
 
    }

}
require BASE_PATH .'views/index.view.php';
?>