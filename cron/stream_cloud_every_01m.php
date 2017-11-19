<?php
exec("sudo mkdir -p /run/streamcloud_files");
exec("sudo mkdir -p /run/streamcloud_files/xml");

exec("php /opt/streamcloud/cron/scripts/get_streams.php > /dev/null 2>&1 < /dev/null &");
exec("php /opt/streamcloud/cron/scripts/stream_watchdog.php > /dev/null 2>&1 < /dev/null &");
exec("php /opt/streamcloud/cron/scripts/post_device_stats.php > /dev/null 2>&1 < /dev/null &");
exec("php /opt/streamcloud/cron/scripts/post_stream_stats.php > /dev/null 2>&1 < /dev/null &");

?>

