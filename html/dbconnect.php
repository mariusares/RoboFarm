<?php
if(!$mysqli = new mysqli("127.0.0.1","ceres", "roboceres#")) {
     die('oops connection problem ! --> '.$mysqli->error);
}
if(!$mysqli->select_db("roboceres"))
{
     die('oops database selection problem ! --> '.$mysqli->error);
}



$address="127.0.0.1";
$port="3333";
$msg="confortR";
$sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
socket_write($sock,$msg);
$read=socket_read($sock,1024);
socket_close($sock);
$read = trim($read, " () ");
$read=explode( "," , $read );

$user1=$mysqli->query("SELECT * FROM users WHERE 1");
$user1data= $user1->fetch_assoc();

$com1=$mysqli->query("SELECT * FROM comfort WHERE id = 1");
$com1data= $com1->fetch_assoc();

$com2=$mysqli->query("SELECT * FROM comfort WHERE id = 2");
$com2data= $com2->fetch_assoc();
$com3=$mysqli->query("SELECT * FROM comfort WHERE id = 3");
$com3data= $com3->fetch_assoc();
$com4=$mysqli->query("SELECT * FROM comfort WHERE id = 4");
$com4data= $com4->fetch_assoc();

$ir1=$mysqli->query("SELECT * FROM irigare WHERE id = 1");
$ir1data= $ir1->fetch_assoc();
$ir2=$mysqli->query("SELECT * FROM irigare WHERE id = 2");
$ir2data= $ir2->fetch_assoc();
$ir3=$mysqli->query("SELECT * FROM irigare WHERE id = 3");
$ir3data= $ir3->fetch_assoc();
$ir4=$mysqli->query("SELECT * FROM irigare WHERE id = 4");
$ir4data= $ir4->fetch_assoc();
$ir5=$mysqli->query("SELECT * FROM irigare WHERE id = 5");
$ir5data= $ir5->fetch_assoc();
$ir6=$mysqli->query("SELECT * FROM irigare WHERE id = 6");
$ir6data= $ir6->fetch_assoc();

$aux=$mysqli->query("SELECT * FROM auxiliary");
$auxdata= $aux->fetch_assoc();

$settings=$mysqli->query("SELECT * FROM settings WHERE id = 1");
$setdata= $settings->fetch_assoc();

if(isset($_POST['btn-signup']))
{
 $uname = $mysqli->real_escape_string($_POST['uname']);
 $email = $mysqli->real_escape_string($_POST['email']);
 $upass = md5($mysqli->real_escape_string($_POST['pass']));
 $rpass = md5($mysqli->real_escape_string($_POST['rpass']));
if ($upass !== $rpass){
?>
<script>alert('Parola introdusa nu corespunde');</script>
        <?php

}
if($mysqli->query("INSERT INTO users(username,email,password) VALUES('$uname','$email','$upass')"))
 {
  ?>

        <script>alert('User Inregistrat cu succes');</script>
        <?php
 }
 else
 {
  ?>
        <script>alert('Acest user este deja inresgistrat in sistem');</script>
        <?php
 }
}
if(isset($_POST['btn-chpw']))
{
 $uname = $mysqli->real_escape_string($_POST['uname']);
 $email = $mysqli->real_escape_string($_POST['email']);
 $upass = md5($mysqli->real_escape_string($_POST['pass']));
 $rpass = md5($mysqli->real_escape_string($_POST['rpass']));
if ($upass !== $rpass){
?>
<script>alert('Parola nu corespunde');</script>
        <?php

}

else{
$mysqli->query("UPDATE users SET email='$email' , password='$upass' where username='$uname'");

  ?>

        <script>alert('User parola/email schimbate');</script>
        <?php
 }
}

if (isset($_POST['w1enable']))
{
 $mysqli->query("UPDATE comfort SET enable=1 WHERE id=1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"confortL1");
 header("Location: home.php");
}

if (isset($_GET['w1disable']))
{
 $mysqli->query("UPDATE comfort SET enable=0 WHERE id=1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"confortL1");
 header("Location: home.php");
}

if (isset($_POST['w2enable']))
{
 $mysqli->query("UPDATE comfort SET enable=1 WHERE id=2");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"confortL2");
 header("Location: home.php");
}
if (isset($_GET['w2disable']))
{
 $mysqli->query("UPDATE comfort SET enable=0 WHERE id=2");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"confortL2");
 header("Location: home.php");
}

if (isset($_POST['w3enable']))
{
 $mysqli->query("UPDATE comfort SET enable=1 WHERE id=3");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"confortL3");
 header("Location: home.php");
}

