$('#demo-htmlselect').ddslick({

  onSelected: function(selectedData){
    document.getElementById("networkName").value = selectedData.selectedData.value;
    //callback function: do something with selectedData;
  /*  if(selectedData.selectedIndex > 0) {
      showIPSettingButton(selectedData.selectedData.text);
    } else {
        document.getElementById("ipsetting").style.display = "none";
    }*/
  }
});
