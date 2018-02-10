
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
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT companyName, dcdate, dcnum FROM buy_existing where companyName='vasanth'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>dcnum</th><th>companyName</th><th>dcdate</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["dcnum"]. "</td><td>" . $row["companyName"]. "</td><td>" . $row["dcdate"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>

