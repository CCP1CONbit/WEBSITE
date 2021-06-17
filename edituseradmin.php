<?php
    include("connect.php");
    include("includes/header.html");
    include("includes/adminnavbar.html");

  ?>
  <html>
  <link rel="stylesheet" type="text/css" href="css/usertable.css">
  <div class="spacing"></div>
  <div class="tablespace">
<table class="usertable">
    <thead class="theadu">
        <tr class="tru">
            <th class="thu">ID</th>
            <th class="thu">Name</th>
            <th class="thu">Email</th>
            <th class="thu">user-Type</th>
            <th class="thu" colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sqlusers = "SELECT * FROM users";
            $usersresult = $conn ->query($sqlusers);
            while ($rows = mysqli_fetch_array($usersresult)) {?>
               
            
         
        <tr class="tru">
            <td class="thu"><?php echo $rows['id']?></td>
            <td class="thu"><?php echo $rows['firstname']?></td>
            <td class="thu"><?php echo $rows['email']?></td>
            <td class="thu"><?php echo $rows['type']?></td>
            <td class="thu">
                <a href="edituser.php?Id=<?php echo $rows["id"]?>">Edit</a>
            </td>
            <td class="thu">
                <a href="deleteuser.php?Id=<?php echo $rows["id"]?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>

</table>
</div>
<div class="spacing"></div>

  </html>
  <?php include("includes/footer.html"); ?>