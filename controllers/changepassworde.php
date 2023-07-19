<?php 
require("db.php");
$msg='';
$msg1='';
$heading="Change Password";
session_start();

$idss=$_SESSION['ids'];
$query="select * from employees where id='$idss'";
$result=mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$pass=$row['password'];
$first=$row['fname'];
$last=$row['lname'];
$dob=$row['dob'];
       
if(isset($_POST['submit'])){
  
    $op=$_POST['opassword'];
    $np=$_POST['npassword'];
    $cnp=$_POST['cnpassword'];
    
   }

if(filter_has_var(INPUT_POST,'submit'))
{
    $op=$_POST['opassword'];
    $np=$_POST['npassword'];
    $cnp=$_POST['cnpassword'];
      
    if(!empty($op) && !empty($np) && !empty($cnp)  )
    {
         if($op==$pass )
        {
            if($op==$np)
            {
            $msg="New password is similar to old password";
            }

            else if($np==$cnp)
            {
                if(  strlen($np)<10 )
                {
                    $msg="Password cannot be less than 10 charctaers long";
                }   
                else if( is_numeric($np[0]))
                {
                    $msg="Password cannot start with a number";
                }
                else if(preg_match("/[^a-zA-Z0-9]+/",$np[0]))
                {
                    $msg="Password cannot start with a special character";
                }
                else 
                {
                $query="update employees set password='$np' where id='$idss'";
                $result=mysqli_query($conn, $query);
                    if($result)
                    {
                    $msg1="Password Changed";
                    }
                }
            }
            else
                {
                $msg="New Passwords don't match";
                }
        }
    
        
        else
        {
        $msg="Old Password is not correct";
        }
    }
    else
    {
        $msg="Please fill in all the fields";
 
    }
}

require("views/changepassworde.view.php");
?>

