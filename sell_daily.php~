
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
$customerName = mysqli_real_escape_string($link, $_REQUEST['customerName']); 
$dcdate = mysqli_real_escape_string($link, $_REQUEST['dcdate']);

$sql = "SELECT customerName, dcnum, dcdate, nocages, dc_weight, dc_rate, dc_amount, net_weight, net_rate, net_amount  FROM sell_existing WHERE (customerName='$customerName' AND dcdate='$dcdate') OR dcdate='$dcdate'";
$result = $link->query($sql);


if(!empty($customerName)) {


$sql="(SELECT customerName, dcnum, dcdate, nocages, dc_weight, dc_rate, dc_amount, net_weight, net_rate, net_amount  FROM sell_existing WHERE customerName ='$customerName' AND dcdate='$dcdate')";

}
else{
$sql="(SELECT customerName, dcnum, dcdate, nocages, dc_weight, dc_rate, dc_amount, net_weight, net_rate, net_amount  FROM sell_existing WHERE dcdate='$dcdate')";
}

//echo "<h2 >$customerName </h2>";

if ($result->num_rows > 0) {
    echo "<table><tr><th>dcdate</th><th>dcnum</th><th>nocages</th><th>dc_weight</th><th>dc_rate</th><th>dc_amount</th><th>net_weight</th><th>net_rate</th><th>net_amount</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . date('d-m-Y',strtotime($row["dcdate"])). "</td><td>" . $row["dcnum"]. "</td><td>" . $row["nocages"]. "</td><td>" . $row["dc_weight"]. "</td><td>" . $row["dc_rate"]. "</td><td>" . $row["dc_amount"]. "</td><td>" . $row["net_weight"]. "</td><td>" . $row["net_rate"]. "</td><td>" . $row["net_amount"]. "</td><td>" . $row["paid_amount"]. "</td></tr>";


$nocages += $row['nocages'];   
$dc_weight += $row['dc_weight']; 
$dc_amount += $row['dc_amount']; 
$net_weight += $row['net_weight'];
$net_amount += $row['net_amount'];
 
 }
echo "<tr><td>TOTAL</td><td></td>
<td>" . number_format($nocages) . "</td>
<td>" . number_format($dc_weight) . "</td>
<td></td>
<td>" . number_format($dc_amount) . "</td>
<td>" . number_format($net_weight) . "</td>
<td></td>
<
<td>" . number_format($net_amount) . "</td>

</tr>";


    
    echo "</table>";
} else {
 
   print "<script type=\"text/javascript\">
    alert ('User Does not found!!!!.');
     window.location.assign('sell.html');
        </script>";
}

$link->close();
?>
<h4 align="right" >
<br> </br>


<input type=button class="btn btn-sucess" onClick="parent.location='sell.html'" value='sell'style="margin-left: 596px;">

<button  class="btn btn-danger" onclick="myFunction()">Print this page</button>
</h4>
<script>
function myFunction() {
    window.print();
}
</body>
</html>

