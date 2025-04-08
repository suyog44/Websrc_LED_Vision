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
<body style="background-color:black">

<?php
$flagg=0;
error_reporting(0);
ini_set('display_errors', 0);


function listFolderFiles($dir){

	$ffs = scandir($dir);
    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
    if (count($ffs) < 1)
        return;

chdir($dir);
foreach (glob("*.jpg") as $filename) {
    // echo "$filename - Size: " . filesize($filename) . "\n";
    $GLOBALS['videos'][$GLOBALS['x']++] = $dir.'/'.$filename;
        $GLOBALS['names'][$GLOBALS['y']++] = $filename;
    $GLOBALS['sizes'][$GLOBALS['z']++] = filesize($filename);

}

foreach (glob("*.png") as $filename) {
    // echo "$filename - Size: " . filesize($filename) . "\n";
    $GLOBALS['videos'][$GLOBALS['x']++] = $dir.'/'.$filename;
        $GLOBALS['names'][$GLOBALS['y']++] = $filename;
    $GLOBALS['sizes'][$GLOBALS['z']++] = filesize($filename);
}

    foreach($ffs as $ff){
        if(is_dir($dir.'/'.$ff)) {

            listFolderFiles($dir.'/'.$ff);
        }
    }
}


$GLOBALS['x'] = 0;
$GLOBALS['z'] = 0;
$GLOBALS['y'] = 0;
$GLOBALS['videos'] = array();
$GLOBALS['names'] = array();
$GLOBALS['sizes'] = array();
listFolderFiles('/var/www/html/project/usb');
$idd = 0;
$valueTo = 0;
if(isset($_REQUEST['val'])){
	$idd = 1;
	$valueTo = $_REQUEST['val'];
}
$i = 0;
foreach($GLOBALS['videos'] as $video){
    $str  = explode("/", $video);
    $GLOBALS['dis'][$i] = $str[sizeof($str)-1];
    //echo $GLOBALS['dis'][$i];
   // echo $GLOBALS['videos'][$i];
$i++;
}
$i = 0;
foreach($GLOBALS['videos'] as $video){
  $flagg=1;
	$GLOBALS['fvideos'][$i] = str_replace(" ", "%20", $video);
   // echo $GLOBALS['videos'][$i];
$i++;
}

?>


<?php 
$i=1;
if($flagg!=0)
{
  foreach($GLOBALS['fvideos'] as $video){

$test = str_replace("%20"," ",  $video);
?>
<div id="<?php echo $i; ?>" style="height: 100px;display: flex; flex-direction: row;background: steelblue; margin-bottom: 5px;margin-top: 5px; ">
<img src="photos.png" style="margin-top: 15px;margin-left: 15px;" width="70" height="70" >
<font style=" color: white; margin-top: 40px; margin-left: 35px; width: 200px;"><?php echo $GLOBALS['dis'][$i-1]; ?></font>
<font style="float: right; color: white; margin-top: 40px;margin-left: 350px; width: 200px;" ><?php echo (int)($GLOBALS['sizes'][$i-1]/1024) ?>  KB</font>
</div>

<?php
  //echo "<td><a href='videoview.php?id=".$i."&src=".$video."' id='a".$i."' tabindex=".$i." ><h4>".$test." </h4></a></td>";

$i++;
}
}

?>

<script>
debugger;
var flaggg="<?php echo $flagg; ?>";
if(flaggg=="0")
{
  window.location="imgorvideo.html";
}
var ele = document.getElementById('1');
//ele.style.background = "cadetblue";
var idtofocus = <?php echo $idd; ?>;
var idd = <?php echo $valueTo; ?>;
var total = <?php echo $GLOBALS['x']; ?>;
var count = 1;
var datas = <?php echo json_encode($GLOBALS['fvideos']); ?>;

if(idtofocus != 0){
	document.getElementById(''+idd).style.background = "cadetblue";
	document.getElementById('1').style.background = "steelblue";
	count = idd;
}
window.onload = function () {
document.addEventListener('keyup',function(event){
switch(event.keyCode){
case 13:
  debugger;
     giveSound();
  window.location = "imageview.php?id="+count+"&src="+datas;
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
  };


debugger;


</script>

</body>
</html>
