<html>
 <head>
<meta name="viewport" content="width=device-width" />
 <title>Trigger</title>
 </head>
         <body>
         
         <?php
         $cpuid = shell_exec("grep -Po '^Serial\s*:\s*\K[[:xdigit:]]{16}' /proc/cpuinfo");
        echo $cpuid;
 return $cpuid;
         ?>
         </body>
 </html>
