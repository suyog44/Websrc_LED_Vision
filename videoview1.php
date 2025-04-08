<!DOCTYPE html>
<html>
 <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
<script src="remote.js"></script>
  <script type='text/javascript' src="scriptFile.js"></script>
  <style>
  video::-webkit-media-controls-panel {
    display: flex !important;
    opacity: 1 !important;
}
  </style>
<head>
	<title></title>
</head>
<body width="100%" height="100%" style="background-color:#333333">
<?php
$id = $_REQUEST['id'];
$data = $_REQUEST['src'];
$name = str_replace("/var/www/html", "", $data);

?>
<div style="overflow: hidden;padding-left: 10%; width: 80%;height: 100%;">
	<video   controls="true" controls autoplay id="vid" style="width: 100%;height: 100%" >
  <source src=<?php echo "'".$name."'"; ?> type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
Your browser does not support the video tag.

</video>
</div>
<script type="text/javascript">
var videlement = document.getElementById('vid');


function videoTimeUpdate(e)
{
    //set controls settings to controls,this make controls show everytime this event is triggered
    videlement.setAttribute("controls","controls");
}

//add event listener to video for timeupdate event
videlement.addEventListener('timeupdate', videoTimeUpdate, false);
var flag = true;
var vidFlag = false;
var forward_Rate=7;
var rewind_Rate=-7;
function forwardRewind(param) {

videlement.currentTime += param;
}
document.addEventListener('keyup',function(event){
	debugger;
switch(event.keyCode){
case 8:
 giveSound();
	window.location="main.php?val=<?php echo $id; ?>";
break;

case 37:
  //Rewind
   giveSound();
  forwardRewind(rewind_Rate);
  break;
case 39:
//Forward
 giveSound();
  forwardRewind(forward_Rate);
  break;
case 40:
if (document.exitFullscreen)
    document.exitFullscreen();
else if (document.webkitExitFullscreen)
    document.webkitExitFullscreen();
else if (videlement.mozCancelFullScreen)
    document.mozCancelFullScreen();
else if (document.msExitFullscreen)
    document.msExitFullscreen();
    break;
 case 38:
 giveSound();
// if(!vidFlag){
	var	elem = videlement;
if (elem.requestFullscreen) {
  elem.requestFullscreen();
} else if (elem.mozRequestFullScreen) {
  elem.mozRequestFullScreen();
} else if (elem.webkitRequestFullscreen) {
  elem.webkitRequestFullscreen();
}
// }

// else{

// }

// vidFlag =! vidFlag;
break;
case 13:
 giveSound();
 debugger;
 	if(flag){
 		videlement.pause();
 	}
else{
	videlement.play();
}
 	flag = !flag;
break;

         
}
});



</script>
</body>
</html>
