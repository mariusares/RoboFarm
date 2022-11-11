<?php
$my_date = date("H:i:s d-m-Y");
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
    <title>Robo-Farm automatic system</title>
    <link rel="stylesheet" href="materialize.min.css"/>
    <link href="materialize.css" rel="stylesheet"/>
    <link rel="stylesheet" href="style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
    <div class="navbar-fixed">
        <nav class="blue">
            <div class="nav-wrapper container">
                <a href="/home.php"><img src="img/robo-farm.png" href="home.php" width="320" height="auto" class="brand-logo"></a>
                <!--<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>-->
                <a href="#" data-activates="mobile-demo" class="button-collapse" style="margin-left:0;"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a id="scroll-live-data">Date Live</a></li>
                    <li><a id="scroll-comfort" href="#">Aerisire</a></li>
                    <li><a id="scroll-irrigation" href="#">Irigare</a></li>
                    <li><a href="settings.php"><i class="material-icons">settings</i></a></li>
                    <li><a href="logout.php?logout"><i class="material-icons">exit_to_app</i></a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a id="scroll-live-data">Date Live</a></li>
                    <li><a id="scroll-comfort" href="#">Aerisire</a></li>
                    <li><a id="scroll-irrigation" href="#">Irigare</a></li>
                    <li><a href="settings.php"><i class="material-icons">settings</i> Settings</a></li>
                    <li><a href="logout.php?logout"><i class="material-icons">exit_to_app</i> Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <div id="live-data-anchor"></div>
        <div class="col s12 title">Date Live</div>
        <div class="row notover" id="content">
            <div class="info-box green col m6 s12 z-depth-1 fullm6">
                <div class="icon"><i class="small material-icons">access_time</i></div>
                <div class="label">Timp system</div>
                <div class="content"><?php echo $my_date ?></div>
            </div>
            <div class="info-box green col m6 s12 z-depth-1 fullm6">
                <div class="icon"><i class="small material-icons">swap_horiz</i></div>
                <div class="label">Pozitionare Geografica</div>
                <div class="content">N->S</div>
            </div>
            <div class="info-box green col m4 s12 z-depth-1">
                <div class="icon"><i class="small material-icons">spa</i></div>
                <div class="label">Temperatura / Umiditate interioara</div>
                <div class="content"><?php echo $read[3] ?> &#8451;/ <?php echo $read[4] ?> %</div>
            </div>
            <div class="info-box green col m4 s12  z-depth-1">
                <div class="icon"><i class="small material-icons">ac_unit</i></div>
                <div class="label">Temperatura / Umiditate / Lux exterior</div>
                <div class="content"><?php echo $read[5] ?> &#8451;/ <?php echo $read[6] ?> % <?php
if ($read[9] > 54000)
   echo "N/A";
if ($read[9] < 54000)
echo $read[9] ?> Lux</div>
            </div>
            <div class="info-box green col m4 s12 z-depth-1">
                <div class="icon"><i class="small material-icons">cloud</i></div>
                <div class="label">Vant: Viteza / Rafala / Directie</div>
                <div class="content"><?php echo $read[0] ?> Km/h / <?php echo $read[1] ?> Km/h /
<?php
$directie = $read[2];
$int = (int)$directie;
$dirTable= array("N","NNE","NE","ENE","E","ESE","SE","SSE","S","SSV","SV","VSV","V","VNV","NV","NNV");
echo $dirTable[$int];
?></div>
            </div>
        </div>

        <div class="title">Modul Aerisire</div>
        <div id="comfort-anchor"></div>
        <div class="row notover">

            <div class="col m6 s12 blue darken-1 vent-wrapper row z-depth-1" id="vent-1-wrapper">
		<p class="vent-info-left-top col s6 left-align">Deschide <?php echo $com1data['Topen']?>&deg;C</p>
                <p class="vent-info-right-top col s6 right-align">Viteza vant lucru <?php echo $com1data['Wwind']?> Km/h</p>
                <a class="modal-trigger" href="#modal-vent-1">
                    <p class="vent-title col s12 center-align"><?php echo $com1data['name'] ?></p>
                    <p class="vent-info col s12 center-align">Pozitie N  / 
