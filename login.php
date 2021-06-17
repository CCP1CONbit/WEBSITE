<?php
     
        global $errors; 
        $errors= array();
        include("connect.php");
        include("function.php");

        if(isset($_POST['loginbtn'])) // CHECK IF THE BUTTON WASP PRESSED
        {

    
            $email    = $_POST['email']; //GET POSTERD EMAIL
            $password = $_POST['pwd'];    //GET POSTED PASSWORD FORM FORM
            
            if (empty($email)) //checks to see if user entered eamil
            { 
                 array_push($errors, "Email is required"); 
            }
            ////
            if (empty($password))  //checks to see if user entered password
            { 
                array_push($errors, "Password is required"); 
            }
            /////
            if (count($errors) == 0)
             {
                ////nested if
                login($conn, $email, $password); //if its a admin loggin in
               

        }//ends error if statement
            }//end main if statement

        include("includes/header.html");
        include("includes/navbar.html");

?>


<html>
<div class="stylesheet">
<link rel="stylesheet" type="text/css" href="css/login.css">
</div>
    <div class="login">
    <form method="post" action="login.php">
        <p>
        <h1>Login</h1>
        <pre>
        <br><h1>email:</h1>     <input type="text" name="email" placeholder="User Email..." class="input">
        <br><h1>Password:</h1>  <input type="password" name="pwd" placeholder="User Password..."  class="input">
        </pre>
        <br><button type="submit" name="loginbtn" class="loginbtn" >Login</button><br><br>
        not registered?<a href="index.php?page=register">Click Here</a><br>
        </p> 
        <div>
                <?php echo display_error();?>
        </div>  
    </form>
    </div>
</html>

<?php include("includes/footer.html");?>


