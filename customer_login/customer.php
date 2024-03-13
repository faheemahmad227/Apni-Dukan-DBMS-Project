<?php

include('session.php');
$res = $_SESSION["favanimal"];
$c_mobile= $res;
if(!isset($_SESSION['login_user'])){
header("location: index.php"); // Redirecting To Home Page
}
?> 
 
<!DOCTYPE html>
<html>
<head>
 <title>Customer</title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</head>
<body>
<?php include('navbar.php');?>
    <br>
 <div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center" > Invoice History </h1>
 <br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
<th>Invoice ID</th>
<th>Grand Total</th>
<th>Employee Name</th>
<th>Date/Time</th>
     <th>View Invoice</th>

 </tr >

 <?php
    
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'store');   
$q = "CALL `showInvoice_to_customer`($c_mobile)";

 $query = mysqli_query($con,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['invoice_id'];  ?> </td>
 <td> <?php echo $res['total_after_tax'];  ?> </td>
 <td> <?php echo $res['name'];  ?> </td>
     <td> <?php echo $res['invoice_date'];  ?> </td>    
     <td> <button class="btn-primary btn"> <a href="print_invoice.php?invoice_id=<?php echo $res['invoice_id']; ?>" class="text-white"> Click Here </a>  </button> </td>

 </tr>

 <?php 
 }
  ?>
 
 </table>  

 </div>
 </div>

 <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
 </script
</body>
</html>