<?php
if ($read[10] < 1){
echo "<td> Inchis </td>";
}
elseif ($read[10] > 100){
echo " Eror";
}else{
echo $read[10];
echo "%";
echo " Deschis";
}
?>
</p>
                    <i class="medium material-icons white-text col s12 center-align ">cloud_queue</i>
                </a>
                <div class="col s12 center-align">
                    <div class="switch">
                  <?php if ($com1data['enable'] == 0){ ?>
                       <form method="post">
                       <label>
                            Off
                            <input type="checkbox" name="w1enable" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </form>
                   <?php  } ?>
                  <?php if ($com1data['enable'] == 1){ ?>
                       <form action="home.php?w1disable=true" method="post">
                       <label>
                            Off
                            <input type="checkbox" name="w1disable" onchange="this.form.submit()"  checked>
                            <span class="lever"></span>
                            On
                        </label>
                        </form>
                   <?php  } ?>
                    </div>
		</div>
                <p class="vent-info-left-bottom col s6 left-align">Inchide <?php echo $com1data['Tclose']?>&deg;C</p>
                <p class="vent-info-right-bottom col s6 right-align">Viteza vant inchidere <?php echo $com1data['Wclose']?> Km/h</p>
            </div>
            <div class="col m6 s12 blue darken-1 vent-wrapper row z-depth-1" id="vent-1-wrapper">
                <p class="vent-info-left-top col s6 left-align">Deschide <?php echo $com2data['Topen']?>&deg;C</p>
                <p class="vent-info-right-top col s6 right-align">Viteza vant lucru <?php echo $com2data['Wwind']?> Km/h</p>
                <a class="modal-trigger" href="#modal-vent-2">
                    <p class="vent-title col s12 center-align"><?php echo $com2data['name'] ?></p>
                    <p class="vent-info col s12 center-align">Pozitie S /
<?php
if ($read[11] < 1){
echo "<td> Inchis </td>";
}
elseif ($read[11] > 100){
echo " Eror";
}else{
echo $read[11];
echo "%";
echo " Deschis";
}
?>
</p>
                    <i class="medium material-icons white-text col s12 center-align ">cloud_queue</i>
                </a>
                <div class="col s12 center-align">
                    <div class="switch">
                  <?php if ($com2data['enable'] == 0){ ?>
                       <form method="post">
                       <label>
                            Off
                            <input type="checkbox" name="w2enable" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </form>
                   <?php  } ?>
                  <?php if ($com2data['enable'] == 1){ ?>
                       <form action="home.php?w2disable=true" method="post">
                       <label>
                            Off
                            <input type="checkbox" name="w2disable" onchange="this.form.submit()" checked>
                            <span class="lever"></span>
                            On
                        </label>
                        </form>
                   <?php  } ?>
		</div>
                </div>
                <p class="vent-info-left-bottom col s6 left-align">Inchide <?php echo $com2data['Tclose']?>&deg;C</p>
                <p class="vent-info-right-bottom col s6 right-align">Viteza vant inchidere <?php echo $com2data['Wclose']?> Km/h</p>
            </div>
            <div class="col m6 s12 blue darken-1 vent-wrapper row z-depth-1" id="vent-1-wrapper">
                <p class="vent-info-left-top col s6 left-align">Deschide <?php echo $com3data['Topen']?>&deg;C</p>
                <p class="vent-info-right-top col s6 right-align">Viteza vant lucru <?php echo $com3data['Wwind']?> Km/h</p>
                <a class="modal-trigger" href="#modal-vent-3">
                    <p class="vent-title col s12 center-align"><?php echo $com3data['name'] ?></p>
                    <p class="vent-info col s12 center-align">Pozitie E /
<?php
if ($read[12] < 1){
echo "<td> Inchis </td>";
}
elseif ($read[12] > 100){
echo " Eror";
}else{
echo $read[12];
echo "%";
echo " Deschis";
}
?>
</p>
                    <i class="medium material-icons white-text col s12 center-align ">cloud_queue</i>
                </a>
                <div class="col s12 center-align">
                    <div class="switch">
                  <?php if ($com3data['enable'] == 0){ ?>
                       <form method="post">
                       <label>
                            Off
                            <input type="checkbox" name="w3enable" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </form>
                   <?php  } ?>
                  <?php if ($com3data['enable'] == 1){ ?>
                       <form action="home.php?w3disable=true" method="post">
                       <label>
                            Off
                            <input type="checkbox" name="w3disable" onchange="this.form.submit()" checked>
                            <span class="lever"></span>
                            On
                        </label>
                        </form>
                   <?php  } ?>
                    </div>
                </div>
                <p class="vent-info-left-bottom col s6 left-align">Inchide <?php echo $com3data['Tclose']?>&deg;C</p>
                <p class="vent-info-right-bottom col s6 right-align">Viteza vant inchidere <?php echo $com3data['Wclose']?> Km/h</p>
            </div>
            <div class="col m6 s12 blue darken-1 vent-wrapper row z-depth-1" id="vent-1-wrapper">
                <p class="vent-info-left-top col s6 left-align">Deschide <?php echo $com4data['Topen']?>&deg;C</p>
                <p class="vent-info-right-top col s6 right-align">Viteza vant lucru <?php echo $com4data['Wwind']?> Km/h</p>
                <a class="modal-trigger" href="#modal-vent-4">
                    <p class="vent-title col s12 center-align"><?php echo $com4data['name'] ?></p>
                    <p class="vent-info col s12 center-align">BERE RECE /
