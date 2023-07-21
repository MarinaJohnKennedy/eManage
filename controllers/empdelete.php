<?php 
const BASE_PATH = __DIR__ . "/../";
require BASE_PATH .'db.php';
$msg="";
$msg1="";
session_start();

$heading="Delete Employee";

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

    if(isset($_POST['delete']))
    {
        

        if(filter_has_var(INPUT_POST,'delete'))
        {
           
                $query="delete from employees where id='".$_GET['id']."'";
    
                $result=mysqli_query($conn, $query);
    
                if($result)
                {
                
                    header("Location:empdelete.php");
                $msg="Deleted Employee Successfully ";
                }
                else
                {
                $msg="Not Deleted";
                }

               
        
        }
    } 
    require BASE_PATH ."views/empdelete.view.php";

?>
