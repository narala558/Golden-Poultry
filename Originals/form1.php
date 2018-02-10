<?php

$connection = mysql_connect('XXXXX','XXXXXXX','XXXXXXX') or die ("Couldn't connect to server."); 
$db = mysql_select_db('XXXXXXXX', $connection) or die ("Couldn't select database."); 

$search=$_POST['search'];

$data = 'SELECT * FROM `table_name` WHERE `ID` = "'.$search.'"';
  $query = mysql_query($data) or die("Couldn't execute query. ". mysql_error());
  $data2 = mysql_fetch_array($query);
  
  
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
      <title></title>
 </head>

<body>

<!-- form to display record from database -->
<form name="form" method="POST" action="form2.php">
  Name: <input type="text" name="namefield" value="<?php echo $data2[name]?>"/> <br>
  age: <input type="text" name="agefield" value="<?php echo $data2[age]?>"/> <br>
  hobby: <input type="text" name="hobbyfield" value="<?php echo $data2[hobby]?>"/><br><br>
    <input type="hidden" name="keyfield" value="<?php echo $search?>">  
  <input type="submit"  value="submit">
</form>

</body>

</html>
