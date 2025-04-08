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
echo $flag;
// if(!$flag){
//   echo "<h1>Unsupported USB Format</h1>";
// 	// echo "Unsupported Format";
// }
//echo json_encode($output);
//$pid = exec("sudo rsync -av --progress /media/pi/508C01288C010A64/ /var/www/html/project/usb1/",$output);
?>