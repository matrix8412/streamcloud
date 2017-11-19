<?php
$sn = exec("cat /proc/cpuinfo | grep Serial | awk '{print $3}'");
$output_file = "/run/streamcloud_files/xml/ffmpeg.xml";

$xml_cloud = simplexml_load_file("/var/www/html/config/cloud_settings.xml");
$cloud_key = $xml_cloud->cloud_device_auth_key;


$response = exec("wget \"https://streamcloud.homepi.org/api/api.php?action=get_streams&sn=$sn&cloud_device_auth_key=$cloud_key\" -O \"$output_file\"");


?>
