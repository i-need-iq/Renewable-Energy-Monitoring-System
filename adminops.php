<?php

    // Insert the content of connection.php file
    include('connection1.php');
    
    // Insert data into the database
    if(ISSET($_POST['insertData']))
    {
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $password = $_POST['password'];
        $select="SELECT person_id from Person";
        if ($result=mysqli_query($conn,$select))
          {
            $rowcount=mysqli_num_rows($result);
            mysqli_data_seek($result,$rowcount-1);
            $row=mysqli_fetch_row($result);
                $pid=$row[0]+1;
             mysqli_free_result($result);
        }
        $sql="INSERT INTO Person values('$pid','$firstname','$lastname','$dob',NULL,NULL,NULL,NULL,'$email')"; 
        $result = mysqli_query($conn, $sql);
        $sql2="INSERT INTO User values('$pid',NULL,NULL,'$password)";
        $result2 = mysqli_query($conn, $sql2);
        $sql1="INSERT INTO Person_Phone_Number values('$pid','$phone')";
        $result1 = mysqli_query($conn, $sql1);
        if($result){
            echo '<script> alert("Data saved."); </script>';
            header('Location: admin.php');
        }else{
            echo '<script> alert("Data Not saved."); </script>';
        }
    }
    
    // Delete data from the database
    if(ISSET($_POST['deleteData']))
    {
        $id = $_POST['deleteId']; 
        echo $id;
        $sql2 = "DELETE FROM User WHERE person_id='$id'";
        $sql = "DELETE FROM Person WHERE person_id='$id'";
        $sql1= "DELETE FROM Person_Phone_Number WHERE person_id='$id'";
        $result1= mysqli_query($conn, $sql1);
        $result2 = mysqli_query($conn, $sql2);
        $result = mysqli_query($conn, $sql);

        if($result){
            echo '<script> alert("Data Deleted."); </script>';
            header('Location: admin.php');
        }else{
            echo '<script> alert("Data Not Deleted."); </script>';
        }
    }

        // Update data into the database
        if(ISSET($_POST['updateData']))
        {   
            $pid= $_POST['updateId'];
            $firstname = $_POST['updatefirstname'];
            $lastname = $_POST['updatelastname'];
            $email = $_POST['updateemail'];
            $phone = $_POST['updatephone'];
            $dob = $_POST['updatedob'];
            $password = $_POST['updatepassword'];
    
            $sql = "UPDATE person SET   first_name='$firstname',
                                        last_name='$lastname', 
                                        email_id='$email',
                                        birth_date='$dob',
                                        WHERE person_id='$pid'";
            $sql1 = "UPDATE IGNORE Person_Phone_Number SET   phone_number='$phone' 
                                                WHERE person_id='$pid'";
            $sql2 = "UPDATE User SET  user_password='$password' 
            WHERE person_id='$pid'";
            $result = mysqli_query($conn, $sql);
            $result1 = mysqli_query($conn, $sql1);
            $result2 = mysqli_query($conn, $sql2);
    
            if($result and $result1)
            {
                echo '<script> alert("Data Updated Successfully."); </script>';
                header("Location:admin.php");
            }
            else
            {
                echo '<script> alert("Data Not Updated"); </script>';
            }
        }
?>