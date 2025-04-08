
<?php
$data = $_GET["data"];
if($data == "1"){
$setmode23 = shell_exec("/usr/local/bin/gpio -g mode 23 out");
             $gpio_off = shell_exec("/usr/local/bin/gpio -g write 23 1");
                 usleep (1000 * 50);
                 $gpio_on = shell_exec("/usr/local/bin/gpio -g write 23 0");

}
?>
  
