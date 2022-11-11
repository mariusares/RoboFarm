<?php
session_start();
include_once 'dbconnect.php';
$result = $mysqli->query("SELECT * from users WHERE user_id='" . $_SESSION['user'] . "'");
$row = $result->fetch_assoc();
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}

$savetype = $_REQUEST["savetype"];
$ssid = $_REQUEST["ssid"];
$password=$_REQUEST["password"];
//echo $savetype;exit;
switch ($savetype) {
case "save_ap":
    $myFile = "/etc/hostapd/hostapd.conf";
    $stringData = "ssid=".$ssid."\nwpa_passphrase=".$password."\ninterface=wlan0\ndriver=nl80211\nhw_mode=g\nchannel=7\nwmm_enabled=0\nmacaddr_acl=0\nauth_algs=1\nignore_broadcast_ssid=0\nwpa=2\nwpa_key_mgmt=WPA-PSK\nwpa_pairwise=TKIP\nrsn_pairwise=CCMP\n";
    $stringAP = "allow-hotplug wlan0\niface wlan0 inet static\n    address 10.0.10.1\n    netmask 255.255.255.0\n    gateway 10.0.10.1\n    dns-nameservers 10.0.10.1\n    nohook wpa_supplicant";
    $fh1 = fopen('/etc/network/interfaces', 'w') or die("can't open file");
    fwrite($fh1, $stringAP);
    fclose($fh1);
    shell_exec("sudo  /bin/systemctl enable dnsmasq  >> /dev/null 2>&1 && sudo /bin/systemctl enable hostapd  >> /dev/null 2>&1 && sudo /sbin/reboot  >> /dev/null 2>&1");
break;
case "wifi_static":
    $country=$_REQUEST["country"];
    $ip = $_REQUEST["ip"];
    $subnet = $_REQUEST["subnet"];
    $gateway = $_REQUEST["gateway"];
    $prefDNS = $_REQUEST["prefDNS"];
    $alterDNS = $_REQUEST["alterDNS"];
    $myFile = "/etc/wpa_supplicant/wpa_supplicant.conf";
    $stringData = "country=$country\nctrl_interface=DIR=/var/run/wpa_supplicant GROUP=netdev\nupdate_config=1\nnetwork={\n\tssid=\"".$ssid."\"\n\tpsk=\"".$password."\"\n}";
    $fh1 = fopen('/etc/network/interfaces', 'w') or die("can't open file");
    $wlanstring = "allow-hotplug wlan0\niface wlan0 inet static\n    address ".$ip."\n    netmask ".$subnet."\n    gateway ".$gateway."\n    dns-nameservers ".$prefDNS." ".$alterDNS."\n    wpa-conf /etc/wpa_supplicant/wpa_supplicant.conf";
    fwrite($fh1, $wlanstring);
    fclose($fh1);
    shell_exec("sudo  /bin/systemctl disable dnsmasq  >> /dev/null 2>&1 && sudo /bin/systemctl disable hostapd  >> /dev/null 2>&1 && sudo /sbin/reboot >> /dev/null 2>&1");
    break;
case "wifi_dhcp":
    $country=$_REQUEST["country"];
    $password=$_REQUEST["password"];
    $myFile = "/etc/wpa_supplicant/wpa_supplicant.conf";
    $stringData = "country=$country\nctrl_interface=DIR=/var/run/wpa_supplicant GROUP=netdev\nupdate_config=1\nnetwork={\n\tssid=\"".$ssid."\"\n\tpsk=\"".$password."\"\n}";
    $fh1 = fopen('/etc/network/interfaces', 'w') or die("can't open file");
    $wlanstring = "auto wlan0\nallow-hotplug wlan0\niface wlan0 inet dhcp\n    wpa-conf /etc/wpa_supplicant/wpa_supplicant.conf";
    fwrite($fh1, $wlanstring);
    fclose($fh1);
    shell_exec("sudo  /bin/systemctl disable dnsmasq  >> /dev/null 2>&1 && sudo /bin/systemctl disable hostapd  >> /dev/null 2>&1 && sudo /sbin/reboot  >> /dev/null 2>&1");
break;
case "save_radio":
    $master = $_REQUEST['master'];
    $radio_channel = $_REQUEST['radio_channel'];
    $radio_id = $_REQUEST['radio_id'];
    $radio_password = $_REQUEST['radio_password'];
    //$query = "UPDATE settings SET master='$master' , Rchannel='$radio_channel' , Rid='$radio_id' , Rpw='$radio_password' WHERE id=1";
    //echo "<br>".$query."<br>";exit;
    $mysqli->query("UPDATE settings SET master='$master' , Rchannel='$radio_channel' , Rid='$radio_id' , Rpw='$radio_password' WHERE id=1");
break;
case "save_system_settings":
    $irrigation = $_REQUEST['irrigation'];
    $temp = $_REQUEST['temp'];
    $geopos = $_REQUEST['geopos'];
    $windspeed = $_REQUEST['windspeed'];
    $mysqli->query("UPDATE settings SET zones='$irrigation' , temp='$temp' , geo='$geopos' , speed='$windspeed' WHERE id=1");
    $address="127.0.0.1";
    $port="3333";
    $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
    socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
    socket_write($sock,"uSettings");
break;
case "save_sensor_settings":
    $tsensor = $_REQUEST['tsensor'];
    $wsensor = $_REQUEST['wsensor'];
    $lsensor = $_REQUEST['lsensor'];
    $na = $_REQUEST['na'];
    $na1 = $_REQUEST['na1'];
    $na2 = $_REQUEST['na2'];
    $query = "UPDATE settings SET Tsensor='$tsensor' , Wsensor='$wsensor' , Lsensor='$lsensor' , NA='$na' , NA1='$na1' , NA2='$na2' WHERE id=1";
    echo $query;
    $mysqli->query("UPDATE settings SET Tsensor='$tsensor' , Wsensor='$wsensor' , Lsensor='$lsensor' , NA='$na' , NA1='$na1' , NA2='$na2' WHERE id=1");
break;
case "set_timezone":
    $timezone = $_REQUEST['timezone'];
    shell_exec("sudo timedatectl set-timezone $timezone");
break;
default:
}
$fh = fopen($myFile, 'w') or die("can't open file");
fwrite($fh, $stringData);
fclose($fh);
?>