if (isset($_GET['w3disable']))
{
 $mysqli->query("UPDATE comfort SET enable=0 WHERE id=3");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"confortL3");
 header("Location: home.php");
}

if (isset($_POST['w4enable']))
{
 $mysqli->query("UPDATE comfort SET enable=1 WHERE id=4");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"confortL4");
 header("Location: home.php");
}

if (isset($_GET['w4disable']))
{
 $mysqli->query("UPDATE comfort SET enable=0 WHERE id=4");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"confortL4");
 header("Location: home.php");
}


if (isset($_POST['btn-com1']))
{
 $name1 =  $mysqli->real_escape_string($_POST['name1']);
 $position1 = $mysqli->real_escape_string($_POST['position1']);
 $Topen1 = $mysqli->real_escape_string($_POST['Topen1']);
 $Tclose1 = $mysqli->real_escape_string($_POST['Tclose1']);
 //$Wenable1 = $mysqli->real_escape_string($_POST['Wenable1']);
 $Wwind1 = $mysqli->real_escape_string($_POST['Wwind1']);
 $Wclose1 = $mysqli->real_escape_string($_POST['Wclose1']);
 $timecycle1 = $mysqli->real_escape_string($_POST['timecycle1']);
 $steps1 = $mysqli->real_escape_string($_POST['steps1']);
 $break1 = $mysqli->real_escape_string($_POST['break1']);
 //$windvalue1 = $mysqli->real_escape_string($_POST['value']);
if ($Topen1 < $Tclose1)
{
  ?>
<script>alert('Temperatura de Deschidere setata este mai mare decat Teperatura de Inchidere');</script>
        <?php

}
if ($Wclose1 < $Wwind1)
{
  ?>
<script>alert('Viteza Vantului pentru inchiderea de urgenta setata, este mai mica decat Viteza vantului pentru Lucru');</script>
        <?php

}
if ($steps1 < 1 || $steps1 > 9)
{
  ?>
<script>alert(''Numarul trepterlor de deschidere trebuie sa fie intre 1 si 9 inclusiv');</script>
        <?php

}

if ($Topen1 > $Tclose1 && $Wclose1 > $Wwind1 && $steps1 > 1 && 9 >= $steps1)
{
 $mysqli->query("UPDATE comfort SET name='$name1' , position='$position1' , Topen='$Topen1' , Tclose='$Tclose1' , Wwind='$Wwind1' , Wclose='$Wclose1', timecycle='$timecycle1' , steps='$steps1' , break='$break1' WHERE id = 1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"confortL1");
 header("Location: home.php");
}
}
if (isset($_POST['btn-com2']))
{
 $name1 =  $mysqli->real_escape_string($_POST['name2']);
 $position1 = $mysqli->real_escape_string($_POST['position2']);
 $Topen1 = $mysqli->real_escape_string($_POST['Topen2']);
 $Tclose1 = $mysqli->real_escape_string($_POST['Tclose2']);
// $Wenable1 = $mysqli->real_escape_string($_POST['Wenable2']);
 $Wwind1 = $mysqli->real_escape_string($_POST['Wwind2']);
 $Wclose1 = $mysqli->real_escape_string($_POST['Wclose2']);
 $timecycle1 = $mysqli->real_escape_string($_POST['timecycle2']);
 $steps1 = $mysqli->real_escape_string($_POST['steps2']);
 $break1 = $mysqli->real_escape_string($_POST['break2']);
if ($Topen1 < $Tclose1)
{
  ?>
<script>alert('Temperatura de Deschidere setata este mai mare decat Teperatura de Inchidere');</script>
        <?php

}
if ($Wclose1 < $Wwind1)
{
  ?>
<script>alert('Viteza Vantului pentru inchiderea de urgenta setata, este mai mica decat Viteza vantului pentru Lucru');</script>
        <?php

}
if ($steps1 < 1 || $steps1 > 9)
{
  ?>
<script>alert(''Numarul trepterlor de deschidere trebuie sa fie intre 1 si 9 inclusiv');</script>
        <?php

}

if ($Topen1 > $Tclose1 && $Wclose1 > $Wwind1 && $steps1 > 1 && 9 >= $steps1)
{
 $mysqli->query("UPDATE comfort SET name='$name1' , position='$position1' , Topen='$Topen1' , Tclose='$Tclose1' , Wwind='$Wwind1' , Wclose='$Wclose1', timecycle='$timecycle1' , steps='$steps1' , break='$break1' WHERE id = 2");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"confortL2");
 header("Location: home.php");
 }
}
if (isset($_POST['btn-com3']))
{
 $name1 =  $mysqli->real_escape_string($_POST['name3']);
 $position1 = $mysqli->real_escape_string($_POST['position3']);
 $Topen1 = $mysqli->real_escape_string($_POST['Topen3']);
 $Tclose1 = $mysqli->real_escape_string($_POST['Tclose3']);
 //$Wenable1 = $mysqli->real_escape_string($_POST['Wenable3']);
 $Wwind1 = $mysqli->real_escape_string($_POST['Wwind3']);
 $Wclose1 = $mysqli->real_escape_string($_POST['Wclose3']);
 $timecycle1 = $mysqli->real_escape_string($_POST['timecycle3']);
 $steps1 = $mysqli->real_escape_string($_POST['steps3']);
 $break1 = $mysqli->real_escape_string($_POST['break3']);
if ($Topen1 < $Tclose1)
{
  ?>
<script>alert('Temperatura de Deschidere setata este mai mare decat Teperatura de Inchidere');</script>
        <?php

}
if ($Wclose1 < $Wwind1)
{
  ?>
<script>alert('Viteza Vantului pentru inchiderea de urgenta setata, este mai mica decat Viteza vantului pentru Lucru');</script>
        <?php

}
if ($steps1 < 1 || $steps1 > 9)
{
  ?>
<script>alert(''Numarul trepterlor de deschidere trebuie sa fie intre 1 si 9 inclusiv');</script>
        <?php

}

if ($Topen1 > $Tclose1 && $Wclose1 > $Wwind1 && $steps1 > 1 && 9 >= $steps1)
{
 $mysqli->query("UPDATE comfort SET name='$name1' , position='$position1' , Topen='$Topen1' , Tclose='$Tclose1' , Wwind='$Wwind1' , timecycle='$timecycle1' , steps='$steps1' , break='$break1' WHERE id = 3");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"confortL3");
 header("Location: home.php");
 }
}
if (isset($_POST['btn-com4']))
{
 $name1 =  $mysqli->real_escape_string($_POST['name4']);
 $position1 = $mysqli->real_escape_string($_POST['position4']);
 $Topen1 = $mysqli->real_escape_string($_POST['Topen4']);
 $Tclose1 = $mysqli->real_escape_string($_POST['Tclose4']);
 //$Wenable1 = $mysqli->real_escape_string($_POST['Wenable4']);
 $Wwind1 = $mysqli->real_escape_string($_POST['Wwind4']);
 $Wclose1 = $mysqli->real_escape_string($_POST['Wclose4']);
 $timecycle1 = $mysqli->real_escape_string($_POST['timecycle4']);
 $steps1 = $mysqli->real_escape_string($_POST['steps4']);
 $break1 = $mysqli->real_escape_string($_POST['break4']);
if ($Topen1 < $Tclose1)
{
  ?>
<script>alert('Temperatura de Deschidere setata este mai mare decat Teperatura de Inchidere');</script>
        <?php

}
if ($Wclose1 < $Wwind1)
{
  ?>
<script>alert('Viteza Vantului pentru inchiderea de urgenta setata, este mai mica decat Viteza vantului pentru Lucru');</script>
        <?php

}
if ($steps1 < 1 || $steps1 > 9)
{
  ?>
<script>alert(''Numarul trepterlor de deschidere trebuie sa fie intre 1 si 9 inclusiv');</script>
        <?php

}

if ($Topen1 > $Tclose1 && $Wclose1 > $Wwind1 && $steps1 > 1 && 9 >= $steps1)
{
 $mysqli->query("UPDATE comfort SET name='$name1' , position='$position1' , Topen='$Topen1' , Tclose='$Tclose1' , Wwind='$Wwind1' , Wclose='$Wclose1', timecycle='$timecycle1' , steps='$steps1' , break='$break1' WHERE id = 4");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"confortL4");
 header("Location: home.php");
 }
}


if(isset($_POST['btn-ir1']))
{
 $starti = $mysqli->real_escape_string($_POST['starti']);
 $stopi = $mysqli->real_escape_string($_POST['stopi']);
 $startf = $mysqli->real_escape_string($_POST['startf']);
 $stopf = $mysqli->real_escape_string($_POST['stopf']);
 $starti2 = $mysqli->real_escape_string($_POST['starti2']);
 $stopi2 = $mysqli->real_escape_string($_POST['stopi2']);
 $startf2 = $mysqli->real_escape_string($_POST['startf2']);
 $stopf2 = $mysqli->real_escape_string($_POST['stopf2']);
 list($opi1, $mpi1) = explode(':', $starti);
 list($ooi1, $moi1) = explode(':', $stopi);
 list($oph1, $mph1) = explode(':', $startf);
 list($ooh1, $moh1) = explode(':', $stopf);
 list($opi2, $mpi2) = explode(':', $starti2);
 list($ooi2, $moi2) = explode(':', $stopi2);
 list($oph2, $mph2) = explode(':', $startf2);
 list($ooh2, $moh2) = explode(':', $stopf2);
 $mysqli->query("UPDATE irigare SET OraPornireIrigare='$opi1', MinutPornireIrigare='$mpi1', OraOprireIrigare='$ooi1', MinutOprireIrigare='$moi1', OraPornireHrana='$oph1', MinutPornireHrana='$mph1', OraOprireHrana='$ooh1', MinutOprireHrana='$moh1', OraPornireIrigare2='$opi2', MinutPornireIrigare2='$mpi2', OraOprireIrigare2='$ooi2',  MinutOprireIrigare2='$moi2', OraPornireHrana2='$oph2', MinutPornireHrana2='$mph2', OraOprireHrana2='$ooh2', MinutOprireHrana2='$moh2' WHERE id = 1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona1");
 header("Location: home.php");
}
if (isset($_POST['ir1t1en']))
{
 $mysqli->query("UPDATE irigare SET activi1=1 WHERE id=1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona1");
 header("Location: home.php");
}

if (isset($_GET['ir1t1di']))
{
 $mysqli->query("UPDATE irigare SET activi1=0 , activh1=0 WHERE id=1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona1");
 header("Location: home.php");
}

if (isset($_POST['ir1h1en']))
{
 $mysqli->query("UPDATE irigare SET activh1=1 , activi1=1 WHERE id=1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona1");
 header("Location: home.php");
}
if (isset($_GET['ir1h1di']))
{
 $mysqli->query("UPDATE irigare SET activh1=0 WHERE id=1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona1");
 header("Location: home.php");
}
if (isset($_POST['ir1t2en']))
{
 $mysqli->query("UPDATE irigare SET activi2=1 WHERE id=1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona1");
 header("Location: home.php");
}

if (isset($_GET['ir1t2di']))
{
 $mysqli->query("UPDATE irigare SET activi2=0 , activh2=0 WHERE id=1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona1");
 header("Location: home.php");
}

if (isset($_POST['ir1h2en']))
{
 $mysqli->query("UPDATE irigare SET activh2=1 , activi2=1 WHERE id=1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona1");
 header("Location: home.php");
}
if (isset($_GET['ir1h2di']))
{
 $mysqli->query("UPDATE irigare SET activh2=0 WHERE id=1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona1");
 header("Location: home.php");
}



if(isset($_POST['btn-ir2']))
{
 $starti = $mysqli->real_escape_string($_POST['starti']);
 $stopi = $mysqli->real_escape_string($_POST['stopi']);
 $startf = $mysqli->real_escape_string($_POST['startf']);
 $stopf = $mysqli->real_escape_string($_POST['stopf']);
 $starti2 = $mysqli->real_escape_string($_POST['starti2']);
 $stopi2 = $mysqli->real_escape_string($_POST['stopi2']);
 $startf2 = $mysqli->real_escape_string($_POST['startf2']);
 $stopf2 = $mysqli->real_escape_string($_POST['stopf2']);
 list($opi1, $mpi1) = explode(':', $starti);
 list($ooi1, $moi1) = explode(':', $stopi);
 list($oph1, $mph1) = explode(':', $startf);
 list($ooh1, $moh1) = explode(':', $stopf);
 list($opi2, $mpi2) = explode(':', $starti2);
 list($ooi2, $moi2) = explode(':', $stopi2);
 list($oph2, $mph2) = explode(':', $startf2);
 list($ooh2, $moh2) = explode(':', $stopf2);
 $mysqli->query("UPDATE irigare SET OraPornireIrigare='$opi1', MinutPornireIrigare='$mpi1', OraOprireIrigare='$ooi1', MinutOprireIrigare='$moi1', OraPornireHrana='$oph1', MinutPornireHrana='$mph1', OraOprireHrana='$ooh1', MinutOprireHrana='$moh1', OraPornireIrigare2='$opi2', MinutPornireIrigare2='$mpi2', OraOprireIrigare2='$ooi2',  MinutOprireIrigare2='$moi2', OraPornireHrana2='$oph2', MinutPornireHrana2='$mph2', OraOprireHrana2='$ooh2', MinutOprireHrana2='$moh2' WHERE id = 2");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona2");
 header("Location: home.php");
}

if (isset($_POST['ir2t1en']))
{
 $mysqli->query("UPDATE irigare SET activi1=1 WHERE id=2");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona2");
 header("Location: home.php");
}

if (isset($_GET['ir2t1di']))
{
 $mysqli->query("UPDATE irigare SET activi1=0 , activh1=0 WHERE id=2");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona2");
 header("Location: home.php");
}

if (isset($_POST['ir2h1en']))
{
 $mysqli->query("UPDATE irigare SET activh1=1 , activi1=1 WHERE id=2");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona2");
 header("Location: home.php");
}
if (isset($_GET['ir2h1di']))
{
 $mysqli->query("UPDATE irigare SET activh1=0 WHERE id=2");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona2");
 header("Location: home.php");
}

if (isset($_POST['ir2t2en']))
{
 $mysqli->query("UPDATE irigare SET activi2=1 WHERE id=2");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona2");
 header("Location: home.php");
}

if (isset($_GET['ir2t2di']))
{
 $mysqli->query("UPDATE irigare SET activi2=0 , activh2=0 WHERE id=2");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona2");
 header("Location: home.php");
}

if (isset($_POST['ir2h2en']))
{
 $mysqli->query("UPDATE irigare SET activh2=1 , activi2=1 WHERE id=2");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona2");
 header("Location: home.php");
}
if (isset($_GET['ir2h2di']))
{
 $mysqli->query("UPDATE irigare SET activh2=0  WHERE id=2");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona2");
 header("Location: home.php");
}


if(isset($_POST['btn-ir3']))
{
 $starti = $mysqli->real_escape_string($_POST['starti']);
 $stopi = $mysqli->real_escape_string($_POST['stopi']);
 $startf = $mysqli->real_escape_string($_POST['startf']);
 $stopf = $mysqli->real_escape_string($_POST['stopf']);
 $starti2 = $mysqli->real_escape_string($_POST['starti2']);
 $stopi2 = $mysqli->real_escape_string($_POST['stopi2']);
 $startf2 = $mysqli->real_escape_string($_POST['startf2']);
 $stopf2 = $mysqli->real_escape_string($_POST['stopf2']);
 list($opi1, $mpi1) = explode(':', $starti);
 list($ooi1, $moi1) = explode(':', $stopi);
 list($oph1, $mph1) = explode(':', $startf);
 list($ooh1, $moh1) = explode(':', $stopf);
 list($opi2, $mpi2) = explode(':', $starti2);
 list($ooi2, $moi2) = explode(':', $stopi2);
 list($oph2, $mph2) = explode(':', $startf2);
 list($ooh2, $moh2) = explode(':', $stopf2);
 $mysqli->query("UPDATE irigare SET OraPornireIrigare='$opi1', MinutPornireIrigare='$mpi1', OraOprireIrigare='$ooi1', MinutOprireIrigare='$moi1', OraPornireHrana='$oph1', MinutPornireHrana='$mph1', OraOprireHrana='$ooh1', MinutOprireHrana='$moh1', OraPornireIrigare2='$opi2', MinutPornireIrigare2='$mpi2', OraOprireIrigare2='$ooi2',  MinutOprireIrigare2='$moi2', OraPornireHrana2='$oph2', MinutPornireHrana2='$mph2', OraOprireHrana2='$ooh2', MinutOprireHrana2='$moh2' WHERE id = 3");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona3");
 header("Location: home.php");
}
if (isset($_POST['ir3t1en']))
{
 $mysqli->query("UPDATE irigare SET activi1=1 WHERE id=3");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona3");
 header("Location: home.php");
}

if (isset($_GET['ir3t1di']))
{
 $mysqli->query("UPDATE irigare SET activi1=0 , activh1=0 WHERE id=3");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona3");
 header("Location: home.php");
}

if (isset($_POST['ir3h1en']))
{
 $mysqli->query("UPDATE irigare SET activh1=1 , activi1=1 WHERE id=3");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona3");
 header("Location: home.php");
}
if (isset($_GET['ir3h1di']))
{
 $mysqli->query("UPDATE irigare SET activh1=0 WHERE id=3");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona3");
 header("Location: home.php");
}
if (isset($_POST['ir3t2en']))
{
 $mysqli->query("UPDATE irigare SET activi2=1 WHERE id=3");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona3");
 header("Location: home.php");
}

if (isset($_GET['ir3t2di']))
{
 $mysqli->query("UPDATE irigare SET activi2=0 , activh2=0 WHERE id=3");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona3");
 header("Location: home.php");
}

if (isset($_POST['ir3h2en']))
{
 $mysqli->query("UPDATE irigare SET activh2=1 , activi2=1 WHERE id=3");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona3");
 header("Location: home.php");
}
if (isset($_GET['ir3h2di']))
{
 $mysqli->query("UPDATE irigare SET activh2=0 WHERE id=3");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona3");
 header("Location: home.php");
}



if(isset($_POST['btn-ir4']))
{
 $starti = $mysqli->real_escape_string($_POST['starti']);
 $stopi = $mysqli->real_escape_string($_POST['stopi']);
 $startf = $mysqli->real_escape_string($_POST['startf']);
 $stopf = $mysqli->real_escape_string($_POST['stopf']);
 $starti2 = $mysqli->real_escape_string($_POST['starti2']);
 $stopi2 = $mysqli->real_escape_string($_POST['stopi2']);
 $startf2 = $mysqli->real_escape_string($_POST['startf2']);
 $stopf2 = $mysqli->real_escape_string($_POST['stopf2']);
 list($opi1, $mpi1) = explode(':', $starti);
 list($ooi1, $moi1) = explode(':', $stopi);
 list($oph1, $mph1) = explode(':', $startf);
 list($ooh1, $moh1) = explode(':', $stopf);
 list($opi2, $mpi2) = explode(':', $starti2);
 list($ooi2, $moi2) = explode(':', $stopi2);
 list($oph2, $mph2) = explode(':', $startf2);
 list($ooh2, $moh2) = explode(':', $stopf2);
 $mysqli->query("UPDATE irigare SET OraPornireIrigare='$opi1', MinutPornireIrigare='$mpi1', OraOprireIrigare='$ooi1', MinutOprireIrigare='$moi1', OraPornireHrana='$oph1', MinutPornireHrana='$mph1', OraOprireHrana='$ooh1', MinutOprireHrana='$moh1', OraPornireIrigare2='$opi2', MinutPornireIrigare2='$mpi2', OraOprireIrigare2='$ooi2',  MinutOprireIrigare2='$moi2', OraPornireHrana2='$oph2', MinutPornireHrana2='$mph2', OraOprireHrana2='$ooh2', MinutOprireHrana2='$moh2' WHERE id = 4");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona4");
 header("Location: home.php");
}

if (isset($_POST['ir4t1en']))
{
 $mysqli->query("UPDATE irigare SET activi1=1 WHERE id=4");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona4");
 header("Location: home.php");
}

if (isset($_GET['ir4t1di']))
{
 $mysqli->query("UPDATE irigare SET activi1=0 , activh1=0 WHERE id=4");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona4");
 header("Location: home.php");
}

if (isset($_POST['ir4h1en']))
{
 $mysqli->query("UPDATE irigare SET activh1=1 , activi1=1 WHERE id=4");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona4");
 header("Location: home.php");
}
if (isset($_GET['ir4h1di']))
{
 $mysqli->query("UPDATE irigare SET activh1=0 WHERE id=4");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona4");
 header("Location: home.php");
}

if (isset($_POST['ir4t2en']))
{
 $mysqli->query("UPDATE irigare SET activi2=1 WHERE id=4");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona4");
 header("Location: home.php");
}

if (isset($_GET['ir4t2di']))
{
 $mysqli->query("UPDATE irigare SET activi2=0 , activh2=0 WHERE id=4");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona4");
 header("Location: home.php");
}

if (isset($_POST['ir4h2en']))
{
 $mysqli->query("UPDATE irigare SET activh2=1 , activi2=1 WHERE id=4");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona4");
 header("Location: home.php");
}
if (isset($_GET['ir4h2di']))
{
 $mysqli->query("UPDATE irigare SET activh2=0  WHERE id=4");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona4");
 header("Location: home.php");
}
if(isset($_POST['btn-ir5']))
{
 $starti = $mysqli->real_escape_string($_POST['starti']);
 $stopi = $mysqli->real_escape_string($_POST['stopi']);
 $startf = $mysqli->real_escape_string($_POST['startf']);
 $stopf = $mysqli->real_escape_string($_POST['stopf']);
 $starti2 = $mysqli->real_escape_string($_POST['starti2']);
 $stopi2 = $mysqli->real_escape_string($_POST['stopi2']);
 $startf2 = $mysqli->real_escape_string($_POST['startf2']);
 $stopf2 = $mysqli->real_escape_string($_POST['stopf2']);
 list($opi1, $mpi1) = explode(':', $starti);
 list($ooi1, $moi1) = explode(':', $stopi);
 list($oph1, $mph1) = explode(':', $startf);
 list($ooh1, $moh1) = explode(':', $stopf);
 list($opi2, $mpi2) = explode(':', $starti2);
 list($ooi2, $moi2) = explode(':', $stopi2);
 list($oph2, $mph2) = explode(':', $startf2);
 list($ooh2, $moh2) = explode(':', $stopf2);
 $mysqli->query("UPDATE irigare SET OraPornireIrigare='$opi1', MinutPornireIrigare='$mpi1', OraOprireIrigare='$ooi1', MinutOprireIrigare='$moi1', OraPornireHrana='$oph1', MinutPornireHrana='$mph1', OraOprireHrana='$ooh1', MinutOprireHrana='$moh1', OraPornireIrigare2='$opi2', MinutPornireIrigare2='$mpi2', OraOprireIrigare2='$ooi2',  MinutOprireIrigare2='$moi2', OraPornireHrana2='$oph2', MinutPornireHrana2='$mph2', OraOprireHrana2='$ooh2', MinutOprireHrana2='$moh2' WHERE id = 5");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona5");
 header("Location: home.php");
}
if (isset($_POST['ir5t1en']))
{
 $mysqli->query("UPDATE irigare SET activi1=1 WHERE id=5");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona5");
 header("Location: home.php");
}

if (isset($_GET['ir5t1di']))
{
 $mysqli->query("UPDATE irigare SET activi1=0 , activh1=0 WHERE id=5");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona5");
 header("Location: home.php");
}

if (isset($_POST['ir5h1en']))
{
 $mysqli->query("UPDATE irigare SET activh1=1 , activi1=1 WHERE id=5");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona5");
 header("Location: home.php");
}
if (isset($_GET['ir5h1di']))
{
 $mysqli->query("UPDATE irigare SET activh1=0 WHERE id=5");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona5");
 header("Location: home.php");
}
if (isset($_POST['ir5t2en']))
{
 $mysqli->query("UPDATE irigare SET activi2=1 WHERE id=5");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona5");
 header("Location: home.php");
}

if (isset($_GET['ir5t2di']))
{
 $mysqli->query("UPDATE irigare SET activi2=0 , activh2=0 WHERE id=5");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona5");
 header("Location: home.php");
}

if (isset($_POST['ir5h2en']))
{
 $mysqli->query("UPDATE irigare SET activh2=1 , activi2=1 WHERE id=5");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona5");
 header("Location: home.php");
}
if (isset($_GET['ir5h2di']))
{
 $mysqli->query("UPDATE irigare SET activh2=0 WHERE id=5");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona5");
 header("Location: home.php");
}



if(isset($_POST['btn-ir6']))
{
 $starti = $mysqli->real_escape_string($_POST['starti']);
 $stopi = $mysqli->real_escape_string($_POST['stopi']);
 $startf = $mysqli->real_escape_string($_POST['startf']);
 $stopf = $mysqli->real_escape_string($_POST['stopf']);
 $starti2 = $mysqli->real_escape_string($_POST['starti2']);
 $stopi2 = $mysqli->real_escape_string($_POST['stopi2']);
 $startf2 = $mysqli->real_escape_string($_POST['startf2']);
 $stopf2 = $mysqli->real_escape_string($_POST['stopf2']);
 list($opi1, $mpi1) = explode(':', $starti);
 list($ooi1, $moi1) = explode(':', $stopi);
 list($oph1, $mph1) = explode(':', $startf);
 list($ooh1, $moh1) = explode(':', $stopf);
 list($opi2, $mpi2) = explode(':', $starti2);
 list($ooi2, $moi2) = explode(':', $stopi2);
 list($oph2, $mph2) = explode(':', $startf2);
 list($ooh2, $moh2) = explode(':', $stopf2);
 $mysqli->query("UPDATE irigare SET OraPornireIrigare='$opi1', MinutPornireIrigare='$mpi1', OraOprireIrigare='$ooi1', MinutOprireIrigare='$moi1', OraPornireHrana='$oph1', MinutPornireHrana='$mph1', OraOprireHrana='$ooh1', MinutOprireHrana='$moh1', OraPornireIrigare2='$opi2', MinutPornireIrigare2='$mpi2', OraOprireIrigare2='$ooi2',  MinutOprireIrigare2='$moi2', OraPornireHrana2='$oph2', MinutPornireHrana2='$mph2', OraOprireHrana2='$ooh2', MinutOprireHrana2='$moh2' WHERE id = 6");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona6");
 header("Location: home.php");
}

if (isset($_POST['ir6t1en']))
{
 $mysqli->query("UPDATE irigare SET activi1=1 WHERE id=6");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona6");
 header("Location: home.php");
}

if (isset($_GET['ir6t1di']))
{
 $mysqli->query("UPDATE irigare SET activi1=0 , activh1=0 WHERE id=6");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona6");
 header("Location: home.php");
}

if (isset($_POST['ir6h1en']))
{
 $mysqli->query("UPDATE irigare SET activh1=1 , activi1=1 WHERE id=6");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona6");
 header("Location: home.php");
}
if (isset($_GET['ir6h1di']))
{
 $mysqli->query("UPDATE irigare SET activh1=0 WHERE id=6");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona6");
 header("Location: home.php");
}

if (isset($_POST['ir6t2en']))
{
 $mysqli->query("UPDATE irigare SET activi2=1 WHERE id=6");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona6");
 header("Location: home.php");
}

if (isset($_GET['ir6t2di']))
{
 $mysqli->query("UPDATE irigare SET activi2=0 , activh2=0 WHERE id=6");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona6");
 header("Location: home.php");
}

if (isset($_POST['ir6h2en']))
{
 $mysqli->query("UPDATE irigare SET activh2=1 , activi2=1 WHERE id=6");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona6");
 header("Location: home.php");
}
if (isset($_GET['ir6h2di']))
{
 $mysqli->query("UPDATE irigare SET activh2=0  WHERE id=6");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"Zona6");
 header("Location: home.php");
}

if (isset($_POST['ventenable']))
{
 $mysqli->query("UPDATE auxiliary SET enablevent=1 WHERE 1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"auxFan");
 header("Location: home.php");
}

if (isset($_GET['ventdisable']))
{
 $mysqli->query("UPDATE auxiliary SET enablevent=0 WHERE 1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"auxFan");
 header("Location: home.php");
}
if (isset($_POST['heatenable']))
{
 $mysqli->query("UPDATE auxiliary SET enableheat=1 WHERE 1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"auxFan");
 header("Location: home.php");
}

if (isset($_GET['heatdisable']))
{
 $mysqli->query("UPDATE auxiliary SET enableheat=0 WHERE 1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"auxFan");
 header("Location: home.php");
}
if (isset($_POST['lightenable']))
{
 $mysqli->query("UPDATE auxiliary SET enablelight=1 WHERE 1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"auxFan");
 header("Location: home.php");
}

if (isset($_GET['lightdisable']))
{
 $mysqli->query("UPDATE auxiliary SET enablelight=0 WHERE 1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"auxFan");
 header("Location: home.php");
}
if (isset($_POST['humienable']))
{
 $mysqli->query("UPDATE auxiliary SET enableHumi=1 WHERE 1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"auxFan");
 header("Location: home.php");
}

if (isset($_GET['humidisable']))
{
 $mysqli->query("UPDATE auxiliary SET enableHumi=0 WHERE 1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"auxFan");
 header("Location: home.php");
}

if (isset($_POST['btn-vent']))
{
 $svent =  $mysqli->real_escape_string($_POST['startTvent']);
 $stvent = $mysqli->real_escape_string($_POST['stopTvent']);
 $mysqli->query("UPDATE auxiliary SET startVent='$svent', stopVent='$stvent' WHERE 1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"auxVent");
 header("Location: home.php");
}
if (isset($_POST['btn-heat']))
{
 $sheat =  $mysqli->real_escape_string($_POST['startTheat']);
 $stheat = $mysqli->real_escape_string($_POST['stopTheat']);
 $eheat = $mysqli->real_escape_string($_POST['enableHeatS']);
 $sluxh = $mysqli->real_escape_string($_POST['startLux']);
 $stluxh = $mysqli->real_escape_string($_POST['stopLux']);
 $mysqli->query("UPDATE auxiliary SET startHeat='$sheat', stopHeat='$stheat', enabledaynight='$eheat', dayLux='$sluxh', nightLux='$stluxh' WHERE 1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"auxVent");
 header("Location: home.php");
}
if (isset($_POST['btn-light']))
{
 $slight =  $mysqli->real_escape_string($_POST['startLight']);
 $stlight = $mysqli->real_escape_string($_POST['stopLight']);
 $mysqli->query("UPDATE auxiliary SET startLightTime='$slight', stopLightTime='$stlight' WHERE 1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"auxVent");
 header("Location: home.php");
}
if (isset($_POST['btn-humi']))
{
 $shumi =  $mysqli->real_escape_string($_POST['sHumi']);
 $sthumi = $mysqli->real_escape_string($_POST['stHumi']);
 $mysqli->query("UPDATE auxiliary SET startHumi='$shumi', stopHumi='$sthumi' WHERE 1");
 $address="127.0.0.1";
 $port="3333";
 $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Nu ma pot conecta la server");
 socket_connect($sock,$address,$port) or print("Nu pot efectua conectarea la serverul de date");
 socket_write($sock,"auxVent");
 header("Location: home.php");
}

?>

