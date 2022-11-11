function openTab(evt, itemid) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(itemid).style.display = "block";
  evt.currentTarget.className += " active";
}

function openWifiTab(evt, itemid) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(itemid).style.display = "block";
  evt.currentTarget.className += " active";
  open(itemid, "wifilist.php");
}

function openSubTab(evt, itemid) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("subtabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("subtablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  if(itemid != "dhcp") {
    document.getElementById(itemid).style.display = "block";
  }
  evt.currentTarget.className += " active";
}
/*
$(document).ready(function() {
  $('.side-nav li').click(() => {
    //$('.side-nav').sidenav('close');
  })
});
*/
function close_nav() {
  //document.getElementById("mobile-demo").setAttribute("transform","0");
  $("#mobile-demo").css("transform","translateX(-100%)");
  //document.getElementById("sidenav-overlay").style.display = "none";
  //$("#sidenav-overlay").remove();
}

function open_nav() {
  //document.getElementById("mobile-demo").style.display = "block";
  //$("#mobile-demo").css("transform","-100%");
}



/*
$(window).scroll(function (event) {
  //$(".box").scrollTop($(".box").scrollTop() - 100);
  $("#network").scrollTop($("#network").scrollTop() - 10);
  $("#system").scrollTop($("#system").scrollTop() - 10);
  $("#user").scrollTop($("#user").scrollTop() - 10);

});
*/
$(".nav-wrapper a").click(function(){
  var box = $(".box");
  box.css("padding-top","0px");
  box.css("display","none");
  var id = $(this).attr("href");
  //if($(id).height() > 300 && window.innerWidth < 1000) {
  if($(id).height() > 300) {
    $(id).css("padding-top","70px");
  }

  $(id).css("display","block");
  $("#mobile-demo").css("transform","translateX(-100%)");
  $("#mobile-demo").css("display","none");
  $("body").css("overflow","auto");
  $("#sidenav-overlay").css("opacity","0");
  $(".drag-target").click();
});

$(".button-collapse").click(function() {
  $("#mobile-demo").css("display","block");
});

if(window.innerWidth < 1000) {
  $(".side-nav").css("width","30%");
  $(".button-collapse").click();
}

window.addEventListener("resize", doSomething);

function doSomething() {

}


// Show IP setting button
function showIPSettingButton(selectedNetworkName) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ipsetting").style.display = "block";
            //document.getElementById("networkName").innerHTML = this.responseText;
            document.getElementById("networkName").innerHTML = selectedNetworkName;
        }
    };
    xmlhttp.open("GET", "ipsetting.php?n="+selectedNetworkName, true);
    xmlhttp.send();

}

function save(url) {
  console.log(url);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function(e) {
    alert("Saved Successfully!");
    //alert(url);
    console.log(xmlhttp.response);
  };
  xmlhttp.onerror= function(e) {
      alert("Error fetching " + url);
  };
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}

function open(itemid, url) {
  document.getElementById('load').style.visibility="visible";
  console.log(url);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function(e) {
    //alert("Saved Successfully!");
    //alert(url);
    //console.log(xmlhttp.response);
    document.getElementById(itemid).innerHTML = xmlhttp.response;
    $.getScript("rev2.js");
    document.getElementById('load').style.visibility="hidden";
  };
  xmlhttp.onerror= function(e) {
      alert("Error fetching " + url);
  };
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}

// Save IP settings
function saveIPSettings() {
  var ssid = document.getElementById("networkName").value;
  var ip = document.getElementById("ip-address").value;
  var subnet = document.getElementById("subnet-prefix-len").value;
  var gateway = document.getElementById("gateway").value;
  var prefDNS = document.getElementById("pref-dns").value;
  var alterDNS = document.getElementById("alter-dns").value;
  //var url = "saveipsetting.php?ssid="+ssid+"&ip="+ip+"&subnet="+subnet+"&gateway="+gateway+"&prefDNS="+prefDNS+"&alterDNS="+alterDNS;
  var url = "save.php?savetype=saveipsetting&ssid="+ssid+"&ip="+ip+"&subnet="+subnet+"&gateway="+gateway+"&prefDNS="+prefDNS+"&alterDNS="+alterDNS;


  save(url);
}

function submit_() {
  var ssid = document.getElementById("networkName").value;
  var password = document.getElementById("password").value;
  var country = document.getElementById("country").value;
  //var url = "submitnetwork.php?network="+network+"&password="+password;
  var url;
  if (document.getElementById('static').style.display == "block") {
    var ip = document.getElementById("ip_address").value;
    var subnet = document.getElementById("subnet_prefix_len").value;
    var gateway = document.getElementById("gateway").value;
    var prefDNS = document.getElementById("pref_dns").value;
    var alterDNS = document.getElementById("alter_dns").value;
    //var url = "saveipsetting.php?ssid="+ssid+"&ip="+ip+"&subnet="+subnet+"&gateway="+gateway+"&prefDNS="+prefDNS+"&alterDNS="+alterDNS;
    url = "save.php?savetype=wifi_static&ssid="+ssid+"&password="+password+"&ip="+ip+"&subnet="+subnet+"&gateway="+gateway+"&prefDNS="+prefDNS+"&alterDNS="+alterDNS+"&country="+country;
  } else {
    url = "save.php?savetype=wifi_dhcp&ssid="+ssid+"&password="+password+"&country="+country;
  }

  save(url);
}

function save_ap() {
  var ap_name = document.getElementById("ap_name").value;
  var ap_password = document.getElementById("ap_password").value;
  var url = "save.php?savetype=save_ap&ssid="+ap_name+"&password="+ap_password;

  save(url);
}


function save_radio() {

  document.getElementById("master").checked ? master = 1 : master = 0;
  var radio_channel = document.getElementById("radio_channel").value;
  var radio_id = document.getElementById("radio_id").value;
  var radio_password = document.getElementById("radio_password").value;

  var url = `save.php?savetype=save_radio&master=${master}&radio_channel=${radio_channel}&radio_id=${radio_id}&radio_password=${radio_password}`;

  save(url);
}

function save_system_settings() {
  var irrigation = getSelected('irrigationoption');
  var temp = getSelected('tempoption');
  var geopos = getSelected('geooption');
  var windspeed = getSelected('speedoption');

  var url = "save.php?savetype=save_system_settings&irrigation="+irrigation+"&temp="+temp+"&geopos="+geopos+"&windspeed="+windspeed;

  save(url);
}

function getSelected(optionName) {
  var options = document.getElementsByName(optionName);
  for(i = 0; i < options.length; i++) {
    if(options[i].checked) {
      return options[i].value;
      break;
    }
  }
  return 0;
}

function save_sensor_settings() {
  var tsensor = getSelected('tsensoroption');
  var wsensor = getSelected('wsensoroption');
  var lsensor = getSelected('lsensoroption');
  var na = getSelected('nasensoroption');
  var na1 = getSelected('na1sensoroption');
  var na2 = getSelected('na2sensoroption');

  var url = "save.php?savetype=save_sensor_settings&tsensor="+tsensor+"&wsensor="+wsensor+"&lsensor="+lsensor+"&na="+na+"&na1="+na1+"&na2="+na2;

  save(url);
}

function set_timezone() {
  var timezone_sel = document.getElementById('timezone');
  var timezone = timezone_sel.options[timezone_sel.selectedIndex].innerHTML;
  var url = "save.php?savetype=set_timezone&timezone="+timezone;

  save(url);
}
