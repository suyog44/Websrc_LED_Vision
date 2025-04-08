<html>
 <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
<script src="remote.js"></script>
  <script type='text/javascript' src="scriptFile.js"></script>
<body style="background-color:black">

<center>
<img src="photos.png" id="a" style="background: cadetblue;padding: 30px;" width="200" height="200" >

<img src="vidimage.jpg" id="b" style="background: white;padding: 30px;" width="200" height="200" >

</center>
</div>

</body>

<script type="text/javascript">
	
var count = 1;
document.addEventListener('keyup',function(event){
switch(event.keyCode){

case 37:
	debugger;
	 giveSound();
	count = 1;
	document.getElementById('a').style.background = "cadetblue";
	document.getElementById('b').style.background = "white";
break;

case 39:
	debugger;
	 giveSound();
	count = 2;
	document.getElementById('b').style.background = "cadetblue";
	document.getElementById('a').style.background = "white";
break;

case 13:
 giveSound();
if(count == 1)
	window.location = "image.php";
else
	window.location = "main.php";
break;
case 8:
 giveSound();
	window.location = "settingsmain.html";
break;
}
});

</script>

</html>
