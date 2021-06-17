<?php 
if(isset($_POST['submit'])){
    $to = "willem.meintjies.00@gmail.com"; // this is your Email address
    $from = $_POST['useremail']; // this is the sender's Email address
    $first_name = $_POST['firstname'];
    $subject = "Querry submission";
    $subject2 = "Copy of your Querry submission";
    $message = $first_name ." wrote the following:" . "\n\n" . $_POST['querry'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['querry'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
     header("location: index.php?page=contact");
 }

?>