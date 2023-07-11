<?php 
require("db.php");
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
    $mobilenumber=$_POST['mobilenumber'];
    $emailid=$_POST['emailid'];
    
    $dob=$_POST['dob'];
    $addr=$_POST['address'];
    $role=$_POST['role'];
    $sal=$_POST['salary'];
    $design=$_POST['designation'];

    if(filter_has_var(INPUT_POST,'submit'))
    {
        if(isset($_POST['gender']) && !empty($first) && !empty($last) && !empty($mobilenumber)  && !empty($emailid) && !empty($password)&& !empty($cpass) && !empty($dob) && !empty($addr) &&  !empty($role) && !empty($sal) && !empty($design))
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
        
        else{
            try{

            $query="update employees set fname='$first',lname='$last',gender='$gender',mobilenumber='$mobile',emailid='$email',dob='$dob',addr='$addr' where id='$idss'";

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
    }}}}
    require("views/myaccount.view.php");
?>

