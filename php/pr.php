<?php
if(isset($_POST['SUBMIT']))
{
$check=0;
$num=$_POST['num'];
for($i=2;$i<=(num/2);i++)
{
if($num==$i)
{
$check++;
if($check==1)
{
break;
}
}
}
if($check==0)
{
echo "It is a Prime Number"
}
else
{
echo " It is not a prime Number"
}
}
?>
