<?php 

       global $errors; 
        $errors= array();
        include("connect.php");
        include("function.php");
        include("includes/header.html");
        include("includes/adminnavbar.html");


if(isset($_POST['add'])){

  $Name        =  $_POST['name'];
  $Price       =  $_POST['price'];
  $Qauntity  =  $_POST['qauntity'];
  $Producttype  =  $_POST['producttype'];
  $file  = $_FILES["image"]["name"];
  $tempname = $_FILES["image"]["tmp_name"];
  $folder = "images/".$file;
if (empty($Name)) { 
    array_push($errors, "NAME is required"); 
  }
  if (empty($Price)) { 
    array_push($errors, "Price is required"); 
  }
  if (empty($Qauntity)) { 
    array_push($errors, "Qauntity is required"); 
  }
  if (empty($Producttype)) { 
    array_push($errors, "Producttype is required"); 
  }
  if (empty($file)) { 
    array_push($errors, "image is required"); 
  }
    // register user if there are no errors in the form
  if (count($errors) == 0) {
      $querys = "INSERT INTO products (NAME, TYPE, PRICE, QAUNTITY, Image) VALUES ('$Name','$Producttype','$Price','$Qauntity','$file');";
       
        mysqli_query($conn,$querys);
        move_uploaded_file($tempname, $folder);
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
<form method="post" action="products.php">

  <div class="input-group">
    <label for="producttype">Product Type:</label>
  <select  name="producttype">
    <option value="BAT">BAT</option>
    <option value="PADS">PADS</option>
    <option value="GLOVES" selected>Gloves</option>
    <option value="HELMET">HELMETS</option>
    <option value="KIT">KIT</option>
    <option value="BALL">BALL</option>
    <option value="TRAINING">BALL</option>
    <option value="SHOES">SHOES</option>
  </select><br>
    <label>Item Name:</label>
    <input type="text" name="name" >
  </div>
  <div class="input-group">
    <label>Price</label>
    <input type="Price" name="price">
  </div>
  <div class="input-group">
    <label>Qauntity</label>
    <input type="text" name="qauntity">
  </div>
  <div class="input-group">
    <label>Please select image:</label>
    <input type="file" name="image">
  </div>
  <div class="input-group">
    <br><button type="submit" class="btn" name="add">ADD PRODUCT</button>
  </div>
    <div>
    <?php echo display_error(); ?>
    </div>
</form>
</html>
<?php include("includes/footer.html"); ?>





