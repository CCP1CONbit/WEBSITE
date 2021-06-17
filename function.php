<?php
global $errors; 
        $errors= array();
//displays error message on form
function display_error() {
    global $errors;
	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

//function getUserById($id){
	//global $conn;
	//$query = "SELECT * FROM users WHERE id=" . $id;
	//$result = mysqli_query($conn, $query);

	//$user = mysqli_fetch_assoc($result);
	//return $user;
//}

function userexists($conn , $email)
{
   $sql = "SELECT * FROM users WHERE email = ?;";  
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
      array_push($errors, "stmt failed");  
        header("location: index.php?page=register"); //move back to register
    }
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);
    $results =mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($results))
    {
       return $row; //return array of user data 
    }
    else
    {
        $result = false;
        return $result;
    }
}

function login($conn, $email, $password)
{

	$user = userexists($conn , $email);

	if($user == false) //user does not exist
	{
			array_push($errors,"user not found");
		//	echo "no user";
	}

	else
	{
		$DBpassword = $user["pwd"]; //return password in database
		$chechpassword = password_verify($password, $DBpassword); //VERIFY PASSWORD HASH

		if ($chechpassword==false) 
		{
			array_push($errors, "password doesnt match");
			

		}
		else if ($chechpassword==true) 
		{
			if($user["type"] =="admin") //check if its admin or user
			{
				session_start();
				$_SESSION["USERid"]   = $user["id"]; //sets user ID into session
				$_SESSION["USERname"] = $user["firstname"]; //sets user ID into session
				$_SESSION["USERemail"] = $user["email"];
				$_SESSION["USERtype"] = $user["type"]; //sets user ID into session

				//array_push($errors, "ads LOGGED IN");
				include("./index.php");
				//header('Location: index.php?page=adminhome');
				//exit;
			}

			else if($user["type"] =="user") //check to see if its admin or user
			{
				session_start();
				$_SESSION["USERid"] = $user["id"]; //sets user ID into session
				$_SESSION["USERname"] = $user["firstname"]; //sets user ID into session
				$_SESSION["USERtype"] = $user["type"]; //sets user ID into session
				//array_push($errors, "uuuR LOGGED IN");
				include("./index.php");
			}
			
		}

	}

}
function getUserById($conn , $ID)
{

	$sql = "SELECT * FROM users WHERE id=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
      	array_push($errors, "stmt failed");  
        //header("location: index.php?page=edituseradmin"); //move back to register
    }
    mysqli_stmt_bind_param($stmt,"s",$ID);
    mysqli_stmt_execute($stmt);
    $resultsid =mysqli_stmt_get_result($stmt);

    if($rowid = mysqli_fetch_assoc($resultsid))
    {
       return $rowid; //return array of user data 
    }
    else
    {
        $resultid = false;
        return $resultid;
    }
}
?>