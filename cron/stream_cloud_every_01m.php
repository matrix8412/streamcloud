<?php
exec("sudo mkdir -p /run/streamcloud_files");
exec("sudo mkdir -p /run/streamcloud_files/xml");

exec("php /opt/streamcloud/cron/scripts/get_streams.php");
exec("php /opt/streamcloud/cron/scripts/stream_watchdog.php");
exec("php /opt/streamcloud/cron/scripts/post_device_stats.php");

?>

