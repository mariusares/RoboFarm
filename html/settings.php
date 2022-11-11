<?php
session_start();
include_once 'dbconnect.php';
$result = $mysqli->query("SELECT * from users WHERE user_id='" . $_SESSION['user'] . "'");
$row = $result->fetch_assoc();
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
?>

<!DOCTYPE html>
<head>
  <title>Robo-Farm Automatic System</title>

  <link rel="shortcut icon" href="#" />
  <link rel="stylesheet" href="materialize.min.css"/>
  <link rel="stylesheet" href="materialize.css"/>
  <link rel="stylesheet" href="style.css"/>
  <link rel="stylesheet" href="rev2.css"/>

  <meta name="viewport" content="width=device-width, initial-scale=1"/>
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
    font-size: 17px;
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
  .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    //border-top: none;
  }

  .box {
    display: none;
    border: solid;
    padding: 10px;
    border-width: thin;
    margin-top:10px;
  }
  h4 {
    text-align: center;
    font-variant: all-small-caps;
    background: #2196f369;
  }
  h5 {
    text-decoration: underline;
    font-variant: all-small-caps;
  }
  html {
    scroll-behavior: smooth;
  }
  #logo {
    width: 24%;
    opacity: 0.5;
    margin-left: -17%;
  }

  nav .button-collapse {
    margin-left: -10px;
  }
  #load{
      visibility: hidden;
      width:65%;
      height:42%;
      position:fixed;
      z-index:9999;
      background:url("img/radio.svg") no-repeat center center rgba(0,0,0,0.25)
  }

  </style>

</head>
<body>



  <div class="navbar-fixed">
    <nav class="blue">
        <div class="nav-wrapper container">
            <a href="home.php"><img src="img/robo-farm.png" width="340" height="auto" class="brand-logo"></a>
            <a href="#" data-activates="mobile-demo" id="button-collapse" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a id="scroll-network" href="#network">Retea</a></li>
                <li><a id="scroll-system" href="#system">Sistem</a></li>
                <li><a id="scroll-sensors" href="#sensors">Senzori</a></li>
                <li><a id="scroll-user" href="#user">Useri</a></li>
                <li><a href="logout.php?logout"><i class="material-icons">exit_to_app</i></a></li>

            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a id="scroll-network" href="#network">Retea</a></li>
              <li><a id="scroll-system" href="#system">Sistem</a></li>
              <li><a id="scroll-sensors" href="#sensors">Senzori</a></li>
              <li><a id="scroll-user" href="#user">Useri</a></li>
            </ul>
        </div>
    </nav>
  </div>
  <div class="container">
    <!-- Network -->
    <div id="network" class="box">
      <div class="col s12">
          <h4>Retea</h4>
      </div>

      <p>Selecteaza modul de conectare:</p>

      <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'AP_Mode')">Router AP</button>
        <button class="tablinks" name="wifi_tab" onclick="openWifiTab(event, 'WIFI_Connected')">Conectat WiFi</button>
      </div>

      <div id="AP_Mode" class="tabcontent">
        <form action="#" class="col s12 m6">
          <div class="input-field">
            <input type="text" placeholder="Nume AP" id="ap_name">
            <input type="text" placeholder="Parola" id="ap_password">
            <button type="button" class="btn blue wave-effect" onclick="save_ap()" style="margin: 15px 0;">Save</button>
          </div>
        </form>
      </div>
      <div id="load"></div>
      <div id="WIFI_Connected" class="tabcontent">
          <script src="jquery.min.js" type="text/javascript"></script>
          <script type="text/javascript" src="jquery.ddslick.min.js" ></script>
        <?php
            //require 'wifilist.php';
        ?>
      </div>
    </div>
    <!-- System -->
    <div id="system" class="box">
      <div class="col s12">
        <h4>Sistem</h4>
      </div>
      <!--<form method="post" action="#" class="col s12 m6">-->
      <input class="with-gap" name="systemoption" type="radio" value="1" id="master" <?php if ($setdata['master'] == 1) { echo  "checked/>"; }
else{
echo "/>";
}
?>
      <label for="master">Master</label>
      <input class="with-gap" name="systemoption" type="radio" value="0" id="slave" <?php if ($setdata['master'] == 0) { echo  "checked/>"; }
