console.log("HI here");
//<?php include('registerServer.php'); ?>;
function createinstallationbutton(){
  console.log(1234567);
  const installationform=document.querySelector('.installationform');
  installationform.style.display="grid";
  const viewinstallationform=document.querySelector('.viewinstallation');
  viewinstallationform.style.display="none";
}
function viewinstallationbutton(){
  console.log(1234567);
  const viewinstallationform=document.querySelector('.viewinstallation');
  viewinstallationform.style.display="grid";
  const installationform=document.querySelector('.installationform');
  installationform.style.display="none";
}

function onselecttype(){
  const solarDetails=document.querySelector('.solarDetails');
  const windDetails=document.querySelector('.WindDetails');
  const geothermalDetails=document.querySelector('.geothermalDetails');
  var selectBox = document.getElementById("selectBox");
  var selectedValue = selectBox.options[selectBox.selectedIndex].value;

  if(selectedValue=='Wind'){
    solarDetails.style.display="none";
    windDetails.style.display="block";
    geothermalDetails.style.display="none";
  }
  if(selectedValue=='Solar'){
    solarDetails.style.display="block";
    windDetails.style.display="none";
    geothermalDetails.style.display="none";

  }
  if(selectedValue=='GeoThermal'){
    solarDetails.style.display="none";
    windDetails.style.display="none";
    geothermalDetails.style.display="block";
  }
}
