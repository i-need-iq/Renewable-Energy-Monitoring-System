<?php
  require_once 'connection1.php';
?>	

  <head>
  <style>
    body {
      font-size:13px;
      font-family: arial, sans-serif;
    }
    @page {
                margin: 0cm 0cm;
          }

    body {
                margin-top: 2cm;
                margin-bottom: 2cm;
                margin-left:1cm;
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
            }
    table {
      border-collapse: collapse;
      margin-top:10px;
      margin-left:3px;
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
    .table-content{
      align-items:center;
      justify-content:center;
      margin-left:3cm;
    }
  </style>
  </head>
<body>
    <header>
      <h1>Renewable Energy Monitoring System</h1>
    </header>
    <br>
    <h2>User Details</h2>
    <div class="table-content">
    <table class="center">
        <thead>
          <tr>
                <th scope="col">U_ID</th>
                <th scope="col">Type</th>
                <th scope="col">Cost</th>
                <th scope="col">P_ID</th>
                <th scope="col">D_ID</th>
          </tr>
        </thead>
        <tbody>
        <?php
                  $sql = "SELECT * FROM user";
                  $result = mysqli_query($conn, $sql);

                  if($result)
                  {
                  while($row = mysqli_fetch_assoc($result)){
                  ?>
                  <tr>
                    <td><?php echo $row['U_ID'] ?></td>
                    <td><?php echo $row['Type']; ?></td>
                    <td><?php echo $row['Cost']; ?></td>
                    <td><?php echo $row['P_ID']; ?></td>
                    <td><?php echo $row['D_ID']; ?></td>
                  </tr>
                  <?php
                  }
                  }else{
                  echo "<script> alert('No Record Found');</script>";
                  }
                  ?>
                                  
        </tbody>
    </table>
    </div>

</body>

