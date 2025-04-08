<html>
<head>
     <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
<script src="remote.js"></script>
  <script type='text/javascript' src="scriptFile.js"></script>
<style type="text/css">

a:focus{
color:red;
background-color:red;
}
</style>
<title>Page Title</title>
</head>
<body style="background: grey;">
<?php
$flag=0;
$GLOBALS['videos'] = array();
 $GLOBALS['names'] = array();
 $GLOBALS['sizes'] = array();

// error_reporting(0);
// ini_set('display_errors', 0);

 error_reporting(E_ALL);
ini_set('display_errors', 1);


 function listFolderFiles($dir){

 	$ffs = scandir($dir);
     unset($ffs[array_search('.', $ffs, true)]);
     unset($ffs[array_search('..', $ffs, true)]);

   // prevent empty ordered elements

     if (count($ffs) < 1)
         return;
//echo "entering dir".$dir;
 chdir($dir);
foreach (glob("*.mp4") as $filename) {
     // echo "$filename - Size: " . filesize($filename) . "\n";
    $GLOBALS['videos'][$GLOBALS['x']++] = $dir.'/'.$filename;
     $GLOBALS['names'][$GLOBALS['y']++] = $filename;
     $GLOBALS['sizes'][$GLOBALS['z']++] = filesize($filename);
 }


    foreach($ffs as $ff){
        if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);

    }
}

//$vid = glob("*.mp4");
//echo count($vid);
// foreach (glob("*.mp4") as $filename) {
//    // echo "$filename - Size: " . filesize($filename) . "\n";
// }
$GLOBALS['x'] = 0;
$GLOBALS['y'] = 0;
$GLOBALS['z'] = 0;

listFolderFiles('/var/www/html/project/usb/');
//$GLOBALS['x'];
$idd = 0;
$valueTo = 0;
if(isset($_REQUEST['val'])){
	$idd = 1;
	$valueTo = $_REQUEST['val'];
}
$i=0;
foreach($GLOBALS['videos'] as $video){
    $str  = explode("/", $video);
    $GLOBALS['dis'][$i] = $str[sizeof($str)-1];
    //echo $GLOBALS['dis'][$i];
   // echo $GLOBALS['videos'][$i];
$i++;
}
$i = 0;

foreach($GLOBALS['videos'] as $video){
 $flag=1;
	$GLOBALS['finalvideos'][$i] = str_replace(" ", "%20", $video);
$i++;
}


?>



<?php 
$i=1;

if($flag)
{
  foreach($GLOBALS['finalvideos'] as $video){

$test = str_replace("%20"," ",  $video);
?>
<div id="<?php echo $i; ?>" style="height: 100px;display: flex; flex-direction: row;background: steelblue; margin-bottom: 5px;margin-top: 5px; ">
<img src="vidimage.jpg" style="margin-top: 15px;margin-left: 15px;" width="70" height="70" >
<font style=" color: white; margin-top: 40px; margin-left: 35px; width: 200px;"><?php echo $GLOBALS['dis'][$i-1]; ?></font>
<font style="float: right; color: white; margin-top: 40px;margin-left: 350px; width: 200px;" ><?php echo (int)(((int)($GLOBALS['sizes'][$i-1]/1024))/1024) ?>  MB</font>
</div>

<?php
  //echo "<td><a href='videoview.php?id=".$i."&src=".$video."' id='a".$i."' tabindex=".$i." ><h4>".$test." </h4></a></td>";

$i++;
}
}

?>


<script>
debugger;
var fflag="<?php echo $flag; ?>";

if(fflag=="0")
{
  
  debugger;
  window.location="imgorvideo.html";
}
else
{
  var datas = <?php if($flag) {echo json_encode($GLOBALS['finalvideos']); } else{ echo "d";} ?> ;
}

var ele = document.getElementById('1');
ele.style.background = "cadetblue";
var idtofocus = <?php echo $idd; ?>;
var idd = <?php echo $valueTo; ?>;
var total = <?php echo $GLOBALS['x']; ?>;
var count = 1;

if(idtofocus != 0){
	document.getElementById(''+idd).style.background = "cadetblue";
	document.getElementById('1').style.background = "steelblue";
	count = idd;
}

document.addEventListener('keyup',function(event){
switch(event.keyCode){

case 13:
    debugger;
     giveSound();
     
	window.location = "videoview.php?id="+count+"&src="+datas[count-1];
break;

case 8:
 giveSound();
	window.location = "imgorvideo.html";
break;

 case 38:
  giveSound();
debugger;
	if(count == 1)
return;
document.getElementById(''+(count)).style.background = "steelblue";
	document.getElementById(''+(--count)).style.background = "cadetblue";

break;
case 40:
 giveSound();
debugger;
if(count == total)
return;
	document.getElementById(''+(count)).style.background = "steelblue";
	document.getElementById(''+(++count)).style.background = "cadetblue";

break;
         
}
});

debugger;


</script>


</body>
</html>
