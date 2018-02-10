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

	$dcnum = mysqli_real_escape_string($link, $_REQUEST['dcnum']);
	
	$vehno = mysqli_real_escape_string($link, $_REQUEST['vehicle_no']);	

	$driname = mysqli_real_escape_string($link, $_REQUEST['driver_name']); 

	$farname = mysqli_real_escape_string($link, $_REQUEST['farmer_name']);

	$faradd = mysqli_real_escape_string($link, $_REQUEST['farmer_address']);

	$nocages = mysqli_real_escape_string($link, $_REQUEST['no_cages']);

	$nobirds = mysqli_real_escape_string($link, $_REQUEST['no_birds']);

	$tweight = mysqli_real_escape_string($link, $_REQUEST['total_weight']);

	$aweight = mysqli_real_escape_string($link, $_REQUEST['avg_weight']);

	$rate = mysqli_real_escape_string($link, $_REQUEST['rate']);

	$amount = mysqli_real_escape_string($link, $_REQUEST['amount']);


     

    // attempt insert query execution

    $sql = "INSERT INTO buy_existing (companyName, dcdate, dcnum, vehicle_no, driver_name, farmer_name, farmer_address, no_cages, no_birds, total_weight, avg_weight, rate, amount) VALUES ('$companyName', '$dcdate','$dcnum','$vehno', '$driname', '$farname', '$faradd', '$nocages', '$nobirds', '$tweight', '$aweight', '$rate', '$amount')";



    if(mysqli_query($link, $sql)){

   print "<script type=\"text/javascript\">
    alert ('Record added sucessfully..!!!');
     window.location.assign('home.html');
        </script>";
        
	
    } else{

print "<script type=\"text/javascript\">
    alert ('Record Faild to insert record already exist!!!!.');
     window.location.assign('home.html');
        </script>";
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }

    
    // close connection

    mysqli_close($link);


	

    ?>


