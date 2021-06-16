<?php include('registerServer.php') ?>
<?php $device_id=$_GET['d_id'];
$device_type= $_GET['type'];
?>



<html>
<head>
  <meta charset="utf-8">
  <title>Details Of Installation</title>
  <link rel="stylesheet" type="text/css" href="projectdbms1.css">
  <link rel="stylesheet" type="text/css" href="installationDetailsPage.css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
window.onload = function() {
      var dataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;
      console.log(dataPoints);
      /*var msg = new SpeechSynthesisUtterance();
      msg.text = "Good Morning";
      window.speechSynthesis.speak(msg);*/
      var chart = new CanvasJS.Chart("curve_chart", {
      theme: "light2",
      title: {
        text: "Live Performance Graph"
      },
      axisX:{
        title: "Time"
      },
      axisY:{
        suffix: " Watts"
      },
      data: [{
        type: "line",
        yValueFormatString: "#,##0.0#",
        toolTipContent: "{y} W",
        dataPoints: dataPoints
      }]
      });
      chart.render();

      var updateInterval = 15000;
      setInterval(function () { updateChart() }, updateInterval);

      var xValue = dataPoints.length;
      var graphPoints=<?php echo json_encode($Livepoints, JSON_NUMERIC_CHECK); ?>;
      var ptr=0;
      function updateChart() {
        var colorP;
        var yValue;
        console.log(graphPoints);
        yValue=graphPoints[ptr].y;
        console.log(yValue);
        colorP=graphPoints[ptr].color;
        dataPoints.push({ x: xValue, y: yValue,color: colorP });
        xValue++;
        ptr++;
        chart.render();
        if(colorP=="red"){
          var msg = new SpeechSynthesisUtterance();
          msg.text = "The Output is above the maximum power so that it might lead to a danger";
          window.speechSynthesis.speak(msg);
        }

      };
      document.getElementById("exportChart").addEventListener("click",function(){
         chart.exportChart({format: "jpg"});
       });


      var count=<?php echo count($HistoryPoints);?>;
      console.log(count);

        var date="<?php echo $HistoryDate;?>";
        if(count>0){
      var historyPoints = <?php echo json_encode($HistoryPoints, JSON_NUMERIC_CHECK); ?>;
      console.log(historyPoints);
      var historychart = new CanvasJS.Chart("chartContainer", {
      theme: "light2",
      title: {
        text: "Performance Graph on "+ date
      },
      axisX:{
        title: "Time"
      },
      axisY:{
        suffix: " Watts"
      },
      data: [{
        type: "line",
        yValueFormatString: "#####",
        toolTipContent: "{y} W",
        dataPoints: historyPoints
      }]
      });
      historychart.render();
      var msg = new SpeechSynthesisUtterance();
      msg.text = "Performance History of"+date+"can be Viewed";
      window.speechSynthesis.speak(msg);
      document.getElementById("exportHistoryChart").addEventListener("click",function(){
         historychart.exportChart({format: "jpg"});
       });
       var g=document.querySelector('.historyGraphLog');
       g.style.marginTop="50px";
       var o=document.querySelector('.Overviewsecond');
       o.style.height="700px";
      }
      else if(count==0 && date.length>0){
      var g=document.querySelector('.historyGraphLog');
      g.style.display="none";
      alert('No history available');
      }
    }
</script>
</head>
<body>

