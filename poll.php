
<html>
<head>
   <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
<script src="remote.js"></script>
  <script type='text/javascript' src="scriptFile.js"></script>
<script>
document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'complete') {
      setTimeout(function(){
          document.getElementById('interactive');
         document.getElementById('load').style.visibility="hidden";
      },500);
  }
}
</script>
   <style>
   #load{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999;
    background:url("https://www.creditmutuel.fr/cmne/fr/banques/webservices/nswr/images/loading.gif") no-repeat center center rgba(0,0,0,0.25)
}
   html, body {
height: 100%;
margin: 0;
}

#section1 {
    height: 90%; 
text-align:center; 
    display:table;
    width:100%;
}

#section1 h1 {display:table-cell; vertical-align:middle}
</style>
</head>
<body>
<div id="load"></div>
<div class="section" id="section1">



<?php
$data= exec("sudo blkid" , $output);

$flag = 0;

$error="";
foreach ($output as $key => $value) {
	# code...
	if (strpos($value, 'TYPE="ntfs"') !== false) {
		$flag = 1;
   		$in = strpos($value, "UUID");
   		$uuidtype = substr($value, $in);
   		$uuids = explode("\"", $uuidtype);
   		$uuid = $uuids[1].trim();
   		//echo $uuid;
   		//echo "Clearing Old Datas!<br />";
   		$delcommand = "sudo rm -rf /var/www/html/project/usb/";
   		exec($delcommand);
   		//echo "Cleared!";

   		   		//echo "Creating Directory !<br />";
   		$delcommand = "sudo mkdir /var/www/html/project/usb/";
   		//exec($delcommand);
   		//echo "created!";

   		$command  = "sudo rsync -av --progress /media/pi/".$uuid."/ /var/www/html/project/usb/";
   		//echo $command;

                  $command1  = "sudo find /var/www/html/project/usb -type f -exec chmod 644 {} \;";
                  $command2  = "sudo chmod 755 -R /var/www//html/project/usb";
   		exec($command);
         exec($command1);
         exec($command2);
   		//echo "<br />";
//echo "<br />";
//echo "<center><h1>Imported Successfully</h1></center>";
//echo "<center><h4>Press Enter to View Files</h4></center>";

}

}

if(!$flag){
  echo "<h1>Unsupported USB Format</h1>";
	// echo "Unsupported Format";
}
//echo json_encode($output);
//$pid = exec("sudo rsync -av --progress /media/pi/508C01288C010A64/ /var/www/html/project/usb1/",$output);
?>
</div> 

<script type="text/javascript">

if(<?php echo $flag;?>)
{
   window.location = "imgorvideo.html";
}
document.addEventListener('keyup',function(event){
switch(event.keyCode){
case 13:
	debugger;
   giveSound();
	// window.location = "videoorimage.php";
break;
case 8:
debugger;
 giveSound();
   window.location = "settingsmain.html";
   break;

}
});
</script>
</body>
</html>
