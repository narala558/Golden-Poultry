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

     
/*
    // Escape user inputs for security

    $first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);

    $last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);

    $email = mysqli_real_escape_string($link, $_REQUEST['email']);
 

    // attempt insert query execution

    $sql = "INSERT INTO demo (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";

*/

    $companyName = mysqli_real_escape_string($link, $_REQUEST['companyName']); 

    $eMail = mysqli_real_escape_string($link, $_REQUEST['eMail']);

  $mobileNum = mysqli_real_escape_string($link, $_REQUEST['mobileNum']);

    $altMobNum = mysqli_real_escape_string($link, $_REQUEST['altMobNum']); 

    $address = mysqli_real_escape_string($link, $_REQUEST['address']);
     

    // attempt insert query execution

    $sql = "INSERT INTO buy_register (companyName, eMail, mobileNum, altMobNum, address) VALUES ('$companyName', '$eMail','$mobileNum','$altMobNum', '$address')";



    if(mysqli_query($link, $sql)){

    print "<script type=\"text/javascript\">
    alert ('Record Added Successfully.');
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


