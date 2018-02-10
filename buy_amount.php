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

	$companyName = mysqli_real_escape_string($link, $_REQUEST['companyName']); 

	$dcdate = mysqli_real_escape_string($link, $_REQUEST['dcdate']);
	
	//$dcdate = date('Y-m-d H:i:s');

	$paid_amount = mysqli_real_escape_string($link, $_REQUEST['paid_amount']);
	
	$closed_balance = 0;




$query1 = "(select * from buy_existing where companyName= $companyName)";
$exe = mysqli_query($link, $query1);

if(!empty($companyName))
{
$cmp = "'".$companyName."'";
$query = "SELECT * FROM buy_existing WHERE ID IN (SELECT MAX(ID) FROM buy_existing where companyName=".$cmp." ORDER BY ID DESC)";
//echo $query."<br>";
$exe = mysqli_query($link, $query);
 $field1 =0;
while($row = mysqli_fetch_assoc($exe))
{
  $field1 = $row['closed_balance'];
  
 echo "<h2>$field1</h2>";
}



$closed_balance = $field1 - $paid_amount;


$sql = "INSERT INTO buy_existing (companyName, dcdate, paid_amount, closed_balance) VALUES ('$companyName','$dcdate','$paid_amount', '$closed_balance')";

}

else 

{

$sql = "INSERT INTO buy_existing (companyName, dcdate, paid_amount, closed_balance) VALUES ('$companyName','$dcdate','$paid_amount', '$closed_balance')";
}

//echo $sql;


    if(mysqli_query($link, $sql)){

   print "<script type=\"text/javascript\">
    alert ('Record added sucessfully..!!!');
     window.location.assign('buy.html');
        </script>";
        
	
    } else{

print "<script type=\"text/javascript\">
    alert ('Record Faild to insert record already exist!!!!.');
     window.location.assign('buy.html');
        </script>";
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }

    
    // close connection

    mysqli_close($link);

    ?>






  

