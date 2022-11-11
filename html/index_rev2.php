<?php
include_once 'db.php';
?>

<html>
<head>
<link rel="shortcut icon" href="#" />
<link rel="stylesheet" href="materialize.min.css"/>
<link rel="stylesheet" href="2.css"/>
<link rel="stylesheet" href="style.css"/>
<link rel="stylesheet" href="rev2.css"/>

<style>
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #2196f31c;
  width: fit-content;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: initial;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  //font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #166e86bf;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #2196f366;
}

/* Style the tab content */
.subtabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  //border-top: none;
}
.material-icons {
    margin-left: -30px;
}
select {
    display: block;
    width: fit-content;
    width: fit-content;
    background-color: #3342430f;
    border-block-end-style: inherit;
}
</style>
</head>

<!--<form method="POST" enctype="multipart/form-data">-->
    <?php
      //echo select_Timezone().'<br>';
    ?>


    <input align="left" type="country" id="country" name="country" placeholder="Enter your Country Code">


    <?php

    //system('sudo iwlist wlan0 scan | grep -e ESSID -e level > /var/www/html/wifi.txt &');
    //$fileName = 'wifi.txt';

    //$data = file_get_contents($fileName);

    $data = shell_exec("sudo iwlist wlan0 scan | grep -e ESSID -e level");

    function getContents($str, $startDelimiter, $endDelimiter) {
        $contents = array();
        $startDelimiterLength = strlen($startDelimiter);
        $endDelimiterLength = strlen($endDelimiter);
        $startFrom = $contentStart = $contentEnd = 0;
        while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom))) {
            $contentStart += $startDelimiterLength;
            $contentEnd = strpos($str, $endDelimiter, $contentStart);
            if (false === $contentEnd) {
                break;
            }
            $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
            $startFrom = $contentEnd + $endDelimiterLength;
        }
        return $contents;
    }

    function getWifiIcon($quality) {
      $slashPos = strpos($quality, "/");
      $numeratorS = substr($quality, 0, $slashPos);
      $denominatorS = substr($quality, $slashPos+1, strlen($quality));

      $numerator = (int)$numeratorS;
      $denominator = (int)$denominatorS;
      $qualityValue = (int)($numerator / $denominator * 4);

      return strval($qualityValue)."wq.svg";

    }
    ?>



      <script src="jquery.min.js" type="text/javascript"></script>
      <!--<script src="https://code.jquery.com/jquery-3.5.0.min.js" type="text/javascript"></script>-->


    <select name = "network" id="demo-htmlselect">
        <option selected disabled>Select WiFi Network</option>
        <?php
        // Build dropdown
        //$data1 = system('sudo iwlist wlan0 scan | grep ESSID ');
        $networkList = getContents($data, '"', '"');
        $qualityList = getContents($data, 'Quality=', '  Signal');

        //echo  $data;
        foreach($networkList as $index => $network) {
        ?>
            <option value="<?php echo $network; ?>" data-imagesrc="img/<?php echo getWifiIcon($qualityList[$index]); ?>" data-description=""><?php echo $network; ?></option>
        <?php
        }
        ?>
    </select>
    <!--Manula IP address button-->
    <!-- <button align="right" type="submit" name="edit-ip-manually" style="display:none;" id="ip-setting">Set IP Address Manually</button>-->
    <!--<a id="ip-setting" style="display:none;" class="modal-trigger" href="#modal-ip-setting">
    <p class="col s12" style="color:#165a90; padding-left:90px">Ip privat</p>
    </a>
    -->
    <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <!--<script src="jquery.min.js"></script>-->
    <script type="text/javascript" src="jquery.ddslick.min.js" ></script>


    <div class="tab" id="ipsetting">
      <button class="subtablinks" onclick="openSubTab(event, 'dhcp')">DHCP</button>
      <button class="subtablinks" onclick="openSubTab(event, 'static')">IP Static</button>
    </div>

    <div id="dhcp" class="subtabcontent"></div>

    <div id="static" class="subtabcontent">
      <!--<h4>Edit IP settings for (<span id="networkName"></span>) </h4>-->
      <span id="networkName" style="display:none;"></span>

        <h6 style="font-weight:bold;padding-left:50%">IPv4</h6>
        <div>
          IP Address:
          <div class="input-field inline">
            <input type=text id='ip_address'/>
          </div>
        </div>
        <div>
          Subnet prefix length:
          <div class="input-field inline">
            <input type=text id='subnet_prefix_len'/>
          </div>
        </div>
        <div>
          Gateway:
          <div class="input-field inline">
            <input type=text id='gateway'/>
          </div>
        </div>
        <div>
          Preferred DNS:
          <div class="input-field inline">
            <input type=text id='pref_dns'/>
          </div>
        </div>
        <div>
          Alternate DNS:
          <div class="input-field inline">
            <input type=text id='alter_dns'/>
          </div>
        </div>
      </div>


    <input align="left" type="text" id="password" name="password" placeholder="Enter your password">

    <button type="button" name="btn-signup" class="btn blue wave-effect" onclick="submit_()">Submit</button>
<!--</form>-->
<script src="settings.js"></script>
<script src="materialize.min.js"></script>
<script src="scripts.js"></script>
<script src="rev2.js"></script>
</html>

<?php
if(isset($_POST['btn-signup']))
{
        $country=$_POST["country"];
        $ssid=$_POST["network"];
        $password=$_POST["password"];
        $myFile = "/var/www/htmlro/wpa_supplicant.conf";
        $fh = fopen($myFile, 'w') or die("can't open file");
        $stringData = "country=$country\nctrl_interface=DIR=/var/run/wpa_supplicant GROUP=netdev\nupdate_config=1\nnetwork={\n\tssid=\"".$ssid."\"\n\tpsk=\"".$password."\"\n}";
        fwrite($fh,"\n");
        fwrite($fh, $stringData);
        fclose($fh);
        system("sudo  /bin/systemctl enable dnsmasq >> /dev/null 2>&1 && sudo /etc/init.d/dnsmasq start >> /dev/null 2>&1");

}

?>