else{
echo "/>";
}
?>
      <label for="slave">Slave</label>
    <form action="#" method="GET" class="col s12 m6">
      <div class="input-field">
        <input type="text" placeholder="Canal Radio <?php echo $setdata['Rchannel'];?>" id="radio_channel" name="radio_channel">
        <input type="text" placeholder="ID Radio  <?php echo $setdata['Rid'];?>" id="radio_id" name="radio_id">
        <input type="password" placeholder="Parola Radio  <?php echo $setdata['Rpw'];?>" id="radio_password" name="radio_password">
        <button type="button" class="btn blue wave-effect" onclick="save_radio()" style="margin: 15px 0;">Salveaza setarile</button>
        <!--<button type="submit" name="save_radio_b" class="btn blue wave-effect" style="margin: 15px 0;">Save</button>-->
      </div>
    </form>

        <!--  <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'temp')">Temperature</button>
            <button class="tablinks" onclick="openTab(event, 'geo')">Geo position</button>
            <button class="tablinks" onclick="openTab(event, 'speed')">Speed</button>
          </div>-->
      <div class="row">
        <div class="col s12 m4">
          <h5>Irigare</h5>
          <p>Alege numarul zonelor de irigare:</p>
          <p>
            <input class="with-gap" name="irrigationoption" value="2" type="radio" id="2irrigation" <?php if ($setdata['zones'] == 2) { echo  "checked/>"; }
else{
echo "/>";
}
?>
            <label for="2irrigation">2 zone de irigare + modul auxiliare</label>
          </p>
          <p>
            <input class="with-gap" name="irrigationoption" value ="6" type="radio" id="6irrigation" <?php if ($setdata['zones'] == 6) { echo  "checked/>"; }
else{
echo "/>";
}
?>
            <label for="6irrigation">6 zone de irigare</label>
          </p>
        </div>
      </div>
      <div class="row">
        <!--<div id="temp" class="col s12 m4 tabcontent">-->
        <div class="col s12 m4">
          <h5>Temperatura</h5>
          <p>Afiseaza Temperatura:</p>
          <p>
            <input class="with-gap" name="tempoption" value="1" type="radio" id="celsius"  <?php if ($setdata['temp'] == 1) { echo  "checked/>"; }
else{
echo "/>";
}
?>
            <label for="celsius">Grade Celsius</label>
          </p>
          <p>
            <input class="with-gap" name="tempoption" value="2" type="radio" id="fahrenheit"<?php if ($setdata['temp'] == 2) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="fahrenheit">Grade Fahrenheit</label>
          </p>
        </div>
        <!--<div id="geo" class="col s12 m4 tabcontent">-->
        <div class="col s12 m4">
          <h5>Pozitionare Geografica</h5>
          <p>
            <input class="with-gap" name="geooption" value="1" type="radio" id="ns" <?php if ($setdata['geo'] == 1) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="ns">N-S</label>
          </p>
          <p>
            <input class="with-gap" name="geooption" value="2" type="radio" id="nesw" <?php if ($setdata['geo'] == 2) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="nesw">NE-SV</label>
          </p>
          <p>
            <input class="with-gap" name="geooption" value="3" type="radio" id="ew" <?php if ($setdata['geo'] == 3) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="ew">E-V</label>
          </p>
          <p>
            <input class="with-gap" name="geooption" value="4" type="radio" id="senw"<?php if ($setdata['geo'] == 4) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="senw">SE-NV</label>
          </p>
       </div>
        <!--<div id="speed" class="col s12 m4 tabcontent">-->
        <div class="col s12 m4">
          <h5>Viteza vantului</h5>
            <p>Afisare viteza vant:</p>
            <p>
              <input class="with-gap" name="speedoption" value="1" type="radio" id="kmh" <?php if ($setdata['speed'] == 1) { echo  "checked/>"; }
else{
echo "/>";
}
?>

              <label for="kmh">Km / H</label>
            </p>
            <p>
              <input class="with-gap" name="speedoption" value="2" type="radio" id="ms"<?php if ($setdata['speed'] == 2) { echo  "checked/>"; }
