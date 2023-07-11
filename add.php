<?php

require("db.php");
$msg='';
$msg1='';
$heading="Add Employee";
session_start();

if(isset($_POST['submit']))
{ 
   

    $role = $_POST['role'];

    switch ($role) {
        case 0:
        $role="Employee";
                   break;
        case 1:
            $role="Admin";
            break;
       }
    $first=$_POST['firstname'];
    $last=$_POST['lastname'];
   
    $mobilenumber=$_POST['mobilenumber'];
    $emailid=$_POST['emailid'];
    $pass=$_POST['password'];
    $cpass=$_POST['cpassword'];
    $dob=$_POST['dob'];
    $addr=$_POST['address'];
  
    $sal=$_POST['salary'];
    $design=$_POST['designation'];
}

    
if(filter_has_var(INPUT_POST,'submit'))
{

    if(isset($_POST['gender']) && !empty($first) && !empty($last) && !empty($mobilenumber)  && !empty($emailid) && !empty($pass)&& !empty($cpass) && !empty($dob) && !empty($addr) &&  !empty($role) && !empty($sal) && !empty($design))
    { 
        if(!preg_match("/^[a-zA-Z ]*$/",$first))
        {
            $msg= "First Name is NOT valid";
        }
    
        else if(!preg_match("/^[a-zA-Z ]*$/",$last))
        {
            $msg= "Last Name is NOT valid";
        }
    
        else if(filter_var($mobilenumber,FILTER_VALIDATE_INT) === false && !preg_match("/^\d{10}$/",$mobilenumber) && strlen($mobilenumber)>10 || strlen($mobilenumber)<10 )
        {
            $msg= "Mobile Number is NOT valid";
        }
        else if(filter_var($sal,FILTER_VALIDATE_INT) === false)
        {
            $msg= "Salary is NOT valid";
        }
         else if(filter_var($emailid, FILTER_VALIDATE_EMAIL)=== false)
        {
            $msg="Please use a valid E-mail ID";
        }
        else if(  strlen($pass)<10 )
        {
            $msg="Password cannot be less than 10 charctaers long";
        }   
        else if( is_numeric($pass[0]))
        {
            $msg="Password cannot start with a number";
        }
        else if(preg_match("/[^a-zA-Z0-9]+/",$password[0]))
        {
            $msg="Password cannot start with a special character";
        }
        else if($pass != $cpass)
        {
            $msg="Passwords don't match";
        }
        else 
        {
            try{
                $gender=$_POST['gender'];
            $query="insert into employees(fname,lname,gender,mobilenumber,emailid,password,dob,addr,role,sal,design,ut) values('$first','$last','$gender','$mobilenumber','$emailid','$pass','$dob','$addr','$role','$sal','$design','Employee')";
    
            if(mysqli_query($conn, $query))
            {
                $msg1=" Employee created successfully";
            }
            else
            {
            $msg="Not updated";
            }
           
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
    } 
    
    
}
else
            {
                $msg="Please fill in all the fields";

            }
}
require("views/add.view.php");
?>

