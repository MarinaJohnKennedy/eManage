<?php require('partials/header.php')?>



<?php require('partials/banner.php')?>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
      <fieldset>

<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Mobile Number</th>
        <th>Email ID</th>
        <th>Password</th>
        <th>Date of Birth</th>
        <th>Address</th>
        <th>Role</th>
        <th>Salary</th>
        <th>Designation</th>
    </tr>
    <?php
   
$query="select id,fname,lname,gender,mobilenumber,emailid,password,dob,addr,role,sal,design from employees where ut='Employee'";
$result=mysqli_query($conn, $query);
if($result-> num_rows>0)
{
    while($row=mysqli_fetch_array($result))
    {
    

        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['fname']."</td>";
        echo "<td>".$row['lname']."</td>";
        echo "<td>".$row['gender']."</td>";
        echo "<td>".$row['mobilenumber']."</td>";
        echo "<td>".$row['emailid']."</td>";
        echo "<td>".$row['password']."</td>";
        echo "<td>".$row['dob']."</td>";
        echo "<td>".$row['addr']."</td>";
        echo "<td>".$row['role']."</td>";
        echo "<td>".$row['sal']."</td>";
        echo "<td>".$row['design']."</td>";
        echo "</tr>";
    }

echo "</table>";
header('content-type:application.xls');
header('content-disposition:attachment;filename=report.xls');
}
else{
    $msg="No Employees";
}
    ?>
    

</fieldset>
    </div>
  </main>

  <?php require('partials/footer.php')?>