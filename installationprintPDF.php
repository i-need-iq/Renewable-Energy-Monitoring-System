<?php
  require_once 'connection1.php';
?>	

  <head>
  <style>
    body {
      font-size:11px;
      font-family: arial, sans-serif;
    }
    @page {
                margin: 0cm 0cm;
          }

    body {
                margin-top: 3cm;
                margin-bottom: 2cm;
                margin-left:1.5cm;
          }

    header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;

                background-color: rgb(214, 214, 199);
                color: Black;
                text-align: center;
                line-height: 1.5cm;
                padding-bottom:0.25cm;
                margin-bottom:1cm;
            }
    table {
      border-collapse: collapse;
      margin-top:10px;
    }
    th{
      color:#ffffff;
      background-color:#000000; 
    }
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    h1 {
      text-align:center;
    }
    tr:nth-child(even) {
      background-color: #dddddd;
    }
    td.a {
      text-align: right;
      font-weight: bold;
    }
  </style>
  </head>
<body>
    <header>
      <h1>Renewable Energy Monitoring System</h1>
    </header>
    <h2>Installation Details</h2>
  <table class="center">
        <thead>
          <tr>
          <th scope="col">Device ID</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">Install Date</th>
                <th scope="col">Last Update</th>
                <th scope="col">Service Due</th>
                <th scope="col">Output(watts)</th>
                <th scope="col">Max Output(watts)</th>
                <th scope="col">Power Max</th>
                <th scope="col">Efficiency</th>
                <th scope="col">Rated efficiency</th>
                <th scope="col">Machine State</th>
          </tr>
        </thead>
        <tbody>
        <?php
                  $sql = "SELECT * FROM installations";
                  $result = mysqli_query($conn, $sql);

                  if($result)
                  {
                  while($row = mysqli_fetch_assoc($result)){
                  ?>
                  <tr>
                    <td><?php echo $row['D_ID'] ?></td>
                    <td><?php echo $row['Latitude']; ?></td>
                    <td><?php echo $row['Longitude']; ?></td>
                    <td><?php echo $row['Install_Date']; ?></td>
                    <td><?php echo $row['Last_Maintained']; ?></td>
                    <td><?php echo $row['Service_Due']; ?></td>
                    <td><?php echo $row['Output']; ?></td>
                    <td><?php echo $row['Max_output']; ?></td>
                    <td><?php echo $row['Pmax']; ?></td>
                    <td><?php echo $row['Efficiency']; ?></td>
                    <td><?php echo $row['Rated_Efficiency']; ?></td>
                    <td><?php echo $row['Machine_State']; ?></td>
                  </tr>
                  <?php
                  }
                  }else{
                  echo "<script> alert('No Record Found');</script>";
                  }
                  ?>
                      
        </tbody>
      </table>

