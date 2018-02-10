
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
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
$sql = "SELECT companyName, dcdate, dcnum FROM buy_existing where companyName='$companyName'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>dcnum</th><th>companyName</th><th>dcdate</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["dcnum"]. "</td><td>" . $row["companyName"]. "</td><td>" . $row["dcdate"]. "</td></tr>";
    }
    echo "</table>";
} else {
 echo $companyName;
    echo "0 results";
}

$link->close();
?>

</body>
</html>

