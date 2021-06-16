<?php
session_start();
$firstname="";
$lastname="";
$mail="";
$phnumber="";
$dob="";
$pwd="";
$errors = array();
$confirmpwd="";
$P_ID=0;
$D_ID=0;
$Pmax=0;
$Effi= 0;
$ratedEff= 0;
$output=0;
$maxoutput=0;
$state=0;
//solar
$type='';
$area='';
$intensity=0;
//wind
$direction='';
$speed=0;
//GeoThermal
$depth=0;
$temperature=0;
//Getting from Registrationform
if(isset($_POST['RegisterClicked']))
{
$firstname=filter_input(INPUT_POST,'firstname');
$lastname=$_POST['lastname'];
$mail=$_POST['mail'];
$phnumber=$_POST['phnumber'];
$dob=$_POST['dob'];
$pwd=$_POST['pwd'];
$confirmpwd=$_POST['confirmpwd'];
//validation check
if(empty($firstname)){
  array_push($errors,"FirstName is required");
}
if(empty($lastname)){
  array_push($errors,"LastName is required");
}

if(empty($mail)){
  array_push($errors,"Email is required");
}

if(empty($phnumber)){
  array_push($errors,"PhoneNumber is required");
}
if($phnumber<6000000000){
  array_push($errors,"Enter a valid PhoneNumber");
}

if(empty($dob)){
  array_push($errors,"DateofBirth is required");
}


if(($pwd!=$confirmpwd)){
  array_push($errors,"The passwords Doesn't match");
}
//Database connection
if(count($errors)==0)
{
  $conn=new mysqli("localhost","root","","renewable_energy_monitoring");
if(mysqli_connect_error()){
  die('ConnectError('.mysqli_connect_errno().')');
}
else{
    $select="SELECT person_id from Person";
    if ($result=mysqli_query($conn,$select))
      {
        $rowcount=mysqli_num_rows($result);
        mysqli_data_seek($result,$rowcount-1);
        $row=mysqli_fetch_row($result);

        $P_ID=$row[0]+1;
         mysqli_free_result($result);
    }
    $sql="INSERT INTO Person
    values('$P_ID','$firstname','$lastname','$dob',NULL,NULL,NULL,NULL,'$mail')";
     $sql2="INSERT INTO Manager
     values('$P_ID',NULL,'$pwd',NULL)";
    $sql1="INSERT INTO Person_Phone_details values('$P_ID','$phnumber')";

    if($result=$conn->query($sql)){
      $_SESSION['pid']=$P_ID;
      $_SESSION['success']="Welcome";
      header('location: Homepage.php');
        }
        else{
          echo "Error".$sql;
        }
}
$conn->query($sql1);
$conn->query($sql2);
$conn->close();
}
}
//Getting from loginform
if(!(isset($_POST['Adminsscheckbox'])) and !(isset($_POST['Usersscheckbox'])) and isset($_POST['userlogin'])){
  array_push($errors,"User Login or Manager Login");
}
if(isset($_POST['userlogin']) and isset($_POST['Usersscheckbox']))
{
$pwd=$_POST['pwd'];
//validation check
if(empty($pwd)){
  array_push($errors,"Password is required");
}
//Database connection
if(count($errors)==0)
{
  $conn=mysqli_connect("localhost","root","","renewable_energy_monitoring");
if(mysqli_connect_error()){
  die('ConnectError('.mysqli_connect_errno().')');
}
else{
    $query="SELECT * FROM Manager WHERE Password='$pwd'";
    $result= mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
      $row=mysqli_fetch_row($result);
      $P_ID=$row[0];
      $_SESSION['pid']=$P_ID;
      $_SESSION['success']="Welcome";
      header('location: Homepage.php');
    }
    else{
      array_push($errors,"The ID/password combination is wrong");
    }

}
mysqli_close($conn);
}
}
//Manager login
if(isset($_POST['userlogin']) and isset($_POST['Adminsscheckbox']))
{
$pwd=$_POST['pwd'];
//validation check
if(empty($pwd)){
  array_push($errors,"Password is required");
}
//Database connection
if(count($errors)==0)
{
  $_SESSION['success']="Welcome";
  header('location: admin.php');
}
}

//Installation form
//echo rand(10,20);


