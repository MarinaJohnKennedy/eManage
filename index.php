<?php

require("db.php");
$heading="Login";


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
                $_SESSION['usertype']=$row['ut'];
                $utype=$_SESSION['usertype'];
                $_SESSION['ids']=$row['id'];
                $idss=$_SESSION['ids'];
                $_SESSION['firstname']=$row['fname'];
                $_SESSION['lastname']=$row['lname'];
                
                if($utype=="Admin")
                {
                
                header("Location:emp.php");
           
                }
                else if($utype=="Employee")
                {
                    
                    header("Location:employeehome.php");
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
require("views/index.view.php");
?>