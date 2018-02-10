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

	$mobile = mysqli_real_escape_string($link, $_REQUEST['mobile']);	

	$address = mysqli_real_escape_string($link, $_REQUEST['address']); 

	   

    // attempt insert query execution

    $sql = "INSERT INTO sell_register (customerName, mobile, address) VALUES ('$customerName', '$mobile','$address')";



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