if(isset($_POST['CreateInstallationSubmit'])){
  $now = new DateTime();
  $dtB = new DateTime();
  $strdate=$dtB->format('Y-m-d');
  $errors = array();

 
  if($_POST['typeSelect']=='Solar' and $_POST['area']<0){
    array_push($errors,"Area entered is invalid");
  }
  if($_POST['typeSelect']=='GeoThermal' and $_POST['geoDepth']<0){
    array_push($errors,"Depth entered is invalid");
  }

if(count($errors)==0){

  $conn=mysqli_connect("localhost","root","","renewable_energy_monitoring");
  $select="SELECT plant_id from Plant";
  if ($result=mysqli_query($conn,$select))
    {
      $rowcount=mysqli_num_rows($result);
      mysqli_data_seek($result,$rowcount-1);
      $row=mysqli_fetch_row($result);
      $D_ID=$row[0]+1;
       mysqli_free_result($result);
    }
    //UID
    $selectuser="SELECT person_id from User";
    if ($resultuser=mysqli_query($conn,$selectuser))
      {
        $rowcountuser=mysqli_num_rows($resultuser);
        mysqli_data_seek($resultuser,$rowcountuser-1);
        $rowuser=mysqli_fetch_row($resultuser);
        $U_ID=$rowuser[0]+1;
         mysqli_free_result($resultuser);
      }

    $serviceDue='';
//solar
    if(isset($_POST['typeSelect'])and $_POST['typeSelect']=='Solar'){
      $Pmax= rand(250,300);
      $ratedEff= rand(15,20)/100;
      $Effi=rand(15,$ratedEff)/100;
      $output=rand(250,$Pmax);
      $maxoutput=$output;
      $state=0;
      $insertInstallation="INSERT into PLant values('$D_ID',NULL,NULL,NULL)";
      $insertInstallation1="INSERT into Solar_Plant values('$D_ID',200,74,56,400)";
      $insertInstallation2="INSERT into Power_Output values('$D_ID','$ratedEff','$output','$Effi')";
      $result=mysqli_query($conn,$insertInstallation);
      $result1=mysqli_query($conn,$insertInstallation1);
      $result2=mysqli_query($conn,$insertInstallation2);
      $selectSolar="SELECT plant_id from Solar_Plant";
      $resultSolar=mysqli_query($conn,$selectSolar);
      if ($resultSolar=mysqli_query($conn,$selectSolar))
        {
          $rowcountSolar=mysqli_num_rows($resultSolar);
          mysqli_data_seek($resultSolar,$rowcountSolar-1);
          $rowSolar=mysqli_fetch_row($resultSolar);

          $S_ID=$rowSolar[0]+1;
           mysqli_free_result($resultSolar);
        }
        $type=$_POST['SolarinstallationType'];
        $intensity=200;
        $cost=$area * 5000;
        $P_ID=$_SESSION['pid'];


}
//wind
if(isset($_POST['typeSelect'])and $_POST['typeSelect']=='Wind'){
  $Pmax= rand(2500,3000);
  $ratedEff= rand(35,50)/100;
  $Effi= rand(0.35,$ratedEff);
  $output=rand(2500,$Pmax);
  $maxoutput=$output;
  $state=0;
  $insertInstallation="INSERT into Plant values('$D_ID',NULL,NULL,NULL)";
  $insertInstallation1="INSERT into Wind_Plant values('$D_ID',NULL,200,74,56)";
  $insertInstallation2="INSERT into Power_Output values('$D_ID','$ratedEff','$output','$Effi')";
  $result=mysqli_query($conn,$insertInstallation);
  $result1=mysqli_query($conn,$insertInstallation1);
  $result2=mysqli_query($conn,$insertInstallation2);

  $selectWind="SELECT plant_id from Wind_Plant";
  $resultWind=mysqli_query($conn,$selectSolar);
  if ($resultWind=mysqli_query($conn,$selectWind))
    {
      $rowcountWind=mysqli_num_rows($resultWind);
      mysqli_data_seek($resultWind,$rowcountWind-1);
      $rowWind=mysqli_fetch_row($resultWind);

      $W_ID=$rowWind[0]+1;
       mysqli_free_result($resultWind);
    }
    $type=$_POST['WindinstallationType'];
    $directionVal=rand(0,360);
    $direction=$directionVal;
    $speed=rand(7.00,13);

    $custType=$_POST['typeOfCustomer'];
    $cost=2350000;
    $P_ID=$_SESSION['pid'];

    $insertWind="INSERT into Wind_Info
    values('$W_ID','$speed','$direction',240)";
    $resultWind=mysqli_query($conn,$insertWind);

}
//geothermal
if(isset($_POST['typeSelect'])and $_POST['typeSelect']=='GeoThermal'){
  $Pmax= rand(30000,50000);
  $ratedEff= rand(10,23)/100;
  $Effi= rand(1,$ratedEff)/100;
  $output=rand(30,$Pmax);
  $maxoutput=$output;
  $state=0;
  $insertInstallation="INSERT into Plant values('$D_ID',NULL,NULL,NULL)";
  $insertInstallation1="INSERT into Geothermal_Plant values('$D_ID',200,74)";
  $insertInstallation2="INSERT into Power_Output values('$D_ID','$ratedEff','$output','$Effi')";
  $result=mysqli_query($conn,$insertInstallation);
  $result1=mysqli_query($conn,$insertInstallation1);
  $result2=mysqli_query($conn,$insertInstallation2);
  $selectGeo="SELECT plant_id from Geothermal_Plant";
  $resultGeo=mysqli_query($conn,$selectGeo);
  if ($resultGeo=mysqli_query($conn,$selectGeo))
    {
      $rowcountGeo=mysqli_num_rows($resultGeo);
      mysqli_data_seek($resultGeo,$rowcountGeo-1);
      $rowGeo=mysqli_fetch_row($resultGeo);

      $G_ID=$rowGeo[0]+1;
       mysqli_free_result($resultGeo);
    }
    $depth=$_POST['geoDepth'];

    $temperature=rand(95,120);

    $custType=$_POST['typeOfCustomer'];
    $cost=3350000;
    $P_ID=$_SESSION['pid'];

   
}

mysqli_close($conn);
}
}
//Logout
if(isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['username']);
  header('location:registerhtml.php');
}

?>
