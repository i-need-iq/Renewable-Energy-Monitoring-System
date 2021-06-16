<?php

    // Insert the content of connection.php file
    include('connection1.php');
    
    // Insert data into the database
    if(ISSET($_POST['insertData']))
    {
        $D_ID = 1001;
        $output = $_POST['output'];
        $maxoutput = $_POST['max_output'];
        $Pmax = $_POST['power_max'];
        $Effi = $_POST['efficiency'];
        $ratedEff = $_POST['rated_eff'];
        $state = $_POST['machine_state'];
        $select="SELECT plant_id from Plant";
        if ($result=mysqli_query($conn,$select))
          {
            $rowcount=mysqli_num_rows($result);
            mysqli_data_seek($result,$rowcount-1);
            $row=mysqli_fetch_row($result);
            $D_ID=$row[0]+1;
             mysqli_free_result($result);
          }
        $sql="INSERT INTO Plant values('$D_ID',NULL,NULL,NULL)";
        $sql1="INSERT INTO Power_Output values('$D_ID', '$maxoutput',$output,56)";
        $result = mysqli_query($conn, $sql);
        $result1 = mysqli_query($conn, $sql1);
        if($result){
            echo '<script> alert("Data saved."); </script>';
            header('Location: installationsAdmin.php');
        }else{
            echo '<script> alert("Data Not saved."); </script>';
        }

    }
    
    // Delete data from the database
    if(ISSET($_POST['deleteData']))
    {
        $id = $_POST['deleteId']; 
        echo $id;
        $sql = "DELETE FROM Solar_Plant WHERE plant_id='$id'";
        $sql2 = "DELETE FROM Wind_Info WHERE plant_id='$id'";
        $sql3 = "DELETE FROM Wind_Plant_Plant WHERE plant_id='$id'";
        $sql4 = "DELETE FROM Geothermal_Plant WHERE plant_id='$id'";
        $sql1 = "DELETE FROM Plant WHERE plant_id='$id'";
        $result = mysqli_query($conn, $sql);
        $result4 = mysqli_query($conn, $sql4);
        $result2 = mysqli_query($conn, $sql2);
        $result3 = mysqli_query($conn, $sql4);
        $result1 = mysqli_query($conn, $sql1);
        if($result1){
            echo '<script> alert("Data Deleted."); </script>';
            header('Location: installationsAdmin.php');
        }else{
            echo '<script> alert("Data Not Deleted."); </script>';
        }
    }

        // Update data into the database
        if(ISSET($_POST['updateData']))
        {   
            $D_ID = $_POST['updateId'];
            $output = $_POST['updateoutput'];
            $maxoutput = $_POST['updatemax_output'];
            $Pmax = $_POST['updatepower_max'];
            $Effi = $_POST['updateefficiency'];
            $ratedEff = $_POST['updaterated_eff'];
            $state = $_POST['updatemachine_state'];

            $sql = "UPDATE Power_Output SET current_power_out='$output', threshold='$maxoutput'
                    WHERE plant_id='$D_ID'";
    
            $result = mysqli_query($conn, $sql);
    
            if($result)
            {
                echo '<script> alert("Data Updated Successfully."); </script>';
                header("Location:installationsAdmin.php");
            }
            else
            {
                echo '<script> alert("Data Not Updated"); </script>';
            }
        }
?>