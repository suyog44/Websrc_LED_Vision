<html>
<head>
	 <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
<script src="remote.js"></script>
  <script type='text/javascript' src="scriptFile.js"></script>
<style type="text/css">

div.containar{
	min-height: 10em;
    display: table-cell;
    vertical-align: middle;
}

</style> 
</head>
<body style="overflow:hidden;width: 100%;height: 100%;">

<?php
$id = $_REQUEST['id'];
$data1=$_REQUEST['src'];
$data = explode(',',$data1);
$name1 = str_replace(" ", "%20", $data[$id-1]);
//echo $name1;
$name = str_replace("/var/www/html", "", $name1);

?>


<div class="container" style="height: 100%;  display: flex;
  align-items: center;
  justify-content: center; ">
<img id="img1" height="100%" width="auto" style="overflow: hidden;"  src=<?php echo $name; ?>  />
</div>

<script type="text/javascript">
var count=<?php echo $id-1;?>;
var dat="<?php echo $data1; ?>";
var path=dat.split(',');
var total=path.length;
debugger;
var img=document.getElementById("img1");
	document.addEventListener('keyup',function(event){
	debugger;
switch(event.keyCode){
case 8:
 giveSound();
	window.location="image.php";
break;
case 39:	
 giveSound();
		
		if((count+1)<total)
		{
			count++;			
			img.src=path[count].replace("/var/www/html", "");
		}
		


	break;
case 37:
 giveSound();
if((count-1)>=0)
{
	count--;
	img.src=path[count].replace("/var/www/html", "");
}

	break;
}
});
</script>
</body>
</html>
