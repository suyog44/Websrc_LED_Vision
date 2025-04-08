<html>
 <head>
 <script type='text/javascript' src="scriptFile.js"></script>
                
<meta name="viewport" content="width=device-width" />
 <title>Trigger</title>

<?php
	$cpuid =(string) shell_exec("grep -Po '^Serial\s*:\s*\K[[:xdigit:]]{16}' /proc/cpuinfo");	
   $cpuid=substr($cpuid,0,strlen($cpuid)-1);
    
?>

 </head>
         <body bgColor="#000">
         <center><h1  id="msg" style="color:WHITE" ></h1></center>
         

<script>
debugger;
var key_val="00000000d10a6318";
if(key_val=='0')
{
		var id="<?php echo $cpuid;?>";
		setKeyId (id);
		window.location="Home.html";
}
else
{
<!--
	//var id="<?php echo $cpuid;?>";
	//if(id!=key_val)
	//{
	//	var j=document.getElementById("msg");
	//	j.innerHTML="ERROR CONTACT ADMINISTATOR";
	//}
	//else
-->
		window.location="Home.html";

}  
</script>

         </body>

 </html>