<?php
if ($read[13] < 1){
echo "<td> Inchis </td>";
}
elseif ($read[13] > 100){
echo " Eror";
}else{
echo $read[13];
echo "%";
echo " Deschis";
}
?>
</p>
                    <i class="medium material-icons white-text col s12 center-align ">cloud_queue</i>
                </a>
                <div class="col s12 center-align">
                    <div class="switch">
                  <?php if ($com4data['enable'] == 0){ ?>
                       <form method="post">
                       <label>
                            Off
                            <input type="checkbox" name="w4enable" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </form>
                   <?php  } ?>
                  <?php if ($com4data['enable'] == 1){ ?>
                       <form action="home.php?w4disable=true" method="post">
                       <label>
                            Off
                            <input type="checkbox" name="w4disable" onchange="this.form.submit()" checked>
                            <span class="lever"></span>
                            On
                        </label>
                        </form>
                   <?php  } ?>
                    </div>
                </div>
                <p class="vent-info-left-bottom col s6 left-align">Inchide <?php echo $com4data['Tclose']?>&deg;C</p>
                <p class="vent-info-right-bottom col s6 right-align">Viteza vant inchidere <?php echo $com4data['Wclose']?> Km/h</p>
            </div>
        </div>


    <!-- Vent #1 -->
    <form method="post">
    <div id="modal-vent-1" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Setari Aerisire 1</h4>
            <div class="col m6 s12">
            <b>Nume & Pozitie</b>
            </div>
            <div class="row">
                <div class="col m6 s12">
                    Nume Motor:
                    <div class="input-field inline">
                        <input type="text" name='name1' placeHolder="<?php echo $com1data['name'] ?>" required />
                    </div>
                </div>
                <div class="col m6 s12">
                    Pozitie Motor:
                    <div class="input-field inline">
                        <input type="text" name='position1' placeHolder="<?php echo $com1data['position'] ?>" required />
                    </div>
                </div>
            </div>
            <b>Setari Aerisire</b>
            <div class="row">
                <div class="col m6 s12">
                    Temperatura Deschidere:
                    <div class="input-field inline">
                        <input type="text" name='Topen1' placeHolder="<?php echo $com1data['Topen'] ?>" required />
                    </div>
                </div>
                <div class="col m6 s12">
                    Temperatura Inchidere:
                    <div class="input-field inline">
                        <input type="text" name='Tclose1' placeHolder="<?php echo $com1data['Tclose'] ?>" required />
                    </div>
                </div>
            </div>
            <b>Viteza Vant</b>
            <div class="row">
                <div class="col m6 s12">
                    Viteza vant lucru:
                    <div class="input-field inline">
                        <input type="text"  name='Wwind1' placeHolder="<?php echo $com1data['Wwind'] ?>" required />
                    </div>
                </div>
                <div class="col m6 s12">
                    Viteza vant inchidere:
                    <div class="input-field inline">
                        <input type="text" name='Wclose1' placeHolder="<?php echo $com1data['Wclose'] ?>" required />
                    </div>
                </div>
            </div>
            <b>Motor control</b>
            <div class="row">
                <div class="col s12">
                    Timp lucru motor:
                    <div class="input-field inline">
                        <input type="text" name="timecycle1" placeHolder="<?php echo $com1data['timecycle'] ?> secunde" required />
                    </div>
                </div>
                <div class="col s12">
                    Numar Pasi motor (1-9):
                    <div class="input-field inline">
                        <input type="text" name="steps1" placeHolder="<?php echo $com1data['steps'] ?> pasi" required />
                    </div>
                </div>
                <div class="col s12">
                    Timp pauza pasi:
                    <div class="input-field inline">
                        <input type="text"  name="break1" placeHolder="<?php echo $com1data['break'] ?> secunde" required />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Inchide</a>
            <button class="btn-default modal-action modal-Inchide waves-effect waves-red btn-flat" name="btn-com1" type="submit">Salveaza setarile</button>
        </div>
    </div>
    </form>

    <!-- Vent #2 -->
    <form method="post">
    <div id="modal-vent-2" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Setari Aerisire 2</h4>
            <div class="col m6 s12">
            <b>Nume & Pozitie</b>
            </div>
            <div class="row">
                <div class="col m6 s12">
                    Nume Motor:
                    <div class="input-field inline">
                        <input type="text" name='name2' placeHolder="<?php echo $com2data['name'] ?>" required />
                    </div>
                </div>
                <div class="col m6 s12">
                    Pozitie Motor:
                    <div class="input-field inline">
                        <input type="text" name='position2' placeHolder="<?php echo $com2data['position'] ?>" required />
                    </div>
                </div>
            </div>
            <b>Setari Aerisire</b>
            <div class="row">
                <div class="col m6 s12">
                    Temperatura Deschidere:
                    <div class="input-field inline">
                        <input type="text" name='Topen2' placeHolder="<?php echo $com2data['Topen'] ?>" required />
                    </div>
                </div>
                <div class="col m6 s12">
                    Temperatura Inchidere:
                    <div class="input-field inline">
                        <input type="text" name='Tclose2' placeHolder="<?php echo $com2data['Tclose'] ?>"required />
                    </div>
                </div>
            </div>
            <b>Viteza Vant</b>
            <div class="row">
                <div class="col m6 s12">
                    Viteza vant lucru:
                    <div class="input-field inline">
                        <input type="text"  name='Wwind2' placeHolder="<?php echo $com2data['Wwind'] ?>" required />
                    </div>
                </div>
                <div class="col m6 s12">
                    Viteza vant inchidere:
                    <div class="input-field inline">
                        <input type="text" name='Wclose2' placeHolder="<?php echo $com2data['Wclose'] ?>" required />
                    </div>
                </div>
            </div>
            <b>Motor control</b>
            <div class="row">
                <div class="col s12">
                    Timp lucru motor:
                    <div class="input-field inline">
                        <input type="text" name="timecycle2" placeHolder="<?php echo $com2data['timecycle'] ?> secunde" required />
                    </div>
                </div>
                <div class="col s12">
                    Numar Pasi motor (1-9):
                    <div class="input-field inline">
                        <input type="text" name="steps2" placeHolder="<?php echo $com2data['steps'] ?> pasi" required />
                    </div>
                </div>
                <div class="col s12">
                    Timp pauza pasi:
                    <div class="input-field inline">
                        <input type="text"  name="break2" placeHolder="<?php echo $com2data['break'] ?> secunde" required />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Inchide</a>
            <button class="btn-default modal-action modal-Inchide waves-effect waves-red btn-flat" name="btn-com2" type="submit">Salveaza setarile</button>
        </div>
    </div>
    </form>

    <!-- Vent #3 -->
    <form method="post">
    <div id="modal-vent-3" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Setari Aerisire 3</h4>
            <div class="col m6 s12">
            <b>Nume & Pozitie</b>
            </div>
            <div class="row">
                <div class="col m6 s12">
                    Nume Motor:
                    <div class="input-field inline">
                        <input type="text" name='name3' placeHolder="<?php echo $com3data['name'] ?>" required />
                    </div>
                </div>
                <div class="col m6 s12">
                    Pozitie Motor:
                    <div class="input-field inline">
                        <input type="text" name='position3' placeHolder="<?php echo $com3data['position'] ?>" required/>
                    </div>
                </div>
            </div>
            <b>Setari Aerisire</b>
            <div class="row">
                <div class="col m6 s12">
                    Temperatura Deschidere:
                    <div class="input-field inline">
                        <input type="text" name='Topen3' placeHolder="<?php echo $com3data['Topen'] ?>" required/>
                    </div>
                </div>
                <div class="col m6 s12">
                    Temperatura Inchidere:
                    <div class="input-field inline">
                        <input type="text" name='Tclose3' placeHolder="<?php echo $com3data['Tclose'] ?>" required/>
                    </div>
                </div>
            </div>
            <b>Viteza Vant</b>
            <div class="row">
                <div class="col m6 s12">
                    Viteza vant lucru:
                    <div class="input-field inline">
                        <input type="text"  name='Wwind3' placeHolder="<?php echo $com3data['Wwind'] ?>" required />
                    </div>
                </div>
                <div class="col m6 s12">
                    Viteza vant inchidere:
                    <div class="input-field inline">
                        <input type="text" name='Wclose3' placeHolder="<?php echo $com3data['Wclose'] ?>" required />
                    </div>
                </div>
            </div>
            <b>Motor control</b>
            <div class="row">
                <div class="col s12">
                    Timp lucru motor:
                    <div class="input-field inline">
                        <input type="text" name="timecycle3" placeHolder="<?php echo $com3data['timecycle'] ?> secunde" required />
                    </div>
                </div>
                <div class="col s12">
                    Numar Pasi motor (1-9):
                    <div class="input-field inline">
                        <input type="text" name="steps3" placeHolder="<?php echo $com3data['steps'] ?> pasi" required />
                    </div>
                </div>
                <div class="col s12">
                    Timp pauza pasi:
                    <div class="input-field inline">
                        <input type="text"  name="break3" placeHolder="<?php echo $com3data['break'] ?> secunde" required />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Inchide</a>
            <button class="btn-default modal-action modal-Inchide waves-effect waves-red btn-flat" name="btn-com3" type="submit">Salveaza setarile</button>
        </div>
    </div>
    </form>

    <!-- Vent #4 -->
    <form method="post">
    <div id="modal-vent-4" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Setari Aerisire 4</h4>
            <div class="col m6 s12">
            <b>Nume & Pozitie</b>
            </div>
            <div class="row">
                <div class="col m6 s12">
                    Nume Motor:
                    <div class="input-field inline">
                        <input type="text" name='name4' placeHolder="<?php echo $com4data['name'] ?>" required />
                    </div>
                </div>
                <div class="col m6 s12">
                    Pozitie Motor:
                    <div class="input-field inline">
                        <input type="text" name='position4' placeHolder="<?php echo $com4data['position'] ?>" required />
                    </div>
                </div>
            </div>
            <b>Setari Aerisire</b>
            <div class="row">
                <div class="col m6 s12">
                    Temperatura Deschidere:
                    <div class="input-field inline">
                        <input type="text" name='Topen4' placeHolder="<?php echo $com4data['Topen'] ?>" required />
                    </div>
                </div>
                <div class="col m6 s12">
                    Temperatura Inchidere:
                    <div class="input-field inline">
                        <input type="text" name='Tclose4' placeHolder="<?php echo $com4data['Tclose'] ?>" required />
                    </div>
                </div>
            </div>
            <b>Viteza Vant</b>
            <div class="row">
                <div class="col m6 s12">
                    Viteza vant lucru:
                    <div class="input-field inline">
                        <input type="text"  name='Wwind4' placeHolder="<?php echo $com4data['Wwind'] ?>" required />
                    </div>
                </div>
                <div class="col m6 s12">
                    Viteza vant inchidere:
                    <div class="input-field inline">
                        <input type="text" name='Wclose4' placeHolder="<?php echo $com4data['Wclose'] ?>" required />
                    </div>
                </div>
            </div>
            <b>Motor control</b>
            <div class="row">
                <div class="col s12">
                    Timp lucru motor:
                    <div class="input-field inline">
                        <input type="text" name="timecycle4" placeHolder="<?php echo $com4data['timecycle'] ?> secunde" required/>
                    </div>
                </div>
                <div class="col s12">
                    Numar Pasi motor (1-9):
                    <div class="input-field inline">
                        <input type="text" name="steps4" placeHolder="<?php echo $com4data['steps'] ?> pasi" required/>
                    </div>
                </div>
                <div class="col s12">
                    Timp pauza pasi:
                    <div class="input-field inline">
                        <input type="text"  name="break4" placeHolder="<?php echo $com4data['break'] ?> secunde" required/>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Inchide</a>
            <button class="btn-default modal-action modal-Inchide waves-effect waves-red btn-flat" name="btn-com4" type="submit">Salveaza setarile</button>
        </div>
    </div>
    </form>
<?php 
if ($setdata['zones'] == 6){
include 'modules/6zones.php';
}
if ($setdata['zones'] == 2){
include 'modules/aux.php';
}
?>
</div>
</div>

    <footer class="page-footer blue">
        <div class="container">
            <div class="row">
                  <div class="col s12 center-align">
                        <h5 class="white-text" style="font-weight: 300;">Robo-Farm</h5>
                        <p class="grey-text text-lighten-4">Automatic System</p>
                  </div>
            </div>
        </div>
          <div class="footer-copyright blue darken-1">
                <div class="container">
                    &copy; 2015-<?php echo date("Y");?> Robo-Farm toate drepturile rezervate
                    <a class="grey-text text-lighten-4 right" href="http://www.alexhodo.ro/">Contributie design Alex Hodo</a>
                </div>
          </div>
        </footer>
    <script src="jquery.min.js"></script>
    <script src="materialize.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
