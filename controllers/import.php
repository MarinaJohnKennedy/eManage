<?php 
require("db.php");
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$msg="";
$msg1="";
session_start();

$heading="Import Employees";

if(isset($_POST['import']))
{
    
  $file=$_FILES['excel']['name'];
  $extension= pathinfo($_FILES["excel"]["name"],PATHINFO_EXTENSION);
  
   if($extension=='xls' || $extension=='xlsx' || $extension=='csv' )
   {
    $obj=PhpOffice\PhpSpreadsheet\IOFactory::load($file);
    
    $data=$obj->getActiveSheet()->toArray();
    $count=0;
   foreach($data as $row)
    {
    $count++;
    $fname=$row[1];
    $lname=$row[2];
    $gender=$row[3];
    $mobilenumber=$row[4];
    $emailid=$row[5];
    $password=$row[6];
    $dob=$row[7];
    $addr=$row[8];
    $role=$row[9];
    $sal=$row[10];
    $design=$row[11];
    $ndob=date("Y-m-d",strtotime($dob));
    if($count==1) continue;

    $query="insert into employees(fname,lname,gender,mobilenumber,emailid,password,dob,addr,role,sal,design,ut) values('$fname','$lname','$gender','$mobilenumber','$emailid','$password','$ndob','$addr','$role','$sal','$design','Employee')";
    $result=mysqli_query($conn, $query);
  
    if($result)
    {
    $msg1="Imported Successfully";
    }
    else
    {
        
    $msg="Import Failed";
    }
}
}
  else{
    $msg="Invalid File";
  }
}


require("views/import.view.php");

?>

