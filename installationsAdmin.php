<?php 
include('registerServer.php');
include('connection1.php'); 
?>
<html lang="en">

<head>
  <title>Manager</title>
  <meta charset="utf-8" />  
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />
  <link rel="stylesheet" href="sidebar.css" />
  <link rel="stylesheet" href="adminstyle.css" />
</head>

<body>
  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary"></button>
      </div>
      <div class="bg-wrap text-center py-2">
        <div class="user-logo">
          <h2>Manager</h2>
        </div>
      </div>
      <ul class="list-unstyled components mb-5">
        <li><a href="./admin.php"><span class="fa fa-users mr-3"></span>Person Details</a></li>
        <li class="active"><a href="./installationsAdmin.php"><span class="fa fa-cogs mr-3 notif"></span>Installations</a></li>
        <li><a href="registerhtml.php"><span class="fa fa-sign-out mr-3"></span>Sign Out</a></li>
      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5 bg-secondary">

      <div class="container">
        <div>
            <button type="button" class="btn btn-warning insertBtn">Add Installation</button>
            <a href="installationpdf.php" target="_blank" id="export" type="button" class="btn btn-success">Export</a>
        </div>

        <div id="insertModal" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header bg-warning">
                <h4 class="modal-title">Installation Details</h4>
                <button type="button" class="close" data-dismiss="modal">
                  &times;
                </button>
              </div>
              <div class="modal-body">
                <div class="card card-body card-form">
                  <form action="installationops.php" method="POST">
                    
                    <div class="mt-3">
                      <label>Output (watts)</label>
                      <input class="form-control" type="number" name="output" id="output" required/>
                    </div>
                    <div class="mt-3">
                      <label>Max-Output (watts)</label>
                      <input class="form-control" type="number" name="max_output" id="max_output" required/>
                    </div>
                    <div class="mt-3">
                      <label>Power Max</label>
                      <input class="form-control" type="number" name="power_max" id="power_max" required/>
                    </div>
                    <div class="mt-3">
                      <label>Efficiency</label>
                      <input class="form-control" type="number" name="efficiency" id="efficiency" step=".01" required/>
                    </div>
                    <div class="mt-3">
                      <label>Rated Efficiency</label>
                      <input class="form-control" type="number" name="rated_eff" id="rated_eff" step=".01" required/>
                    </div>
                    <div class="mt-3">
                      <label>Machine State</label>
                      <input class="form-control" type="text" name="machine_state" id="machine_state" required />
                    </div>
                    <div class="form-action-buttons">
                      <input type="submit" name="insertData" value="Add to list" class="btn btn-primary mt-2" />
                      <input type="reset" value="Reset" class="btn btn-primary mt-2 ml-2" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="updateModal" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header bg-warning">
                <h4 class="modal-title">Installation Details</h4>
                <button type="button" class="close" data-dismiss="modal">
                  &times;
                </button>
              </div>
              <div class="modal-body">
                <div class="card card-body card-form">
                  <form action="installationops.php" method="POST">
                    <input type="hidden" name="updateId" id="updateId">
          
                    <div class="mt-3">
                      <label>Output (watts)</label>
                      <input class="form-control" type="number" name="updateoutput" id="updateoutput" required/>
                    </div>
                    <div class="mt-3">
                      <label>Max-Output (watts)</label>
                      <input class="form-control" type="number" name="updatemax_output" id="updatemax_output" required/>
                    </div>
                    <div class="mt-3">
                      <label>Power Max</label>
                      <input class="form-control" type="number" name="updatepower_max" id="updatepower_max" required/>
                    </div>
                    <div class="mt-3">
                      <label>Efficiency</label>
                      <input class="form-control" type="number" name="updateefficiency" id="updateefficiency" step=".01" required/>
                    </div>
                    <div class="mt-3">
                      <label>Rated Efficiency</label>
                      <input class="form-control" type="number" name="updaterated_eff" id="updaterated_eff" step=".01" required/>
                    </div>
                    <div class="mt-3">
                      <label>Machine State</label>
                      <input class="form-control" type="text" name="updatemachine_state" id="updatemachine_state" required />
                    </div>
                    <div class="form-action-buttons">
                      <input type="submit" name="updateData" value="Add to list" class="btn btn-primary mt-2" />
                      <input type="reset" value="Reset" class="btn btn-primary mt-2 ml-2" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div id="deleteModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="installationops.php" method="POST">

                <div class="modal-body">

                  <input type="hidden" name="deleteId" id="deleteId">

                  <h4>Are you sure want to delete?</h4>

                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary" name="deleteData">Yes</button>
              </div>

              </form>
            </div>
          </div>
        </div>

        <div class="card card-body card-form mt-4" style="overflow-x: auto">
          <table class="list table table-striped" id="bazarList">
            <thead class="thead-dark bg-primary">
              <tr>
                <th scope="col">Plant&nbspID</th>
                <th scope="col">Current_Power_Output(watts)</th>
                <th scope="col">Max&nbspOutput(watts)</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php
                  $sql = "SELECT * FROM Power_Output";
                  $result = mysqli_query($conn, $sql);

                  if($result)
                  {
                  while($row = mysqli_fetch_assoc($result)){
                  ?>
                  <tr>
                    <td><?php echo $row['plant_id'] ?></td>
        
                    <td><?php echo $row['current_power_out']; ?></td>
                    <td><?php echo $row['threshold']; ?></td>
                    <td>
                        <a ><i class="fa fa-pencil updateBtn" aria-hidden="true"></i></a>
                        <a ><i class="fa fa-remove deleteBtn" style="margin-left:5px;color:red"></i></a>
                    </td>
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
      </div>
    </div>
 
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script>
    (function($) {
          "use strict";

          var fullHeight = function() {

            $('.js-fullheight').css('height', $(window).height());
            $(window).resize(function(){
              $('.js-fullheight').css('height', $(window).height());
            });

          };
          fullHeight();

          $('#sidebarCollapse').on('click', function () {
              $('#sidebar').toggleClass('active');
          });

          })(jQuery);
  </script>
  <script>
    $(document).ready(function () {
      $(".insertBtn").click(function () {
        $("#insertModal").modal("toggle");
      });
    });
    $(document).ready(function () {
      $('.deleteBtn').on('click', function(){
        $('#deleteModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        console.log(data);
        $('#deleteId').val(data[0]);
        });
    });
     $(document).ready(function () {
      $('.updateBtn').on('click', function(){
        $('#updateModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        $('#updateId').val(data[0]);
        $('#updateoutput').val(data[6]);
        $('#updatemax_output').val(data[7]);  
        $('#updatepower_max').val(data[8]);
        $('#updateefficiency').val(data[9]);
        $('#updaterated_eff').val(data[10]); 
        $('#updatemachine_state').val(data[11]);
        });  
    });
  </script>
</body>

</html>