<?php
if(isset($_POST['submit']))
{
$year=$_POST['year'];
if($year%4==0)
{
echo "It is a leap year";
}
else
{
echo "it is not a leap year";
}
}
?>



 <!DOCTYPE html>
 <html>
 <head>
 <title>Leap year</title>
 </head>
 <body>
 <form name="leapyear" action="" method="post">
 Year :<input type="text" name="year" value="" required=""><br /><br />
 <input type="submit" value="Submit" name="submit">
 </form>
 </body>
 </html>
