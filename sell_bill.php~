
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
$fromdate = mysqli_real_escape_string($link, $_REQUEST['fromDate']);
$todate = mysqli_real_escape_string($link, $_REQUEST['toDate']);



$query = "SELECT * FROM sell_existing where ID =  (select max(ID) from sell_existing where dcdate < '$fromdate')";

$exe = mysqli_query($link, $query);

 if ($exe->num_rows > 0){
while($row = mysqli_fetch_assoc($exe))
{
  
 //echo "<h2>". $row["closed_balance"]. "</h2>";
 echo "<table><th>dcdate</th><th>nocages</th><th>dc_weight</th><th>dc_rate</th><th>dc_amount</th><th>net_weight</th><th>net_rate</th><th>net_amount</th><th>paid_amount</th><th>closed_balance</th></tr>";
    // output data of each row

echo "<th>Opening Balance </th><td></td><th></th><th></th><th></th><th></th><th></th><th></th><td></td><td>"
.$row["closed_balance"]."</td></tr>";
}
}
else 
{
 
  print "<script type=\"text/javascript\">
    alert ('Data does not exist!!!!.');
     window.location.assign('sell.html');
        </script>";
}
 echo "<h2>$companyName</h2>" ;

$sql="(SELECT * FROM sell_existing WHERE dcdate BETWEEN '$fromdate' AND '$todate')";



//$sql = "SELECT * FROM sell_existing WHERE companyName='$companyName' AND dcdate BETWEEN '$fromdate' AND '$todate'";

$result = $link->query($sql);

if ($result->num_rows > 0) {

echo "";      

echo "";



    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . date('d-m-Y',strtotime($row["dcdate"])). "</td><td>" . $row["nocages"]. "</td><td>" . $row["dc_weight"]. "</td><td>" . $row["dc_rate"]. "</td><td>" . $row["dc_amount"]. "</td><td>" . $row["net_weight"]. "</td><td>" . $row["net_rate"]. "</td><td>" . $row["net_amount"]. "</td><td>" . $row["paid_amount"]. "</td><td>" . $row["closed_balance"]. "</td></tr>";


$nocages += $row['nocages'];   
$dc_weight += $row['dc_weight']; 
$dc_amount += $row['dc_amount']; 

$net_weight += $row['net_weight'];
$net_amount += $row['net_amount'];
$paid_amount += $row['paid_amount'];
 
$closed_balance += $row['closed_balance'];
 
 }

$query = "(SELECT * FROM sell_existing WHERE ID IN (SELECT MAX(ID) FROM sell_existing) ORDER BY ID DESC)";

$exe = mysqli_query($link, $query);
 $field1 =0;
while($row = mysqli_fetch_assoc($exe))
{
  $field1 = $row['closed_balance'];
  
 //echo "<h2>$field1</h2>";
}



echo "<tr><td>TOTAL</td>

<td>" . number_format($nocages) . "</td>
<td>" . number_format($dc_weight) . "</td>
<td></td>
<td>" . number_format($dc_amount) . "</td>
<td>" . number_format($net_weight) . "</td>
<td></td>
<td>" . number_format($net_amount) . "</td>
<td>" . number_format($paid_amount) . "</td>
<td>" . number_format($field1) . "</td>

</tr>";

   echo "</table>";

} 
else 
{
 
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


