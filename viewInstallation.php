<div class="viewInstallationPHP">
  <div class="InstDetailsHeader">
    <center><p>PLANT_ID</p></center>
    <center><p>RESOURCE</p></center>
    <center><p>TYPE</p></center>
    <center><p>ANALYSIS</p></center>
  </div>
<?php $id=1001;
$conn=mysqli_connect("localhost","root","","renewable_energy_monitoring");
$viewInsQuerySolar="SELECT Plant.plant_id,Solar_plant.battery_percentage FROM Plant,Solar_Plant where Plant.plant_id=Solar_Plant.plant_id and Plant.plant_id=1002";
$viewInsQueryWind="SELECT Plant.plant_id,Wind_Plant.rotor_diameter FROM Plant,Wind_Plant WHERE Plant.plant_id=Wind_Plant.plant_id and Plant.plant_id=1001";
$viewInsQueryGeo="SELECT Plant.plant_id,Geothermal_Plant.core_max_temperature FROM Plant,Geothermal_Plant WHERE Plant.plant_id=Geothermal_Plant.plant_id and Plant.plant_id=1003";
$resultOfviewInsQuerySolar= mysqli_query($conn,$viewInsQuerySolar);
$resultOfviewInsQueryWind= mysqli_query($conn,$viewInsQueryWind);
$resultOfviewInsQueryGeo= mysqli_query($conn,$viewInsQueryGeo);
if(mysqli_num_rows($resultOfviewInsQuerySolar)>0):?>
<?php while($row=mysqli_fetch_row($resultOfviewInsQuerySolar)): ?>

<div class="InstDetails">
  <center><p><?php echo $row[0];?></center>
  <img src="sol.jpg" object-fit="cover">
  <center><p><?php echo $row[1];?></center>
  <center><a href="installationDetailsPage.php?d_id=<?php echo $row[0]?>& type=solar">Check me for Overview And Analysis</a></center>
</div>
<?php endwhile ?>
<?php endif ?>
<?php if(mysqli_num_rows($resultOfviewInsQueryWind)>0):?>
  <?php while($row=mysqli_fetch_row($resultOfviewInsQueryWind)): ?>
<div class="InstDetails">
  <center><p><?php echo $row[0];?></center>
  <img src="windmill.jpg" object-fit="cover">
  <center><p><?php echo $row[1];?></center>
  <center><a href="installationDetailsPage.php?d_id=<?php echo $row[0]?>& type=wind">Check me for Overview And Analysis</a></center>
</div>
<?php endwhile ?>
<?php endif ?>
<?php if(mysqli_num_rows($resultOfviewInsQueryGeo)>0):?>
  <?php while($row=mysqli_fetch_row($resultOfviewInsQueryGeo)): ?>
<div class="InstDetails">
  <center><p><?php echo $row[0];?></center>
  <img src="geoth.jpg" object-fit="cover">
  <center><p><?php echo $row[1];?></center>
  <center><a href="installationDetailsPage.php?d_id=<?php echo $row[0]?>& type=geothermal">Check me for Overview And Analysis</a></center>
</div>
<?php endwhile ?>
<?php endif ?>

<?php mysqli_close($conn); ?>
