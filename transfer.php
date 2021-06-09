<?php
session_start();
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"bank");
if(!$con){
    die("Connection failed");
} 


$flag=false;

if (isset($_POST['transfer']))
{
$sender=$_SESSION['sender'];
$receiver=$_POST["reciever"];
$amount=$_POST["amount"];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Customers</title>
    <!-- Including the bootstrap CDN -->
    <link rel="stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"> </script> 
    <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="http://anijs.github.io/lib/anicollection/anicollection.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Including style sheet-->
    <link rel="stylesheet" href="style.css">
    <!-- Icon -->
    <link rel="icon" height="50px" href="./images/llo.png">
</head>
<body style="background-color: #fff" onload="loader()">

<nav class="navbar navbar-expand-sm  navbar-toggler navbar-light" style=" background-color:#2E2E2F;"> 
            <img  src="images/llo.png" alt="logo" style="width: 150px;>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02" style="float:right;">
                <ul class="navbar-nav ml-auto"  style="text-decoration: none;padding: 5px 20px;font-family: poppins, sans-serif;font-size: 16px;text-transform: uppercase; "> 
                <li class="nav-item">
                        <a class="nav-link " href="index.php" style="color:white;font-weight:1em;">
                            <span style="padding-right:20px;" >&nbsp;&nbsp;Home</span>
                        </a> 
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link " href="index.php" style="color:white;font-weight:1em;">
                            <span style="padding-right:20px;" >View Customer</span>
                        </a> 
                    </li> 


                    <li class="nav-item">
                        <a class="nav-link" href="transferrecords.php" style="color:white;font-weight:1em;">
                            Transfer Records
                        </a> 
                    </li>  
                </ul> 
            </div>
        </nav> 
        
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>
setTimeout(function(){$('#loading').hide();}, 3000); 
  var preloader = document.getElementById("loading");
      function loader(){
        preloader.style.display = 'none';
      }
</script>
</body>
</html>

<?php

$sql = "SELECT CurrentBalance FROM customers WHERE name='$sender'";
$result = $con->query($sql);
if($result->num_rows>0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 if($amount>$row["CurrentBalance"] or $row["CurrentBalance"]-$amount<100){
    echo "<script>swal( 'Error','Insufficient Balance!','error' ).then(function() { window. location = 'viewcustomers.php'; });;</script>";
   
 }
else{
    $sql = "UPDATE `customers` SET CurrentBalance=(CurrentBalance-$amount) WHERE Name='$sender'";
    

if ($con->query($sql) === TRUE) {
  $flag=true;
} else {
  echo "Error updating record: " . $conn->error;
}
 }
 
  }
}
 else {
  echo "0 results";
} 

if($flag==true){
$sql = "UPDATE `customers` SET CurrentBalance=(CurrentBalance+$amount) WHERE name='$receiver'";

if ($con->query($sql) === TRUE) {
  $flag=true;  
  
} else {
  echo "Error updating record: " . $con->error;
}
}
if($flag==true){
$sql = "INSERT INTO `transfer` (`transfer_id`, `sender`, `receiver`, `amount`) VALUES (NULL, '$sender','$receiver','$amount')";
if ($con->query($sql) === TRUE) {
} else 
{
  echo "Error updating record: " . $con->error;
}
}
}
if($flag==true){
echo "<script>swal('Transfered!', 'Transaction Successfull','success').then(function() { window. location = 'viewcustomers.php'; });;</script>";
}
elseif($flag==false)
{
    echo "<script>
        $('#text2').show()
     </script>";
}
?>