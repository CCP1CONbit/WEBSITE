<?php
		    $type = $_GET['type'];
		    $sort = $_GET['sort'];

		    global $errors; 
        $errors= array();
        include("connect.php");
        include("includes/header.html");
        include("includes/navbar.html");
        
?>

<html>
<ul class="uln">
  <li class="lit"><a href="sort.php?type=<?php echo $type ?> & sort=qauntity">Qauntity</a></li>
  <li class="dropdown1">
    <a href="javascript:void(0)" class="dropbtn2">Price</a>
    <div class="dropdown-contents">
      <a class="aa" href="sort.php?type=<?php echo $type ?> & sort=low">Low-High</a>
      <a class="aa" href="sort.php?type=<?php echo $type ?> & sort=high">High-Low</a>
    </div>
  </li>
  
    

  

</ul>
<table>
  <tr>
  <th>Name</th>
  <th>Price</th>
  <th>Qauntity</th>
  </tr>
<?php
  if ($sort == "low") //price low to high sort
      {
        $sql = "SELECT * FROM PRODUCTS WHERE TYPE LIKE "."\"".$type ."\""." ORDER BY PRICE ASC;";
        $results = $conn ->query($sql);
        if($results->num_rows> 0)
        {

          while($row =$results->fetch_assoc())
          {
            echo '<tr><td>' .$row["NAME"].'<BR><img src = "data:image/jpeg;base64,'.base64_encode($row["image"]).
            '"height="42" width="42"/>'.
            '</td>'.
            '<td>'.$row["PRICE"].'</td>'.
            '<td>'.$row["QAUNTITY"].'</td>';
            
          }
        }
      }
  else if ($sort == "high") //price high to low sort
        {
          sorthightolow();
        }
  else if ($sort =="qauntity")//qaulity sort
        {
          sortqauntity();
        }


?>
</table>
</html>

<?php include("includes/footer.html"); ?>