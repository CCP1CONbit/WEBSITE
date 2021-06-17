<?php 

   	 	global $errors; 
        $errors= array();
        include("connect.php");
        include("function.php");
        include("includes/header.html");
    	include("includes/adminnavbar.html");


if(isset($_POST['REGNEWUSER'])){

    $username    =  $_POST['name'];
	$email       =  $_POST['email'];
	$password_1  =  $_POST['pwd1'];
	$password_2  =  $_POST['pwd2'];

if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
    if(userexists($conn , $email)!==false) //check database if email is already in use
    {
        array_push($errors, "Email is Already Registered");
    }
    
    // register user if there are no errors in the form
	if (count($errors) == 0) {

		$password = password_hash($password_1, PASSWORD_DEFAULT);//encrypt the password before saving in the database

		
			$query = "INSERT INTO users (firstname, email, pwd, type) 
					  VALUES('$username', '$email', '$password', 'admin' )";
			mysqli_query($conn, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($conn);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
        $_SESSION["STATUS"] = true;
			header('location: index.php');
        echo "Success";
		}
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
	<h2>Register Admin</h2>
</div>
<form method="post" action="admin.php">
	<div class="input-group">
		<label>Firstname</label>
		<input type="text" name="name" >
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="pwd1">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="pwd2">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="REGNEWUSER">Register</button>
	</div>
    <div>
    <?php echo display_error(); ?>
    </div>
</form>
</html>
<?php include("includes/footer.html"); ?>


