<?php

$con = mysql_connect('localhost' , 'root', 'root') or die(mysql_error());
$res = mysql_select_db('mydatas', $con) or die(mysql_error());


?>