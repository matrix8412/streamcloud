<?php
$sn = exec("cat /proc/cpuinfo | grep Serial | awk '{print $3}'");
$output_file = "/run/streamcloud_files/xml/ffmpeg.xml";
$xml_cloud = simplexml_load_file("/var/www/html/config/cloud_settings.xml");
$cloud_key = $xml_cloud->cloud_device_auth_key;

$xml_stream = simplexml_load_file("/run/streamcloud_files/xml/ffmpeg.xml");
$stream_id = $xml_stream->stream->stream_id;

$stream_status = exec("ps aux |grep ffmpeg |grep -v grep | wc -l");
if($stream_status > "0"){$stream_status = "on";}else{$stream_status = "off";}

$aaa = exec("curl -s https://streamcloud.homepi.org/api/api.php --data \"action=stream_stats_rpi&sn=$sn&cloud_key=$cloud_key&stream_id=$stream_id&stream_status=$stream_status\"");
?>
