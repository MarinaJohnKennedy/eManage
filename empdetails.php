<?php 
require("db.php");
$msg="";
$msg1="";
session_start();

$heading="Employee Details";

$idss="";
$emps="";

if(isset($_GET['id']))
{
    $idss=mysqli_real_escape_string($conn,$_GET['id']);
    $query="select id,fname,lname,gender,mobilenumber,emailid,password,dob,addr,role,sal,design from employees where id='$idss'";
    $result=mysqli_query($conn, $query);
    $emps=mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
    
    
        
}       

if(isset($_POST['submit']))
{
   
    $first=$_POST['firstname'];
    $last=$_POST['lastname'];
    $mobilenumber=$_POST['mobilenumber'];
    $emailid=$_POST['emailid'];
    $password=$_POST['password'];
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
        else if(  strlen($password)<10 )
        {
            $msg="Password cannot be less than 10 charctaers long";
        }   
        else if( is_numeric($password[0]))
        {
            $msg="Password cannot start with a number";
        }
        else if(preg_match("/[^a-zA-Z0-9]+/",$password[0]))
        {
            $msg="Password cannot start with a special character";
        }
        else if(!preg_match("/^[a-zA-Z ]*$/",$last))
        {
            $msg= "Last Name is NOT valid";
        }
    
        else if(filter_var($mobilenumber,FILTER_VALIDATE_INT) === false && !preg_match("/^\d{10}$/",$mobile) && strlen($mobile)>10 || strlen($mobile)<10 )
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
        
        else{
            try{
                $gender=$_POST['gender'];
            $query="update employees set fname='$first',lname='$last',gender='$gender',mobilenumber='$mobilenumber',emailid='$emailid',password='$password' ,dob='$dob',addr='$addr',role='$role',sal='$sal', design='$design' where id='".$_GET['id']."'";

            $result=mysqli_query($conn, $query);

            if($result)
            {
            header("Location:empdetails.php?id=".$_GET['id']);
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
    }
    }}}
  
require("views/empdetails.view.php");

?>
