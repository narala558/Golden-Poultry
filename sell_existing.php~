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

	$dcnum = mysqli_real_escape_string($link, $_REQUEST['dcnum']);

	$nocages = mysqli_real_escape_string($link, $_REQUEST['nocages']);

 

	

if(mysqli_real_escape_string($link, $_REQUEST['dc_weight'])==''){
    $dc_weight="null";

	
}else{
    $dc_weight = mysqli_real_escape_string($link, $_REQUEST['dc_weight']);
}
if(mysqli_real_escape_string($link, $_REQUEST['dc_rate'])==''){
    $dc_rate="null";

	
}else{
    $dc_rate = mysqli_real_escape_string($link, $_REQUEST['dc_rate']);
}

$dc_amount = $dc_weight * $dc_rate;

if(mysqli_real_escape_string($link, $_REQUEST['net_weight'])==''){
    $net_weight="null";

	
}else{
    $net_weight = mysqli_real_escape_string($link, $_REQUEST['net_weight']);
}
if(mysqli_real_escape_string($link, $_REQUEST['net_rate'])==''){
    $net_rate="null";

	
}else{
    $net_rate = mysqli_real_escape_string($link, $_REQUEST['net_rate']);
}
	
$net_amount = $net_weight * $net_rate;

$closed_balance=0;	

//ikkada data base nunchi select chesukunthadi existing customer unnada leda ani  

$query1 = "select * from sell_existing where customerName= $customerName";
$exe = mysqli_query($link, $query1);

//okavela customername unthe idi exexute avutadi leka pothe closed balance intial ga 0 print avutadi pyna

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


if(!empty($dc_amount)) {
$closed_balance= $dc_amount + $field1;
}
else
{
$closed_balance= $net_amount + $field1;
}	    

    // attempt insert query execution
//	if(isset($dc_weight) && isset($dc_rate ) && isset($dc_amount))
//{
//	$sql = "INSERT INTO sell_existing (customerName, dcdate, dcnum, nocages, dc_weight, dc_rate, dc_amount,  closed_balance) VALUES ('$customerName', '$dcdate','$dcnum', '$nocages','$dc_weight', '$dc_rate', '$dc_amount', '$closed_balance')";

	
//	}
//else if(isset($net_weight ) && isset($net_rate ) && isset($net_amount))
//	{
//	$sql = "INSERT INTO sell_existing (customerName, dcdate, dcnum, nocages, net_weight, net_rate, net_amount, closed_balance) VALUES ('$customerName', '$dcdate', '$dcnum', '$nocages', '$net_weight', '$net_rate', '$net_amount', '$closed_balance')";
	}


//else 

//{

$sql = "INSERT INTO sell_existing (customerName, dcdate, dcnum, nocages, dc_weight, dc_rate, dc_amount, net_weight, net_rate, net_amount, closed_balance) VALUES ('$customerName', '$dcdate','$dcnum', '$nocages','$dc_weight', '$dc_rate', '$dc_amount', '$net_weight', '$net_rate', '$net_amount', '$closed_balance')";
//echo $sql;die();
//}



    if(mysqli_query($link, $sql)){

   print "<script type=\"text/javascript\">
    alert ('Record added sucessfully..!!!');
     window.location.assign('sell.html');
        </script>";
        
	
    } else{

print "<script type=\"text/javascript\">
    alert ('Record Faild to insert USER doesnot exist!!!!.');
     window.location.assign('sell.html');
        </script>"; 

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }

    
    // close connection

    mysqli_close($link);

    ?>


