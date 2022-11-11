<?php
include_once 'dbconnect.php';
$result = $mysqli->query("SELECT * from users WHERE user_id='" . $_SESSION['user'] . "'");
$row = $result->fetch_assoc();
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
?>

        <div class="subtitle">Modul Confort</div>
        <div class="row notover">
            <div class="col m6 s12 green darken-1 vent-wrapper row z-depth-1" id="vent-1-wrapper">
                <p class="vent-info-left-top col s6 left-align">Start <?php echo $auxdata['startVent']?>&deg;C</p>
                <a class="modal-trigger" href="#modal-windows">
                    <p class="vent-title col s12 center-align">Ventilatie</p>
                    <i class="medium material-icons white-text col s12 center-align ">toys</i>
                </a>
                <div class="col s12 center-align">
                    <div class="switch">
                  <?php if ($auxdata['enablevent'] == 0){ ?>
                       <form method="post">
                       <label>
                            Off
                            <input type="checkbox" name="ventenable" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </form>
                   <?php  } ?>
                  <?php if ($auxdata['enablevent'] == 1){ ?>
                       <form action="home.php?ventdisable=true" method="post">
                       <label>
                            Off
                            <input type="checkbox" name="ventdisable" onchange="this.form.submit()" checked>
                            <span class="lever"></span>
                            On
                        </label>
                        </form>
                   <?php  } ?>
                    </div>
                </div>
                <p class="vent-info-left-bottom col s6 left-align">Stop <?php echo $auxdata['stopVent']?>&deg;C</p>
            </div>
            <div class="col m6 s12 green darken-1 vent-wrapper row z-depth-1" id="vent-1-wrapper">
                <p class="vent-info-left-top col s6 left-align">Start <?php echo $auxdata['startHeat']?>&deg;C</p>
                <p class="vent-info-right-top col s6 right-align">Day <?php echo $auxdata['dayLux']?> Lux</p>
                <a class="modal-trigger" href="#modal-heat">
                    <p class="vent-title col s12 center-align">Sistem Incalzire</p>
                    <i class="medium material-icons white-text col s12 center-align ">wb_sunny</i>
                </a>
                <div class="col s12 center-align">
                    <div class="switch">
                  <?php if ($auxdata['enableheat'] == 0){ ?>
                       <form method="post">
                       <label>
                            Off
                            <input type="checkbox" name="heatenable" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </form>
                   <?php  } ?>
                  <?php if ($auxdata['enableheat'] == 1){ ?>
                       <form action="home.php?heatdisable=true" method="post">
                       <label>
                            Off
                            <input type="checkbox" name="ventdisable" onchange="this.form.submit()" checked>
                            <span class="lever"></span>
                            On
                        </label>
                        </form>
                   <?php  } ?>

                    </div>
                </div>
                <p class="vent-info-left-bottom col s6 left-align">Stop <?php echo $auxdata['stopHeat']?>&deg;C</p>
                <p class="vent-info-right-bottom col s6 right-align">Night <?php echo $auxdata['nightLux']?> Lux</p>
            </div>
            <div class="col m6 s12 green darken-1 vent-wrapper row z-depth-1" id="vent-1-wrapper">
                <p class="vent-info-left-top col s6 left-align">Start <?php echo $auxdata['startLightTime']?> Lux</p>
                <a class="modal-trigger" href="#modal-light">
                    <p class="vent-title col s12 center-align">Sistem Iluminat</p>
                    <i class="medium material-icons white-text col s12 center-align ">brightness_medium</i>
                </a>
                <div class="col s12 center-align">
                    <div class="switch">
                  <?php if ($auxdata['enablelight'] == 0){ ?>
                       <form method="post">
                       <label>
                            Off
                            <input type="checkbox" name="lightenable" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </form>
                   <?php  } ?>
                  <?php if ($auxdata['enablelight'] == 1){ ?>
                       <form action="home.php?lightdisable=true" method="post">
                       <label>
                            Off
                            <input type="checkbox" name="lightdisable" onchange="this.form.submit()" checked>
                            <span class="lever"></span>
                            On
                        </label>
                        </form>
                   <?php  } ?>
                    </div>
                </div>
                <p class="vent-info-left-bottom col s6 left-align">Stop <?php echo $auxdata['stopLightTime']?> Lux</p>
            </div>
            <div class="col m6 s12 green darken-1 vent-wrapper row z-depth-1" id="vent-1-wrapper">
                <p class="vent-info-left-top col s6 left-align">Start <?php echo $auxdata['startHumi']?>%</p>
                <a class="modal-trigger" href="#modal-dehumidifier">
                    <p class="vent-title col s12 center-align">Sistem Dehumidificare</p>
                    <i class="medium material-icons white-text col s12 center-align ">grain</i>
                </a>
                <div class="col s12 center-align">
                    <div class="switch">
                  <?php if ($auxdata['enableHumi'] == 0){ ?>
                       <form method="post">
                       <label>
                            Off
                            <input type="checkbox" name="humienable" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </form>
                   <?php  } ?>
                  <?php if ($auxdata['enableHumi'] == 1){ ?>
                       <form action="home.php?humidisable=true" method="post">
                       <label>
                            Off
                            <input type="checkbox" name="humidisable" onchange="this.form.submit()" checked>
                            <span class="lever"></span>
                            On
                        </label>
                        </form>
                   <?php  } ?>
                    </div>
                </div>
                <p class="vent-info-left-bottom col s6 left-align">Stop <?php echo $auxdata['stopHumi']?>%</p>
            </div>
        </div>
   <!-- Electric fan -->
    <form method="post">
    <div id="modal-windows" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Sistem Ventilatie</h4>
            <div class="row">
                <div class="col s12">
                    Temperatura pornire:
                    <div class="input-field inline">
                        <input type="text" name='startTvent' placeHolder="<?php echo $auxdata['startVent']?>"/>
                    </div>
                   </div>
                   <div class="col s12">
                    Temperatura Oprire:
                        <div class="input-field inline">
                        <input type="text" name='stopTvent' placeHolder="<?php echo $auxdata['stopVent']?>"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Inchide</a>
            <button class="modal-action modal-close waves-effect waves-green btn-flat" name="btn-vent" type="submit">Salveaza setarile</button>
        </div>
    </div>
