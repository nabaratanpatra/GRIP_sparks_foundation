<?php
    $con = mysqli_connect("localhost", "root", "", "bank");
    //         $con = mysqli_connect("localhost", "id17013455_bank", "Projectbank@123", "id17013455_patra");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Customers</title>
    <!-- Including the bootstrap CDN -->
    
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"> </script> 
    <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="http://anijs.github.io/lib/anicollection/anicollection.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!--Including style sheet-->
    <link rel="stylesheet" href="style.css">
    
</head>
<body style="background-color: #fff" onload="loader()">

     <!--Navbar-->
     <nav class="navbar navbar-expand-sm  navbar-toggler navbar-light" style=" background-color:#2E2E2F;"> 
            <img  src="images/llo.png" alt="logo" style="width: 150px;>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02" style="float:right;">
                <ul class="navbar-nav ml-auto" style="text-decoration: none;padding: 5px 20px;font-family: poppins, sans-serif;font-size: 16px;text-transform: uppercase; "> 
                <li class="nav-item">
                        <a class="nav-link " href="index.php" style="color:white;font-weight:1em;">
                            <span style="padding-right:20px;" >&nbsp;&nbsp;Home</span>
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
    
    <div>


    


<div class="usertable">

    <h3 class="font-weight-bold"style="text-align:center;color:#fc6e09;font-family: 'Poppins';font-size:2.2em;padding:3%;">Customers</h3>
    <table id="myTable">
          <tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Current Balance</th>
            <th>&nbsp;</th>
          </tr>
          <?php
        $sql = "SELECT * FROM `customers`";
        $result = mysqli_query($con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<form method ='post' action = 'acustomer.php'>";
            echo "<td>". $row['CustomerID'] . "</td>
            <td>". $row['Name'] . "</td>
            <td>". $row['Email'] . "</td>
            <td>". $row['CurrentBalance'] . "</td>";
           echo "<td> <a href='acustomer.php'><button type='submit' class='btn btn-default' name='user'  id='users1' value= '{$row['Name']}' >View Customer</button></a></td>";
            echo "</form>";
           echo  "</tr>";
        }
        ?>
          
    </table>
    
</div>
<br><br>
<!-- Footer -->
<div class="footer">
   <span style="font-family:verdana;">&copy;</span> 2021 Secure Bank. All rights reserved.
</div>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
setTimeout(function(){$('#loading').hide();}, 3000); 
  var preloader = document.getElementById("loading");
      function loader(){
        preloader.style.display = 'none';
      }
</script>


</html>