
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



$query = "SELECT * FROM buy_existing where ID =  (select max(ID) from buy_existing where companyName='$companyName' AND dcdate < '$fromdate' )";

$exe = mysqli_query($link, $query);

 if ($exe->num_rows > 0){
while($row = mysqli_fetch_assoc($exe))
{
  
 //echo "<h2>". $row["closed_balance"]. "</h2>";
 echo "<table><th>dcdate</th><th>dcnum</th><th>no_cages</th><th>no_birds</th><th>total_weight</th><th>rate</th><th>amount</th><th>paid_amount</th><th>closed_balance</th></tr>";
    // output data of each row 

  echo "<th>Opening Balance </th><td></td><th></th><th></th><th></th><th></th><th></th><td></td><td>"
.$row["closed_balance"]."</td></tr>";
}
}
else 
{
 
  print "<script type=\"text/javascript\">
    alert ('Data does not exist!!!!.');
     window.location.assign('buy.html');
        </script>";
}

echo "<h2 >$companyName </h2>";


$sql = "SELECT * FROM buy_existing WHERE companyName='$companyName' AND dcdate BETWEEN '$fromdate' AND '$todate'";

$result = $link->query($sql);

if ($result->num_rows > 0) {

echo "";      

echo "";



    while($row = $result->fetch_assoc()) {

        echo "<tr><td>" . date('d-m-Y',strtotime($row["dcdate"])). "</td><td>" . $row["dcnum"]. "</td><td>" . $row["no_cages"]. "</td><td>" . $row["no_birds"]. "</td><td>" . $row["total_weight"]. "</td><td>" . $row["rate"]. "</td><td>" . $row["amount"]. "</td><td>" . $row["paid_amount"]. "</td><td>" . $row["closed_balance"]. "</td></tr>";


$no_cages += $row['no_cages'];   
$no_birds += $row['no_birds']; 
$total_weight += $row['total_weight']; 
$amount += $row['amount'];
$paid_amount += $row['paid_amount']; 
$closed_balance += $row['closed_balance'];
 
 }

$query = "(SELECT * FROM buy_existing WHERE ID IN (SELECT MAX(ID) FROM buy_existing) ORDER BY ID DESC)";

$exe = mysqli_query($link, $query);
 $field1 =0;
while($row = mysqli_fetch_assoc($exe))
{
  $field1 = $row['closed_balance'];
  
 //echo "<h2>$field1</h2>";
}



echo "<tr><td>TOTAL</td><td></td>
<td>" . number_format($no_cages) . "</td>
<td>" . number_format($no_birds) . "</td>
<td>" . number_format($total_weight) . "</td>
<td></td>
<td>" . number_format($amount) . "</td>
<td>" . number_format($paid_amount) . "</td>
<td>" . number_format($field1) . "</td>

</tr>";

   echo "</table>";

} 
else 
{
 
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


