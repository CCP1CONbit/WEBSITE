
<?php
//session_set_cookie_params(0);

//$page = $_GET['page'];

if (!session_id()) {
    session_start();
    setcookie(session_name(),session_id(),time() + 7200);
}
if (isset($_SESSION) && isset($_SESSION['USERtype'])) {
    if (!isset($_GET['page'])) {
        if ($_SESSION['USERtype'] == 'admin') {
            $page='adminhome';
        } else if($_SESSION['USERtype'] == 'user'){
            $page='home';
        }
    } else {
        $page = $_GET['page'];     
    }
} else {
    $page = isset($_GET['page']) ? $_GET['page'] : '';
}


if($page =="contact")
{  
    
    include("includes/header.html");
    include("includes/navbar.html");
    include("includes/Contact.html");
    include("includes/footer.html");
    }

else if($page =="about")
{
    include("includes/header.html");
    include("includes/navbar.html");
    include("includes/about.html");
    include("includes/footer.html");
}
else if($page =="register" )
{
    
   include("Register.php");
 
}
else if($page =="admin" )
{
    
    include("admin.php");
 
}

else if($page =="login" )
{

     include("login.php");
}
else if($page =="logout")
{

    //session_destroy();
	//unset($_SESSION['admin']);//logs user out to login
    //include("login.php"); 
    //echo "logged out";
   
}

else if($page =="page-bat" )
{
   header(" location: sort.php?type=BAT&sort=none"); 
}

else if($page =="page-helmet" )
{
     include("sort.php?type=HELMET&sort=none"); 
}

else if($page =="page-pads")
{
     include("sort.php?type=PADS&sort=none"); 
}
else if($page =="page-gloves")
{
    include("sort.php?type=GLOVES&sort=none"); 
}
else if($page =="page-spikes")
{
     
    include("sort.php?type=SHOES&sort=none"); 
     
}
else if($page =="page-training")
{
      include("sort.php?type=TRAINING&sort=none"); 
}
else if($page =="page-kits")
{
      include("sort.php?type=KIT&sort=none"); 
}
else if($page =="page-ball")
{
    include("sort.php?type=BALL&sort=none"); 
}

else if($page =="adminhome")
{
    include("includes/header.html");
    include("includes/adminnavbar.html");
    include("includes/home.html");
    include("includes/footer.html");
}
else if($page =="admincontact")
{
    include("includes/header.html");
    include("includes/adminnavbar.html");
    include("includes/Contact.html");
    include("includes/footer.html");  
}
else if($page =="adminabout" )
{
    include("includes/header.html");
    include("includes/adminnavbar.html");
    include("includes/about.html");
    include("includes/footer.html");
}
else if($page =="adminaddproduct" )
{
   include("products.php"); 
}
else if($page =="adminStatistics" )
{
    include("Statistics.php");
}
else if($page =="adminaddstaff" )
{
    include("admin.php");
}
else if($page =="admineditstaffusers" )
{
    include("edituseradmin.php");
}

else 
{
    include("includes/header.html");
    include("includes/navbar.html");
    include("includes/home.html");
    include("includes/footer.html");
}


function isLoggedInAdmin()
{
	if (isset($_SESSION['admin'])) {
		return true;
	}else{
		return false;
	}
}
function isLoggedInUser()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

