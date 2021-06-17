<?php
		var_dump($_GET);
		$ID = $_GET['Id']; //gets user Id
		global $errors; 
        $errors= array();
        include("connect.php");
        include("function.php");
        include("includes/header.html");
    	include("includes/adminnavbar.html");

    	$user = getUserById($conn , $ID);
		if($user == false) //user does not exist
			{
				array_push($errors,"user not found");
				//	echo "no user";
			}

?>
<html>
<div>
    <style>
    input
        {
            margin-left: 2vw;
            margin-top: 1vw;
            
        }
        label
        {
            margin-left: 3vw;
            margin-top: 1vw;
        }
    
    </style>
</div>
<div class="header">
	<h2>Change User Data</h2>
</div>
<form method="post" action="edituser.php">
	<div class="input-group">
		<label>Firstname</label>
		<input type="text" name="name" value="<?php echo $user["firstname"];  ?>" >
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $user["email"];  ?>">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="update">Update</button>
	</div>
    <div>
    <?php echo display_error(); ?>
    </div>
</form>
</html>
<?php include("includes/footer.html"); ?>

