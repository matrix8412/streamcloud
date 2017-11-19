<?php

echo "<table id=\"menu\"> \n";
echo "  <tr> \n";
echo "    <td><a onclick=\"window.open('index.php','_self');\">Status</a></td> \n";
echo "    <td><a onclick=\"window.open('index.php?action=cloud','_self');\"";if($action=="cloud"){echo " id=\"active\"";}echo ">Cloud</a></td> \n";
echo "    <td><a onclick=\"window.open('index.php?action=settings','_self');\"";if($action=="settings"){echo " id=\"active\"";}echo ">Settings</a></td> \n";
echo "    <td><a onclick=\"window.open('index.php?action=account','_self');\"";if($action=="account"){echo " id=\"active\"";}echo ">Your Account</a></td> \n";

#echo "    <td><a onclick=\"window.open('index.php?action=streaming','_self');\"";if($action=="streaming"){echo " id=\"active\"";}echo ">Streaming</a></td> \n";
#echo "    <td><a onclick=\"window.open('index.php?action=video_profiles','_self');\"";if($action=="video_profiles"){echo " id=\"active\"";}echo ">Video profiles</a></td> \n";
#echo "    <td><a onclick=\"window.open('index.php?action=audio_profiles','_self');\"";if($action=="audio_profiles"){echo " id=\"active\"";}echo ">Audio profiles</a></td> \n";
#echo "    <td><a onclick=\"window.open('index.php?action=devices','_self');\"";if($action=="devices"){echo " id=\"active\"";}echo ">Devices</a></td> \n";
#echo "    <td><a onclick=\"window.open('index.php?action=logout_user','_self');\"";if($action=="logout_user"){echo " id=\"active\"";}echo ">Logout</a></td> \n";
echo "  </tr> \n";
echo "</table>";
echo "<hr></hr>\n";

echo "<audio>";
echo "  <source src=\"click.mp3\"></source>";
echo "  <source src=\"click.ogg\"></source>";
echo "</audio>";


?>
