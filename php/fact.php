<?php
if(isset($_POST['submit']))
{
$num = $_POST['num'];
$fact = 1;
for($i=1;$i<=$num;++$i)
{
$fact = $fact*$i;
}
echo "Factorial of $num is ".$fact;
}
?>



 <!DOCTYPE html>
 <html>
 <head>
 <title>Factorial of any number</title>
 </head>
 <body>
 <form name="factorial" action="" method="post">
 Number :<input type="text" name="num" value="" required=""><br>
 <input type="submit" value="Submit" name="submit">
 </form>
 </body>
 </html>

