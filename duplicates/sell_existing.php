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

	$nocages = mysqli_real_escape_string($link, $_REQUEST['nocages']);

	$DCweight = mysqli_real_escape_string($link, $_REQUEST['DCweight']);
	
	$DCrate = mysqli_real_escape_string($link, $_REQUEST['DCrate']);	

	$DCamount = mysqli_real_escape_string($link, $_REQUEST['DCamount']); 

	$Netweight = mysqli_real_escape_string($link, $_REQUEST['Netweight']);

	$Netrate = mysqli_real_escape_string($link, $_REQUEST['Netrate']);

	$Netamount = mysqli_real_escape_string($link, $_REQUEST['Netamount']);

	    

    // attempt insert query execution

    $sql = "INSERT INTO sell_existing (customerName, dcdate, nocages, DCweight, DCrate, DCamount, Netweight, Netrate, Netamount) VALUES ('$customerName', '$dcdate','$nocages','$DCweight', '$DCrate', '$DCamount', '$Netweight', '$Netrate', '$Netamount')";



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


