<?php
$xml_cloud = simplexml_load_file("/var/www/html/config/cloud_settings.xml");
$cloud_key = $xml_cloud->cloud_device_auth_key;

$hardware = exec("cat /proc/cpuinfo | grep Hardware | awk '{print $3}'");
$revision = exec("cat /proc/cpuinfo | grep Revision | awk '{print $3}'");
$sn = exec("cat /proc/cpuinfo | grep Serial | awk '{print $3}'");

$aaa = exec("curl -s https://streamcloud.homepi.org/api/api.php --data \"action=device_discovery_rpi&hardware=$hardware&revision=$revision&sn=$sn&cloud_device_auth_key=$cloud_key\"");

?>