else{
echo "/>";
}
?>

              <label for="ms">M / s</label>
            </p>
        </div>
      </div>

      <div class="col s12">
          <button id="sub" type="button" onclick="save_system_settings()" class="btn blue waves-effect" style="margin: 15px 0;">Salveaza setarile</button>
      </div>
      <!--Timezone -->
        <h5>Ora si Data</h5>
        <div class="row">
          <div class="col s12 m4">
            <?php
                function select_Timezone($selected = '') {
                    $OptionsArray = timezone_identifiers_list();
                        $select= '<select id="timezone" name="SelectContacts" class="timezone">';
                        while (list ($key, $row) = each ($OptionsArray) ){
                            $select .='<option value="'.$key.'"';
                            //$select .= ($key == $selected ? ' selected' : '');
                            $select .= ($row === $selected ? ' selected' : '');
                            $select .= '>'.$row.'</option>';
                        }  // endwhile;
                        $select.='</select>';
                return $select;
                print $select;
                }

                $selected_timezone = trim(shell_exec("cat /etc/timezone"));
                //echo $selected_timezone;
                echo select_Timezone($selected_timezone)."<br>";
            ?>
          </div>
          <div class="col s12 m4">
              <button id="sub" type="button" onclick="set_timezone()" class="btn blue waves-effect">Salveaza setarile</button>
          </div>
        </div>
    </div>

    <!-- Sensors -->
    <div id="sensors" class="box">
      <div class="col s12">
        <h4 >Senzori</h4>
      </div>

      <div class="row">
        <div class="col s12 m4">
          <h5>Temperatura/umiditate</h5>
          <p>
            <input class="with-gap" name="tsensoroption" type="radio" id="tsensor1" value="1" <?php if ($setdata['Tsensor'] == 1) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="tsensor1">DHT21</label>
          </p>
          <p>
            <input class="with-gap" name="tsensoroption" type="radio" id="tsensor2" value="2" <?php if ($setdata['Tsensor'] == 2) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="tsensor2">DHT22</label>
          </p>
          <p>
            <input class="with-gap" name="tsensoroption" type="radio" id="tsensor3" value="3"  <?php if ($setdata['Tsensor'] == 3) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="tsensor3">HTU21D</label>
          </p>
          <p>
            <input class="with-gap" name="tsensoroption" type="radio" id="tsensor4" value="4" <?php if ($setdata['Tsensor'] == 4) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="tsensor4">SHT30</label>
          </p>
        </div>
       <div class="col s12 m4">
          <h5>Viteza/directia vantului</h5>
          <p>
            <input class="with-gap" name="wsensoroption" type="radio" id="wsensor1" value="1" <?php if ($setdata['Wsensor'] == 1) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="wsensor1">WH-SP-WS01/WH-SP-WD</label>
          </p>
          <p>
            <input class="with-gap" name="wsensoroption" type="radio" id="wsensor2" value="2" <?php if ($setdata['Wsensor'] == 2) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="wsensor2">Lacrosse TX23U</label>
          </p>
          <p>
            <input class="with-gap" name="wsensoroption" type="radio" id="wsensor3" value="3" <?php if ($setdata['Wsensor'] == 3) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="wsensor3">0-5V wind sensor</label>
          </p>
          <p>
            <input class="with-gap" name="wsensoroption" type="radio" id="wsensor4" value="4" <?php if ($setdata['Wsensor'] == 4) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="wsensor4">Custom</label>
          </p>
        </div>
        <div class="col s12 m4">
          <h5>Intensitate luminoasa</h5>
          <p>
            <input class="with-gap" name="lsensoroption" type="radio" id="lsensor1" value="1" <?php if ($setdata['Lsensor'] == 1) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="lsensor1">BH1750</label>
          </p>
          <p>
            <input class="with-gap" name="lsensoroption" type="radio" id="lsensor2" value="2" <?php if ($setdata['Lsensor'] == 2) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="lsensor2">B-LUX-V30B</label>
          </p>
          <p>
            <input class="with-gap" name="lsensoroption" type="radio" id="lsensor3" value="3" <?php if ($setdata['Lsensor'] == 3) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="lsensor3">3</label>
          </p>
          <p>
            <input class="with-gap" name="lsensoroption" type="radio" id="lsensor4" value="4" <?php if ($setdata['Lsensor'] == 4) { echo  "checked/>"; }
