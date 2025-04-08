<html>
 <head>
<meta name="viewport" content="width=device-width" />
 <title>Trigger</title>
<?php
         $cpuid = shell_exec("grep -Po '^Serial\s*:\s*\K[[:xdigit:]]{16}' /proc/cpuinfo");
       
 
         ?>
<script>
var id='<?php echo $cpuid.toString();?>';

</script>
 </head>
         <body>
         
         
         </body>
 </html>
