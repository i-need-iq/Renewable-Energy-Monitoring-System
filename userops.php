<?php

    // Insert the content of connection.php file
    include('connection1.php');
    
    // Insert data into the database
    if(ISSET($_POST['insertData']))
    {
        $type = $_POST['type'];
        $cost = $_POST['cost'];
        $pid = $_POST['p_id'];
        $did = $_POST['d_id'];
        $select="SELECT U_ID from user";
        if ($result=mysqli_query($conn,$select))
          {
            $rowcount=mysqli_num_rows($result);
            mysqli_data_seek($result,$rowcount-1);
            $row=mysqli_fetch_row($result);
            $uid=$row[0]+1;
             mysqli_free_result($result);
          }
        $sql="INSERT INTO user values('$uid','$type','$cost','$pid','$did')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo '<script> alert("Data saved."); </script>';
            header('Location: userAdmin.php');
        }else{
            echo '<script> alert("Data Not saved."); </script>';
        }
    }
    
    // Delete data from the database
    if(ISSET($_POST['deleteData']))
    {
        $id = $_POST['deleteId']; 
        echo $id;
        $sql = "DELETE FROM user WHERE U_ID='$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo '<script> alert("Data Deleted."); </script>';
            header('Location: userAdmin.php');
        }else{
            echo '<script> alert("Data Not Deleted."); </script>';
        }
    }

        // Update data into the database
        if(ISSET($_POST['updateData']))
        {   
            $uid = $_POST['updateId'];
            $type = $_POST['updatetype'];
            $cost = $_POST['updatecost'];
            $pid = $_POST['updatep_id'];
            $did = $_POST['updated_id'];

            $sql = "UPDATE user SET Type='$type',Cost='$cost',P_ID='$pid',D_ID='$did'
                    WHERE U_ID='$uid'";
    
            $result = mysqli_query($conn, $sql);
    
            if($result)
            {
                echo '<script> alert("Data Updated Successfully."); </script>';
                header("Location:userAdmin.php");
            }
            else
            {
                echo '<script> alert("Data Not Updated"); </script>';
            }
        }
?>