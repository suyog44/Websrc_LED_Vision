<?php
require_once('con2.php');

$query= "drop table datas";
$result = mysql_query($query , $con) or die(mysql_error());


?>