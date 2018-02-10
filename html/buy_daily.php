
<!DOCTYPE html>
<html>
<head>
<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "Ammanana";
$dbname = "golden";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
$companyName = mysqli_real_escape_string($link, $_REQUEST['companyName']); 
$dcdate = mysqli_real_escape_string($link, $_REQUEST['dcdate']);


$sql = "SELECT companyName, dcdate, dcnum, vehicle_no, driver_name, farmer_name, farmer_address, no_cages, no_birds, total_weight, rate, amount  FROM buy_existing WHERE (companyName='$companyName' AND dcdate='$dcdate') OR dcdate='$dcdate'";


//$sql = "SELECT companyName, dcdate, dcnum, no_cages, no_birds, total_weight, rate, amount, paid_amount FROM buy_existing WHERE (companyName='$companyName' AND dcdate='$dcdate') OR (dcdate='$dcdate')";




//$sql = "SELECT companyName, dcdate, dcnum, sum(no_cages) as no_cages, sum(no_birds) as no_birds, sum(total_weight) as total_weight, rate, sum(amount) as amount FROM buy_existing WHERE (companyName='$companyName' AND dcdate='$dcdate') OR (dcdate='$dcdate') group by dcnum with rollup";




$result = $link->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>companyName</th><th>dcnum</th><th>dcdate</th><th>no_cages</th><th>no_birds</th><th>total_weight</th><th>rate</th><th>amount</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["companyName"]. "</td><td>" . date('d-m-Y',strtotime($row["dcdate"])). "</td><td>" . $row["dcnum"]. "</td><td>" . $row["no_cages"]. "</td><td>" . $row["no_birds"]. "</td><td>" . $row["total_weight"]. "</td><td>" . $row["rate"]. "</td><td>" . $row["amount"]. "</td></tr>";


$no_cages += $row['no_cages'];   
$no_birds += $row['no_birds']; 
$total_weight += $row['total_weight']; 
$amount += $row['amount'];

 
 }
echo "<tr><td>TOTAL</td><td></td><td></td>
<td>" . number_format($no_cages) . "</td>
<td>" . number_format($no_birds) . "</td>
<td>" . number_format($total_weight) . "</td>
<td></td>
<td>" . number_format($amount) . "</td>
d>

</tr>";
echo "</table>";
} else {
 
   print "<script type=\"text/javascript\">
    alert ('User Does not found!!!!.');
     window.location.assign('buy.html');
        </script>";
}

$link->close();
?>
<h4 align="right" >
<br> </br>


<input type=button class="btn btn-sucess" onClick="parent.location='buy.html'" value='buy'style="margin-left: 596px;">

<button  class="btn btn-danger" onclick="myFunction()">Print this page</button>
</h4>
<script>
function myFunction() {
    window.print();
}

</body>
</html>

