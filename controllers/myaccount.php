<?php 
const BASE_PATH = __DIR__ . "/../";
require BASE_PATH .'db.php';
$msg='';
$msg1='';
session_start();
$heading="My Account";
$idss=$_SESSION['ids'];
$utype=$_SESSION['usertype'];
$email=$_SESSION['emailid'];


                
if(isset($_POST['submit']))
{
    $first=$_POST['firstname'];
    $last=$_POST['lastname'];
    $mobile=$_POST['mobilenumber'];
    $emailid=$_POST['emailid'];
    $pass=$_POST['password'];
    $dob=$_POST['dob'];
    $addr=$_POST['address'];
    $role=$_POST['role'];
    $sal=$_POST['salary'];
    $design=$_POST['designation'];

    if(filter_has_var(INPUT_POST,'submit'))
    {
        if(!empty($first) && !empty($last) && !empty($mobile)  && !empty($emailid)  && !empty($addr)  && !empty($pass))
      {
        if(!preg_match("/^[a-zA-Z ]*$/",$first))
        {
            $msg= "First Name is NOT valid";
        }
    
        else if(!preg_match("/^[a-zA-Z ]*$/",$last))
        {
            $msg= "Last Name is NOT valid";
        }
    
        else if(filter_var($mobile,FILTER_VALIDATE_INT) === false && !preg_match("/^\d{10}$/",$mobile) && strlen($mobile)>10 || strlen($mobile)<10 )
        {
            $msg= "Mobile Number is NOT valid";
        }
        else if(filter_var($email, FILTER_VALIDATE_EMAIL)=== false)
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
            else if(preg_match("/[^a-zA-Z0-9]+/",$pass[0]))
        {
            $msg="Password cannot start with a special character";
        }
        else{
            try{
                $gender=$_POST['gender'];
            $query="update employees set fname='$first',lname='$last',gender='$gender',mobilenumber='$mobile',emailid='$emailid',dob='$dob',password='$pass',addr='$addr' where id='$idss'";

            $result=mysqli_query($conn, $query);

            if($result)
            {
            $msg1="Updated account details";
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
    }}
    else
    {
        $msg="Please fill in all the fields";
 
    }
}}
//view("myaccount.view.php", [
    //'heading' => 'My Account',
//]);
require BASE_PATH ."views/myaccount.view.php";
?>

