 <html>
 <head>
 <meta name="viewport" content="width=device-width" />
 <title>HDMI Control</title>
 </head>
         <body>
         HDMI Control:
         <form method="get" action="hdmi.php">
                 <input type="submit" value="ON" name="on">
                 <input type="submit" value="OFF" name="off">
         </form>
         <?php
        
         if(isset($_GET['on'])){
                 $gpio_off = shell_exec("sudo vcgencmd display_power 1");
                 echo "Display On";

         }
         else if(isset($_GET['off'])){
                 $gpio_off = shell_exec("sudo vcgencmd display_power 0");
                 echo "Display Off";
         }
         ?>
         </body>
 </html>