<div class="homepage">
  <header>
    <img src="homepage.png" alt="my image" class="headerImg">

    <?php if(isset($_SESSION['success'])): ?>
      <?php unset($_SESSION['success']);?>
    <?php endif ?>
    <div>
    </div>
    <div class="navbar">
      <a href="Homepage.php">Home</a>
      <a href="installations.php">Installations</a>
      <div class="dropdown">
        <?php if(isset($_SESSION['username'])): ?>
            <button class="dropbtn">
                Welcome <strong><?php echo $_SESSION['username'];?></strong>
                <i class="fa fa-caret-down"></i>
            </button>
        <?php endif ?>
        <div class="dropdown-content">
          <a href="Homepage.php?logout='1'">Logout</a>
        </div>
    </div>
    </div>
    <br><br><br>
  </header>

  <section>
    <div class="bodyOfOverview">
    <?php if($device_type=="solar"):?>
      <?php $conn=mysqli_connect("localhost","root","","renewable_energy_monitoring");
      $sqlPowerEff="SELECT max_temperature,cell_efficiency from Solar_Plant WHERE plant_id='$device_id'";
      $resultsqlPowerEff=mysqli_query($conn,$sqlPowerEff);
      $rowsqlPowerEff=mysqli_fetch_row($resultsqlPowerEff);?>
    <div class="Overviewfirst">
      <div class="PlantOverview">
        <u><h3>PLANT OVERVIEW</h3></u><br>
        <li>Max Temperature:<?php echo $rowsqlPowerEff[0];?></li>
        <li>Cell Efficiency:<?php echo $rowsqlPowerEff[1];?></li>
      </div>
      <div class="Graph">
        <div id="curve_chart" STYLE="height:300px;"></div>
        <button id="exportChart">Export Chart</button>
      </div>
    </div>
    <div class="Overviewsecond">
    <?php
     
     $dataPoints = array();
     $y = 100;
     for($i = 0; $i < 10; $i++){
       $y += rand(-1, 1) * 0.1; 
       array_push($dataPoints, array("x" => $i, "y" => $y));
     }
      
     ?>
     <!DOCTYPE HTML>
     <html>
     <head>
     <script>
     window.onload = function() {
      
     var dataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;
      
     var chart = new CanvasJS.Chart("chartContainer", {
       theme: "light2",
       title: {
         text: "Live Power Output"
       },
       axisX:{
         title: "Time in minutes"
       },
       axisY:{
         suffix: " W"
       },
       data: [{
         type: "line",
         yValueFormatString: "#,##0.0#",
         toolTipContent: "{y} W",
         dataPoints: dataPoints
       }]
     });
     chart.render();
      
     var updateInterval = 5000;
     setInterval(function () { updateChart() }, updateInterval);
      
     var xValue = dataPoints.length;
     var yValue = dataPoints[dataPoints.length - 1].y;
      
     function updateChart() {
       yValue += (Math.random() - 0.5) * 0.1;
       dataPoints.push({ x: xValue, y: yValue });
       xValue++;
       chart.render();
     };
      
     }
     </script>
     </head>
     <body>
     <div id="chartContainer" style="height: 370px; width: 100%;"></div>
     <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
     </body>
     </html>   
    </div>
  <?php mysqli_close($conn);endif ?>

  <?php if($device_type=="wind"): ?>
    <?php $conn=mysqli_connect("localhost","root","","renewable_energy_monitoring");
    $sqlspeedType="SELECT wind_speed,air_density from Wind_Info WHERE plant_id='$device_id'";
    $resultsqlSpeedType=mysqli_query($conn,$sqlspeedType);
    $rowsqlSpeedType=mysqli_fetch_row($resultsqlSpeedType);
    $sqlPowerEff="SELECT max_wind_speed,rotor_diameter from Wind_Plant WHERE plant_id='$device_id'";
    $resultsqlPowerEff=mysqli_query($conn,$sqlPowerEff);
    $rowsqlPowerEff=mysqli_fetch_row($resultsqlPowerEff);?>
  <div class="Overviewfirst">
    <div class="PlantOverview">
      <u><h3>PLANT OVERVIEW</h3></u><br>
      <li>Max Wind Speed:<?php echo $rowsqlPowerEff[0];?></li>
      <li>Rotor Diameter:<?php echo $rowsqlPowerEff[1];?></li>
      <li>Wind Speed:<?php echo $rowsqlSpeedType[0];?></li>
      <li>Air Density:<?php echo $rowsqlSpeedType[1];?></li>
    </div>
    <div class="Graph">
      <div id="curve_chart" STYLE="height:300px;"></div>
      <button id="exportChart">Export Chart</button>
    </div>
  </div>
  <div class="Overviewsecond">
  <?php
     
     $dataPoints = array();
     $y = 100;
     for($i = 0; $i < 10; $i++){
       $y += rand(-1, 1) * 0.1; 
       array_push($dataPoints, array("x" => $i, "y" => $y));
     }
      
     ?>
     <!DOCTYPE HTML>
     <html>
     <head>
     <script>
     window.onload = function() {
      
     var dataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;
      
     var chart = new CanvasJS.Chart("chartContainer", {
       theme: "light2",
       title: {
         text: "Live Power Output"
       },
       axisX:{
         title: "Time in minutes"
       },
       axisY:{
         suffix: " W"
       },
       data: [{
         type: "line",
         yValueFormatString: "#,##0.0#",
         toolTipContent: "{y} W",
         dataPoints: dataPoints
       }]
     });
     chart.render();
      
     var updateInterval = 5000;
     setInterval(function () { updateChart() }, updateInterval);
      
     var xValue = dataPoints.length;
     var yValue = dataPoints[dataPoints.length - 1].y;
      
     function updateChart() {
       yValue += (Math.random() - 0.5) * 0.1;
       dataPoints.push({ x: xValue, y: yValue });
       xValue++;
       chart.render();
     };
      
     }
     </script>
     </head>
     <body>
     <div id="chartContainer" style="height: 370px; width: 100%;"></div>
     <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
     </body>
     </html>   
  </div>
