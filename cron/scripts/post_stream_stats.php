<?php
$hardware = exec("cat /proc/cpuinfo | grep Hardware | awk '{print $3}'");
$revision = exec("cat /proc/cpuinfo | grep Revision | awk '{print $3}'");
$sn = exec("cat /proc/cpuinfo | grep Serial | awk '{print $3}'");
$cpuTemp0 = exec("cat /sys/class/thermal/thermal_zone0/temp");
$cpuTemp1 = $cpuTemp0/1000;
$cpuTemp2 = $cpuTemp0/100;
$cpuTempM = $cpuTemp2 % $cpuTemp1;
$cpuTemp = $cpuTemp1.$cpuTempM;
$gpuTemp0 = exec("/opt/vc/bin/vcgencmd measure_temp");
$gpuTemp1 = str_replace("temp=", "", $gpuTemp0);
$gpuTemp = str_replace("'C", "", $gpuTemp1);
$load_average = explode(" ", exec("cat /proc/loadavg"));
$load_average1 = $load_average[0];
$load_average5 = $load_average[1];
$load_average15 = $load_average[2];
$uptime = explode(" ", exec("cat /proc/uptime"));
$uptime = $uptime[0];
$dir_net = "/sys/class/net";
$dirs = array_diff(scandir($dir_net), array('..', '.'));
$net_ifaces = "";
foreach($dirs as $dir){
    $net_ifaces .= $dir." ";
    $tx_bytes = exec("cat /sys/class/net/$dir/statistics/tx_bytes");
    $rx_bytes = exec("cat /sys/class/net/$dir/statistics/rx_bytes");
    $link_speed = exec("cat /sys/class/net/$dir/speed");
    exec("curl -s https://streamcloud.homepi.org/api/api.php --data \"action=device_network_activity&sn=$sn&net_interface=$dir&tx_bytes=$tx_bytes&rx_bytes=$rx_bytes&link_speed=$link_speed\"");
}
$aaa = exec("curl -s https://streamcloud.homepi.org/api/api.php --data \"action=device_keepalive_rpi&hardware=$hardware&revision=$revision&sn=$sn&cpuTemp=$cpuTemp&gpuTemp=$gpuTemp&loadavg1=$load_average1&loadavg5=$load_average5&loadavg15=$load_average15&sysuptime=$uptime&net_ifaces=$net_ifaces\"");
?>
