<?php
include_once 'dbconnect.php';
$result = $mysqli->query("SELECT * from users WHERE user_id='" . $_SESSION['user'] . "'");
$row = $result->fetch_assoc();
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
?>


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

<!- irigare zona 3 ->

        <div id="comfort-anchor"></div>
        <div class="row notover">
            <div class="col m6 s12 green darken-1 vent-wrapper row z-depth-1" id="vent-1-wrapper">
                <p class="vent-info-left-top white-text col s6 left-align">Irigare 1</p>
                <p class="vent-info-right-top white-text col s6 right-align">Irigare 2</p>
                <p class="vent-info-left-top white-text col s6 left-align"><?php echo $ir3data['OraPornireIrigare']?>:<?php echo $ir3data['MinutPornireIrigare']?> > <?php echo $ir3data['OraOprireIrigare']?>:<?php echo $ir3data['MinutOprireIrigare']?></p>
                <p class="vent-info-right-top white-text col s6 right-align"><?php echo $ir3data['OraPornireIrigare2']?>:<?php echo $ir3data['MinutPornireIrigare2']?> > <?php echo $ir3data['OraOprireIrigare2']?>:<?php echo $ir3data['MinutOprireIrigare2']?></p>

                <div class="switch">
                  <?php if ($ir3data['activi1'] == 0){ ?>
                       <form method="post">
                       <p class="vent-info-left-top white-text col s6 left-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir3t1en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir3data['activi1'] == 1){ ?>
                       <form action="home.php?ir3t1di=true" method="post">
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
                  <?php if ($ir3data['activi2'] == 0){ ?>
                       <form method="post">
                       <p class="vent-info-right-top col s6 right-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir3t2en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir3data['activi2'] == 1){ ?>
                       <form action="home.php?ir3t2di=true" method="post">
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

                <a class="modal-trigger" href="#modal-irrigation-zone-3">
                    <p class="vent-title col s12 center-align"> Zona 3 </p>
                    <i class="medium material-icons white-text col s12 center-align ">invert_colors</i>
                </a>
                <p class="vent-info-left-bottom col s6 left-align"> Fertilizare 1</p>
                <p class="vent-info-right-bottom col s6 right-align">Fertilizare 2</p>
                <p class="vent-info-left-bottom col s6 left-align"> <?php echo $ir3data['OraPornireHrana'] ?>:<?php echo $ir3data['MinutPornireHrana'] ?> > <?php echo $ir3data['OraOprireHrana'] ?>:<?php echo $ir3data['MinutOprireHrana'] ?> </p>
                <p class="vent-info-right-bottom col s6 right-align"><?php echo $ir3data['OraPornireHrana2'] ?>:<?php echo $ir3data['MinutPornireHrana2'] ?> > <?php echo $ir3data['OraOprireHrana2'] ?>:<?php echo $ir3data['MinutOprireHrana2'] ?></p>
                  <div class="switch">
                  <?php if ($ir3data['activh1'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-left-bottom col s6 left-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir3h1en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                       </p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir3data['activh1'] == 1){ ?>
                       <form action="home.php?ir3h1di=true" method="post">
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
                  <?php if ($ir3data['activh2'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-right-bottom col s6 right-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir3h2en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir3data['activh2'] == 1){ ?>
                       <form action="home.php?ir3h2di=true" method="post">
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


<!- irigare zona 4 ->
            <div class="col m6 s12 green darken-1 vent-wrapper row z-depth-1" id="vent-1-wrapper">
                <p class="vent-info-left-top col s6 left-align">Irigare 1</p>
                <p class="vent-info-right-top col s6 right-align">Irigare 2</p>
                <p class="vent-info-left-top col s6 left-align"><?php echo $ir4data['OraPornireIrigare']?>:<?php echo $ir4data['MinutPornireIrigare']?> > <?php echo $ir4data['OraOprireIrigare']?>:<?php echo $ir4data['MinutOprireIrigare']?></p>
                <p class="vent-info-right-top col s6 right-align"><?php echo $ir4data['OraPornireIrigare2']?>:<?php echo $ir4data['MinutPornireIrigare2']?> > <?php echo $ir4data['OraOprireIrigare2']?>:<?php echo $ir4data['MinutOprireIrigare2']?></p>
                    <div class="switch">
                  <?php if ($ir4data['activi1'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-left-top col s6 left-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir4t1en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
</p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir4data['activi1'] == 1){ ?>
                       <form action="home.php?ir4t1di=true" method="post">
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
                  <?php if ($ir4data['activi2'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-right-top col s6 right-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir4t2en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
</p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir4data['activi2'] == 1){ ?>
                       <form action="home.php?ir4t2di=true" method="post">
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

                <a class="modal-trigger" href="#modal-irrigation-zone-4">
                    <p class="vent-title col s12 center-align"> Zona 4 </p>
                    <i class="medium material-icons white-text col s12 center-align ">invert_colors</i>
                </a>
                <p class="vent-info-left-bottom col s6 left-align"> Fertilizare 1</p>
                <p class="vent-info-right-bottom col s6 right-align">Fertilizare 2</p>
                <p class="vent-info-left-bottom col s6 left-align"> <?php echo $ir4data['OraPornireHrana'] ?>:<?php echo $ir4data['MinutPornireHrana'] ?> > <?php echo $ir4data['OraOprireHrana'] ?>:<?php echo $ir4data['MinutOprireHrana'] ?></p>
                <p class="vent-info-right-bottom col s6 right-align"><?php echo $ir4data['OraPornireHrana2'] ?>:<?php echo $ir4data['MinutPornireHrana2'] ?> > <?php echo $ir4data['OraOprireHrana2'] ?>:<?php echo $ir4data['MinutOprireHrana2'] ?></p>

                    <div class="switch">
                  <?php if ($ir4data['activh1'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-left-bottom col s6 left-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir4h1en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
</p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir4data['activh1'] == 1){ ?>
                       <form action="home.php?ir4h1di=true" method="post">
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
                  <?php if ($ir4data['activh2'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-right-bottom col s6 right-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir4h2en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
</p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir4data['activh2'] == 1){ ?>
                       <form action="home.php?ir4h2di=true" method="post">
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
<!- irigare zona 5 ->

        <div id="comfort-anchor"></div>
        <div class="row notover">
            <div class="col m6 s12 green darken-1 vent-wrapper row z-depth-1" id="vent-1-wrapper">
                <p class="vent-info-left-top white-text col s6 left-align">Irigare 1</p>
                <p class="vent-info-right-top white-text col s6 right-align">Irigare 2</p>
                <p class="vent-info-left-top white-text col s6 left-align"><?php echo $ir5data['OraPornireIrigare']?>:<?php echo $ir5data['MinutPornireIrigare']?> > <?php echo $ir5data['OraOprireIrigare']?>:<?php echo $ir5data['MinutOprireIrigare']?></p>
                <p class="vent-info-right-top white-text col s6 right-align"><?php echo $ir5data['OraPornireIrigare2']?>:<?php echo $ir5data['MinutPornireIrigare2']?> > <?php echo $ir5data['OraOprireIrigare2']?>:<?php echo $ir5data['MinutOprireIrigare2']?></p>

                <div class="switch">
                  <?php if ($ir5data['activi1'] == 0){ ?>
                       <form method="post">
                       <p class="vent-info-left-top white-text col s6 left-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir5t1en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir5data['activi1'] == 1){ ?>
                       <form action="home.php?ir5t1di=true" method="post">
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
                  <?php if ($ir5data['activi2'] == 0){ ?>
                       <form method="post">
                       <p class="vent-info-right-top col s6 right-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir5t2en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir5data['activi2'] == 1){ ?>
                       <form action="home.php?ir5t2di=true" method="post">
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

                <a class="modal-trigger" href="#modal-irrigation-zone-5">
                    <p class="vent-title col s12 center-align"> Zona 5 </p>
                    <i class="medium material-icons white-text col s12 center-align ">invert_colors</i>
                </a>
                <p class="vent-info-left-bottom col s6 left-align"> Fertilizare 1</p>
                <p class="vent-info-right-bottom col s6 right-align">Fertilizare 2</p>
                <p class="vent-info-left-bottom col s6 left-align"> <?php echo $ir5data['OraPornireHrana'] ?>:<?php echo $ir5data['MinutPornireHrana'] ?> > <?php echo $ir5data['OraOprireHrana'] ?>:<?php echo $ir5data['MinutOprireHrana'] ?> </p>
                <p class="vent-info-right-bottom col s6 right-align"><?php echo $ir5data['OraPornireHrana2'] ?>:<?php echo $ir5data['MinutPornireHrana2'] ?> > <?php echo $ir5data['OraOprireHrana2'] ?>:<?php echo $ir5data['MinutOprireHrana2'] ?></p>
                  <div class="switch">
                  <?php if ($ir5data['activh1'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-left-bottom col s6 left-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir5h1en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                       </p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir5data['activh1'] == 1){ ?>
                       <form action="home.php?ir5h1di=true" method="post">
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
                  <?php if ($ir5data['activh2'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-right-bottom col s6 right-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir5h2en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
                        </p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir5data['activh2'] == 1){ ?>
                       <form action="home.php?ir5h2di=true" method="post">
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

<!- irigare zona 6 ->
            <div class="col m6 s12 green darken-1 vent-wrapper row z-depth-1" id="vent-1-wrapper">
                <p class="vent-info-left-top col s6 left-align">Irigare 1</p>
                <p class="vent-info-right-top col s6 right-align">Irigare 2</p>
                <p class="vent-info-left-top col s6 left-align"><?php echo $ir6data['OraPornireIrigare']?>:<?php echo $ir6data['MinutPornireIrigare']?> > <?php echo $ir6data['OraOprireIrigare']?>:<?php echo $ir6data['MinutOprireIrigare']?></p>
                <p class="vent-info-right-top col s6 right-align"><?php echo $ir6data['OraPornireIrigare2']?>:<?php echo $ir6data['MinutPornireIrigare2']?> > <?php echo $ir6data['OraOprireIrigare2']?>:<?php echo $ir6data['MinutOprireIrigare2']?></p>
                    <div class="switch">
                  <?php if ($ir6data['activi1'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-left-top col s6 left-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir6t1en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
</p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir6data['activi1'] == 1){ ?>
                       <form action="home.php?ir6t1di=true" method="post">
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
                  <?php if ($ir6data['activi2'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-right-top col s6 right-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir6t2en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
</p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir6data['activi2'] == 1){ ?>
                       <form action="home.php?ir6t2di=true" method="post">
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

                <a class="modal-trigger" href="#modal-irrigation-zone-6">
                    <p class="vent-title col s12 center-align"> Zona 6 </p>
                    <i class="medium material-icons white-text col s12 center-align ">invert_colors</i>
                </a>
                <p class="vent-info-left-bottom col s6 left-align"> Fertilizare 1</p>
                <p class="vent-info-right-bottom col s6 right-align">Fertilizare 2</p>
                <p class="vent-info-left-bottom col s6 left-align"> <?php echo $ir6data['OraPornireHrana'] ?>:<?php echo $ir6data['MinutPornireHrana'] ?> > <?php echo $ir6data['OraOprireHrana'] ?>:<?php echo $ir6data['MinutOprireHrana'] ?></p>
                <p class="vent-info-right-bottom col s6 right-align"><?php echo $ir6data['OraPornireHrana2'] ?>:<?php echo $ir6data['MinutPornireHrana2'] ?> > <?php echo $ir6data['OraOprireHrana2'] ?>:<?php echo $ir6data['MinutOprireHrana2'] ?></p>

                    <div class="switch">
                  <?php if ($ir6data['activh1'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-left-bottom col s6 left-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir6h1en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
</p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir6data['activh1'] == 1){ ?>
                       <form action="home.php?ir6h1di=true" method="post">
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
                  <?php if ($ir6data['activh2'] == 0){ ?>
                       <form method="post">
                <p class="vent-info-right-bottom col s6 right-align">
                       <label>
                            Off
                            <input type="checkbox" name="ir6h2en" onchange="this.form.submit()" >
                            <span class="lever"></span>
                            On
                        </label>
</p>
                        </form>
                   <?php  } ?>
                  <?php if ($ir6data['activh2'] == 1){ ?>
                       <form action="home.php?ir6h2di=true" method="post">
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
    <!-- Irrigation System ZONE 3 -->
    <form method="post">
    <div id="modal-irrigation-zone-3" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Setari Zona 3</h4>
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
            <button class="btn-default modal-action modal-close waves-effect waves-red btn-flat" name="btn-ir3" type="submit">Salveaza setarile</button>
        </div>
    </div>
    </form>
    <!-- Irrigation System ZONE 4 -->
    <form method="post">
    <div id="modal-irrigation-zone-4" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Setari Zona 4</h4>
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
            <button class="btn-default modal-action modal-close waves-effect waves-red btn-flat" name="btn-ir4" type="submit">Salveaza setarile</button>
        </div>
    </div>
    </form>
    <!-- Irrigation System ZONE 5 -->
    <form method="post">
    <div id="modal-irrigation-zone-5" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Setari Zona 5</h4>
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
            <button class="btn-default modal-action modal-close waves-effect waves-red btn-flat" name="btn-ir5" type="submit">Salveaza Setarile</button>
        </div>
    </div>
    </form>
    <!-- Irrigation System ZONE 6 -->
    <form method="post">
    <div id="modal-irrigation-zone-6" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Setari Zona 6</h4>
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
            <button class="btn-default modal-action modal-close waves-effect waves-red btn-flat" name="btn-ir6" type="submit">Salveaza setarile</button>
        </div>
    </div>
    </form>
