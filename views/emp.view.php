<?php require('partials/header.php')?>
<?php require('partials/nav.php')?>

<?php require('partials/banner.php')?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
     <br> <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Email ID</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($emps as $emp): ?>
    <form action=emp.php method=GET>
    <tr>
      <th scope="row"><?php echo $emp['id']?></th>
      <td><?php echo $emp['fname']?></td>
      <td><?php echo $emp['lname']?></td>
      <td><?php echo $emp['mobilenumber']?></td>
      <td><?php echo $emp['emailid']?></td>
      <td><a href="empdetails.php?id=<?php echo $emp['id']?>"><input type=button class=sub name=view value=View></a></td>
        <td><a href="exportbio.php?id=<?php echo $emp['id']?>"><input type=button class=sub name=expdf value='Export Biodata'></a></td>
    </tr>
    </form>
        <?php endforeach;?>
  </tbody>
</table>
    </div>
  </main>
  <?php require('partials/footer.php')
  ?>