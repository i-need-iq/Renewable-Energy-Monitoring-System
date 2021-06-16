<?php
$id=$_SESSION['pid'];
$latitude=0;
$latitude=0;
$count=0;
$conn=new mysqli("localhost","root","","renewable_energy_monitoring");
$viewInsQuerySolar="SELECT installations.Latitude,installations.Longitude FROM user,installations where installations.D_ID=user.D_ID and user.P_ID='$id'";
$resultOfviewInsQuerySolar= mysqli_query($conn,$viewInsQuerySolar);
if(mysqli_num_rows($resultOfviewInsQuerySolar)>0):?>
<?php $row=mysqli_fetch_all($resultOfviewInsQuerySolar,MYSQLI_ASSOC); $count=1;?>
<?php endif ?>
