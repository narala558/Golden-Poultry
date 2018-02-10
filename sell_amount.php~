<?php

ini_set("display_errors", 1);
ini_set("track_errors", 1);
ini_set("html_errors", 1);
error_reporting(E_ALL);

    /* Attempt MySQL server connection. Assuming you are running MySQL

    server with default setting (user 'root' with no password) */

    $link = mysqli_connect("localhost", "root", "Ammanana", "golden");

    // Check connection

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

	$customerName = mysqli_real_escape_string($link, $_REQUEST['customerName']); 

	$dcdate = mysqli_real_escape_string($link, $_REQUEST['dcdate']);

	$paid_amount = mysqli_real_escape_string($link, $_REQUEST['paid_amount']);
	
	$cash_paid_by = mysqli_real_escape_string($link, $_REQUEST['cash_paid_by']);

	
$closed_balance = 0;




$query1 = "(select * from sell_existing where customerName= $customerName)";
$exe = mysqli_query($link, $query1);

if(!empty($customerName))
{
$cus = "'".$customerName."'";
$query = "SELECT * FROM sell_existing WHERE ID IN (SELECT MAX(ID) FROM sell_existing where customerName=".$cus." ORDER BY ID DESC)";
$exe = mysqli_query($link, $query);
 $field1 =0;
while($row = mysqli_fetch_assoc($exe))
{
  $field1 = $row['closed_balance'];
  
 //echo "<h2>$field1</h2>";
}


	$closed_balance = $field1 - $paid_amount ;
    // attempt insert query execution

$sql = "INSERT INTO sell_existing (customerName, dcdate, paid_amount, closed_balance) VALUES ('$customerName','$dcdate','$paid_amount', $closed_balance)";

}

else 

{

$sql = "INSERT INTO sell_existing (customerName, dcdate, paid_amount, closed_balance) VALUES ('$customerName','$dcdate','$paid_amount', $closed_balance)";

}

//echo "'$companyName', '$dcdate','$pamount'";

    if(mysqli_query($link, $sql)){

   print "<script type=\"text/javascript\">
    alert ('Record added sucessfully..!!!');
     window.location.assign('sell.html');
        </script>";
        
	
    } else{

print "<script type=\"text/javascript\">
    alert ('Record Faild to insert record already exist!!!!.');
     window.location.assign('sell.html');
        </script>";
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }

    
    // close connection

    mysqli_close($link);

    ?>