<?php endif ?>

<?php if($device_type=="geothermal"): ?>
  <?php $conn=mysqli_connect("localhost","root","","renewable_energy_monitoring");
  $sqldepthType="SELECT core_max_temperature,core_temperature from Geothermal_Plant WHERE plant_id='$device_id'";
  $resultsqldepthType=mysqli_query($conn,$sqldepthType);
  $rowsqldepthType=mysqli_fetch_row($resultsqldepthType);
  $sqlPowerEff="SELECT threshold,current_power_out from Power_Output WHERE plant_id='$device_id'";
  $resultsqlPowerEff=mysqli_query($conn,$sqlPowerEff);
  $rowsqlPowerEff=mysqli_fetch_row($resultsqlPowerEff);?>
<div class="Overviewfirst">
  <div class="PlantOverview">
    <u><h3>PLANT OVERVIEW</h3></u><br>
    <li>Threshold:<?php echo $rowsqlPowerEff[0];?></li>
    <li>Cureent Power Output:<?php echo $rowsqlPowerEff[1];?></li>
    <li>Max Core Temperature:<?php echo $rowsqldepthType[0];?></li>
    <li>Current Core Temperature:<?php echo $rowsqldepthType[1];?></li>
  </div>
  <div class="Graph">
    <div id="curve_chart" STYLE="height:300px;"></div>
    <button id="exportChart">Export Chart</button>
  </div>
</div>
<div class="Overviewsecond">
<?php
     
     $dataPoints = array();
     $y = 100;
     for($i = 0; $i < 10; $i++){
       $y += rand(-1, 1) * 0.1; 
       array_push($dataPoints, array("x" => $i, "y" => $y));
     }
      
     ?>
     <!DOCTYPE HTML>
     <html>
     <head>
     <script>
     window.onload = function() {
      
     var dataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;
      
     var chart = new CanvasJS.Chart("chartContainer", {
       theme: "light2",
       title: {
         text: "Live Power Output"
       },
       axisX:{
         title: "Time in minutes"
       },
       axisY:{
         suffix: " W"
       },
       data: [{
         type: "line",
         yValueFormatString: "#,##0.0#",
         toolTipContent: "{y} W",
         dataPoints: dataPoints
       }]
     });
     chart.render();
      
     var updateInterval = 5000;
     setInterval(function () { updateChart() }, updateInterval);
      
     var xValue = dataPoints.length;
     var yValue = dataPoints[dataPoints.length - 1].y;
      
     function updateChart() {
       yValue += (Math.random() - 0.5) * 0.1;
       dataPoints.push({ x: xValue, y: yValue });
       xValue++;
       chart.render();
     };
      
     }
     </script>
     </head>
     <body>
     <div id="chartContainer" style="height: 370px; width: 100%;"></div>
     <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
     </body>
     </html>   
</div>
<?php endif ?>
  </div>
  </section>

<script src="project1.js">
  </script>
</body>
</html>