</form>
    <!-- Heat -->
    <form method="post">
    <div id="modal-heat" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Sistem Incalzire</h4>
            <div class="row">
                <div class="col s12">
                    Temperatura Pornire:
                    <div class="input-field inline">
                        <input type="text" name='startTheat' placeHolder="<?php echo $auxdata['startHeat']?>"/>
                   </div>
                </div>
                <div class="col s12">
                    Temperatura Oprire:
                    <div class="input-field inline">
                        <input type="text" name='stopTheat' placeHolder="<?php echo $auxdata['stopHeat']?>"/>
                   </div>
                </div>
                <div class="col s12">
                    Activare Incalzire Zi/Noapte:
                    <div class="input-field inline">
                        <input type="text" name='enableHeatS' placeHolder="<?php echo $auxdata['enabledaynight']?>  1=enable / 0=disable"/>
                   </div>
                </div>
                <div class="col s12">
                    Index Lux Zi:
                    <div class="input-field inline">
                        <input type="text" name='startLux' placeHolder="<?php echo $auxdata['dayLux']?>"/>
                   </div>
                </div>
                <div class="col s12">
                    Index Lux Noapte:
                    <div class="input-field inline">
                        <input type="text" name='stopLux' placeHolder="<?php echo $auxdata['nightLux']?>"/>
                   </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Inchide</a>
            <button class="modal-action modal-close waves-effect waves-green btn-flat" name="btn-heat" type="submit">Salveaza setarile</button>
        </div>
    </div>
</form>
    <!-- Light -->
    <form method="post">
    <div id="modal-light" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Sistem Iluminat</h4>
            <div class="row">
                <div class="col s12">
                    Index Lux Pornire:
                    <div class="input-field inline">
                        <input type="text" name='startLight' placeHolder="<?php echo $auxdata['startLightTime']?>"/>
                   </div>
                </div>
                <div class="col s12">
                    Index Lux Oprire:
                    <div class="input-field inline">
                        <input type="text" name='stopLight' placeHolder="<?php echo $auxdata['stopLightTime']?>"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Inchide</a>
            <button class="modal-action modal-close waves-effect waves-green btn-flat" name="btn-light" type="submit">Salveaza setarile</button>
        </div>
    </div>
   </form>
    <!-- Dehumidifier -->
    <form method="post">
    <div id="modal-dehumidifier" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Sistem Dehumidificare</h4>
            <div class="row">
                <div class="col s12">
                    Procent Pornire Dehumidificator:
                    <div class="input-field inline">
                        <input type="text" name='sHumi' placeHolder="<?php echo $auxdata['startHumi']?>"/>
                    </div>
                </div>
                <div class="col s12">
                    Procent Oprire Dehumidificator:
                    <div class="input-field inline">
                        <input type="text" name='stHumi' placeHolder="<?php echo $auxdata['stopHumi']?>"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Inchide</a>
            <button class="modal-action modal-close waves-effect waves-green btn-flat" name="btn-humi" type="submit">Salveaza setarile</button>
        </div>
    </div>