else{
echo "/>";
}
?>

            <label for="lsensor4">4</label>
          </p>
        </div>
        <div class="col s12 m4">
          <h5>NA</h5>
          <p>
            <input class="with-gap" name="nasensoroption" type="radio" id="nasensor1" value="1" checked/>
            <label for="nasensor1">1</label>
          </p>
          <p>
            <input class="with-gap" name="nasensoroption" type="radio" id="nasensor2" value="2"/>
            <label for="nasensor2">2</label>
          </p>
          <p>
            <input class="with-gap" name="nasensoroption" type="radio" id="nasensor3" value="3"/>
            <label for="nasensor3">3</label>
          </p>
          <p>
            <input class="with-gap" name="nasensoroption" type="radio" id="nasensor4" value="4"/>
            <label for="nasensor4">4</label>
          </p>
        </div>
        <div class="col s12 m4">
          <h5>NA1</h5>
          <p>
            <input class="with-gap" name="na1sensoroption" type="radio" id="na1sensor1" value="1" checked/>
            <label for="na1sensor1">1</label>
          </p>
          <p>
            <input class="with-gap" name="na1sensoroption" type="radio" id="na1sensor2" value="2"/>
            <label for="na1sensor2">2</label>
          </p>
          <p>
            <input class="with-gap" name="na1sensoroption" type="radio" id="na1sensor3" value="3"/>
            <label for="na1sensor3">3</label>
          </p>
          <p>
            <input class="with-gap" name="na1sensoroption" type="radio" id="na1sensor4" value="4"/>
            <label for="na1sensor4">4</label>
          </p>
        </div>
       <div class="col s12 m4">
          <h5>NA2</h5>
          <p>
            <input class="with-gap" name="na2sensoroption" type="radio" id="na2sensor1" value="1" checked/>
            <label for="na2sensor1">1</label>
          </p>
          <p>
            <input class="with-gap" name="na2sensoroption" type="radio" id="na2sensor2" value="2"/>
            <label for="na2sensor2">2</label>
          </p>
          <p>
            <input class="with-gap" name="na2sensoroption" type="radio" id="na2sensor3" value="3"/>
            <label for="na2sensor3">3</label>
          </p>
          <p>
            <input class="with-gap" name="na2sensoroption" type="radio" id="na2sensor4" value="4"/>
            <label for="na2sensor4">4</label>
          </p>
        </div>
        <div class="col s12">
              <button id="sub" type="button" onclick="save_sensor_settings()" class="btn blue waves-effect" style="margin: 15px 0;">Salveaza setarile</button>
        </div>
      </div>
    </div>


   <!-- Users -->
   <div id="user" class="box">
      <div class="col s12">
        <h4>Useri</h4>
      </div>
      <div class="row">
        <form method="post" class=" col s12 m6">
            <h5>Modificare user</h5>
            <div class="input-field ">
              <input type="text" name="uname" placeholder="Username">
          </div>
          <div class="input-field ">
              <input type="email" name="email" placeholder="Email">
          </div>
          <div class="input-field ">
              <input type="password" name="pass" placeholder="Parola">
          </div>
          <div class="input-field ">
              <input type="password" name="rpass" placeholder="Reintroduceti parola">
          </div>
            <button type="submit" name="btn-chpw" class="btn blue waves-effect" style="margin: 15px 0;">Modificati email/parola</button>
        </form>

       <form method="post" class=" col s12 m6">
          <h5>Creare user</h5>
          <div class="input-field ">
              <input type="text" name="uname" placeholder="User">
          </div>
          <div class="input-field ">
              <input type="email" name="email" placeholder="Email">
          </div>
          <div class="input-field ">
              <input type="password" name="pass" placeholder="Parola">
          </div>
          <div class="input-field ">
              <input type="password" name="rpass" placeholder="Reintroduceti parola">
          </div>
          <button type="submit" name="btn-signup" class="btn blue waves-effect" style="margin: 15px 0;">Adaugati parola</button>
        </form>

      </div>
    </div>
  </div>
  <script src="settings.js"> </script>
  <script src="materialize.min.js"></script>
  <script src="scripts.js"></script>
  <script>
      if(window.innerWidth < 1000) {
        $(".side-nav").css("width","30%");
        $(".button-collapse").click();
      }
  </script>
</body>
</html>