</form>

<!- irigare zona 1 ->

        <div class="title">Modul Irigare</div>
        <div id="irrigation-anchor"></div>
        <div class="row notover">
            <div class="col m6 s12 green darken-1 vent-wrapper row z-depth-1" id="vent-1-wrapper">
                <p class="vent-info-left-top white-text col s6 left-align">Irigare 1</p>
                <p class="vent-info-right-top white-text col s6 right-align">Irigare 2</p>
                <p class="vent-info-left-top white-text col s6 left-align"><?php echo $ir1data['OraPornireIrigare']?>:<?php echo $ir1data['MinutPornireIrigare']?> > <?php echo $ir1data['OraOprireIrigare']?>:<?php echo $ir1data['MinutOprireIrigare']?></p>
                <p class="vent-info-right-top white-text col s6 right-align"><?php echo $ir1data['OraPornireIrigare2']?>:<?php echo $ir1data['MinutPornireIrigare2']?> > <?php echo $ir1data['OraOprireIrigare2']?>:<?php echo $ir1data['MinutOprireIrigare2']?></p>

                <div class="switch">
                  <?php if ($ir1data['activi1'] == 0){ ?>
                       <form method="post">
                       <p class="vent-info-left-top white-text col s6 left-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir1t1en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir1data['activi1'] == 1){ ?>
                       <form action="home.php?ir1t1di=true" method="post">
                       <p class="vent-info-left-top white-text col s6 left-align">
                       <label>
                            Off
                            <input type="checkbox" onchange="this.form.submit()" checked>
                            <span class="lever"></span>
                            On
                        </label>
                        </p>
                        </form>
                   <?php  } ?>
                  </div>


                    <div class="switch">
                  <?php if ($ir1data['activi2'] == 0){ ?>
                       <form method="post">
                       <p class="vent-info-right-top col s6 right-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir1t2en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir1data['activi2'] == 1){ ?>
                       <form action="home.php?ir1t2di=true" method="post">
                       <p class="vent-info-right-top col s6 right-align">
                       <label>
                            Off
                            <input type="checkbox" onchange="this.form.submit()" checked>
                            <span class="lever"></span>
                            On
                        </label>
                        </p>
                        </form>
                   <?php  } ?>
                    </div>

                <a class="modal-trigger" href="#modal-irrigation-zone-1">
                    <p class="vent-title col s12 center-align"> Zona 1 </p>
                    <i class="medium material-icons white-text col s12 center-align ">invert_colors</i>
                </a>
                <p class="vent-info-left-bottom col s6 left-align"> Fertilizare 1</p>
                <p class="vent-info-right-bottom col s6 right-align">Fertilizare 2</p>
                <p class="vent-info-left-bottom col s6 left-align"> <?php echo $ir1data['OraPornireHrana'] ?>:<?php echo $ir1data['MinutPornireHrana'] ?> > <?php echo $ir1data['OraOprireHrana'] ?>:<?php echo $ir1data['MinutOprireHrana'] ?> </p>
                <p class="vent-info-right-bottom col s6 right-align"><?php echo $ir1data['OraPornireHrana2'] ?>:<?php echo $ir1data['MinutPornireHrana2'] ?> > <?php echo $ir1data['OraOprireHrana2'] ?>:<?php echo $ir1data['MinutOprireHrana2'] ?></p>
                  <div class="switch">
                  <?php if ($ir1data['activh1'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-left-bottom col s6 left-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir1h1en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                       </p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir1data['activh1'] == 1){ ?>
                       <form action="home.php?ir1h1di=true" method="post">
                <p class="vent-info-left-bottom col s6 left-align">
                       <label>
                            Off
                            <input type="checkbox" onchange="this.form.submit()" checked>
                            <span class="lever"></span>
                            On
                        </label>
                       </p>
                        </form>
                   <?php  } ?>
                    </div>
                    </p>
                    <div class="switch">
                  <?php if ($ir1data['activh2'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-right-bottom col s6 right-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir1h2en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir1data['activh2'] == 1){ ?>
                       <form action="home.php?ir1h2di=true" method="post">
                <p class="vent-info-right-bottom col s6 right-align">
                       <label>
                            Off
                            <input type="checkbox" onchange="this.form.submit()" checked>
                            <span class="lever"></span>
                            On
                        </label>
                        </p>
                        </form>
                   <?php  } ?>
                    </div>
            </div>
<!- irigare zona 2 ->
            <div class="col m6 s12 green darken-1 vent-wrapper row z-depth-1" id="vent-1-wrapper">
                <p class="vent-info-left-top col s6 left-align">Irigare 1</p>
                <p class="vent-info-right-top col s6 right-align">Irigare 2</p>
                <p class="vent-info-left-top col s6 left-align"><?php echo $ir2data['OraPornireIrigare']?>:<?php echo $ir2data['MinutPornireIrigare']?> > <?php echo $ir2data['OraOprireIrigare']?>:<?php echo $ir2data['MinutOprireIrigare']?></p>
                <p class="vent-info-right-top col s6 right-align"><?php echo $ir2data['OraPornireIrigare2']?>:<?php echo $ir2data['MinutPornireIrigare2']?> > <?php echo $ir2data['OraOprireIrigare2']?>:<?php echo $ir2data['MinutOprireIrigare2']?></p>
                    <div class="switch">
                  <?php if ($ir2data['activi1'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-left-top col s6 left-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir2t1en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
</p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir2data['activi1'] == 1){ ?>
                       <form action="home.php?ir2t1di=true" method="post">
                <p class="vent-info-left-top col s6 left-align">
                       <label>
                            Off
                            <input type="checkbox" onchange="this.form.submit()" checked>
                            <span class="lever"></span>
                            On
                        </label>
</p>
                        </form>
                   <?php  } ?>
                    </div>

                    <div class="switch">
                  <?php if ($ir2data['activi2'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-right-top col s6 right-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir2t2en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
</p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir2data['activi2'] == 1){ ?>
                       <form action="home.php?ir2t2di=true" method="post">
                <p class="vent-info-right-top col s6 right-align">
                       <label>
                            Off
                            <input type="checkbox" onchange="this.form.submit()" checked>
                            <span class="lever"></span>
                            On
                        </label>
</p>
                        </form>
                   <?php  } ?>
                    </div>

                <a class="modal-trigger" href="#modal-irrigation-zone-2">
                    <p class="vent-title col s12 center-align"> Zona 2 </p>
                    <i class="medium material-icons white-text col s12 center-align ">invert_colors</i>
                </a>
                <p class="vent-info-left-bottom col s6 left-align"> Fertilizare 1</p>
                <p class="vent-info-right-bottom col s6 right-align">Fertilizare 2</p>
                <p class="vent-info-left-bottom col s6 left-align"> <?php echo $ir2data['OraPornireHrana'] ?>:<?php echo $ir2data['MinutPornireHrana'] ?> > <?php echo $ir2data['OraOprireHrana'] ?>:<?php echo $ir2data['MinutOprireHrana'] ?></p>
                <p class="vent-info-right-bottom col s6 right-align"><?php echo $ir2data['OraPornireHrana2'] ?>:<?php echo $ir2data['MinutPornireHrana2'] ?> > <?php echo $ir2data['OraOprireHrana2'] ?>:<?php echo $ir2data['MinutOprireHrana2'] ?></p>

                    <div class="switch">
                  <?php if ($ir2data['activh1'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-left-bottom col s6 left-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir2h1en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
</p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir2data['activh1'] == 1){ ?>
                       <form action="home.php?ir2h1di=true" method="post">
                <p class="vent-info-left-bottom col s6 left-align">

                       <label>
                            Off
                            <input type="checkbox" onchange="this.form.submit()" checked>
                            <span class="lever"></span>
                            On
                        </label>
</p>
                        </form>
                   <?php  } ?>
                    </div>
                    <div class="switch">
                  <?php if ($ir2data['activh2'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-right-bottom col s6 right-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir2h2en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
</p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir2data['activh2'] == 1){ ?>
                       <form action="home.php?ir2h2di=true" method="post">
                <p class="vent-info-right-bottom col s6 right-align">
                       <label>
                            Off
                            <input type="checkbox" onchange="this.form.submit()" checked>
                            <span class="lever"></span>
                            On
                        </label>
</p>
                        </form>
                   <?php  } ?>
                    </div>

</div>
</div>
</div>
    <!-- Irrigation System ZONE 1 -->
    <form method="post">
    <div id="modal-irrigation-zone-1" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Setari Zona 1</h4>
            <div class="row">
                <h5>Irigare 1</h5>
                <div class="col m6 s12">
                    Pornire Irigare:
                    <div class="input-field inline">
                        <input type="text" name='starti' placeHolder="HH:MM"/>
                    </div>
                </div>
                <div class="col m6 s12">
                    Oprire Irigare:
                    <div class="input-field inline">
                        <input type="text" name='stopi' placeHolder="HH:MM"/>
                    </div>
                </div>
                <div class="col m6 s12">
                    Pornire Fertilizare:
                    <div class="input-field inline">
                        <input type="text" name='startf' placeHolder="HH:MM"/>
                    </div>
                </div>
                <div class="col m6 s12">
                    Oprire Fertilizare:
                    <div class="input-field inline">
                        <input type="text" name='stopf' placeHolder="HH:MM"/>
                    </div>
                </div>
                <h5>Irigare 2</h5>
                <div class="col m6 s12">
                    Pornire Irigare:
                    <div class="input-field inline">
                        <input type="text" name='starti2' placeHolder="HH:MM"/>
                    </div>
                </div>
                <div class="col m6 s12">
                    Oprire Irigare:
                    <div class="input-field inline">
                        <input type="text" name='stopi2' placeHolder="HH:MM"/>
                    </div>
                </div>
                <div class="col m6 s12">
                    Pornire Fertilizare:
                    <div class="input-field inline">
                        <input type="text" name='startf2' placeHolder="HH:MM"/>
                    </div>
                </div>
                <div class="col m6 s12">
                    Oprire Fertilizare:
                    <div class="input-field inline">
                        <input type="text" name='stopf2' placeHolder="HH:MM"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Inchide</a>
            <button class="btn-default modal-action modal-close waves-effect waves-red btn-flat" name="btn-ir1" type="submit">Salveaza setarile</button>
        </div>
    </div>
    </form>
    <!-- Irrigation System ZONE 2 -->
    <form method="post">
    <div id="modal-irrigation-zone-2" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Setari Zona 2</h4>
            <div class="row">
                <h5>Irigare 1</h5>
                <div class="col m6 s12">
                    Pornire Irigare:
                    <div class="input-field inline">
                        <input type="text" name='starti' placeHolder="HH:MM"/>
                    </div>
                </div>
                <div class="col m6 s12">
                    Oprire Irigare:
                    <div class="input-field inline">
                        <input type="text" name='stopi' placeHolder="HH:MM"/>
                    </div>
                </div>
                <div class="col m6 s12">
                    Pornire Fertilizare:
                    <div class="input-field inline">
                        <input type="text" name='startf' placeHolder="HH:MM"/>
                    </div>
                </div>
                <div class="col m6 s12">
                    Oprire Fertilizare:
                    <div class="input-field inline">
                        <input type="text" name='stopf' placeHolder="HH:MM"/>
                    </div>
                </div>
                <h5>Irigare 2</h5>
                <div class="col m6 s12">
                    Pornire Irigare:
                    <div class="input-field inline">
                        <input type="text" name='starti2' placeHolder="HH:MM"/>
                    </div>
                </div>
                <div class="col m6 s12">
                    Oprire Irigare:
                    <div class="input-field inline">
                        <input type="text" name='stopi2' placeHolder="HH:MM"/>
                    </div>
                </div>
                <div class="col m6 s12">
                    Pornire Fertilizare:
                    <div class="input-field inline">
                        <input type="text" name='startf2' placeHolder="HH:MM"/>
                    </div>
                </div>
                <div class="col m6 s12">
                    Oprire Fertilizare:
                    <div class="input-field inline">
                        <input type="text" name='stopf2' placeHolder="HH:MM"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Inchide</a>
            <button class="btn-default modal-action modal-close waves-effect waves-red btn-flat" name="btn-ir2" type="submit">Salveaza setarile</button>
        </div>
    </div>
    </form>

