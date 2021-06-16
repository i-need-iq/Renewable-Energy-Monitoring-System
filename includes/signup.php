
<?php
if(isset($_POST['signup']))
{
$mail=$_POST['email'];
$password=$_POST['psw'];
$confirmpwd=$_POST['psw-repeat'];
$type=$_POST['type'];
//validation check

if(empty($mail)){
  array_push($errors,"Email is required");
}

if(($psw!=$confirmpwd)){
  array_push($errors,"The passwords Doesn't match");
}

if(count($errors)==0)
{
  $conn=new mysqli("localhost","root","","renewable_energy_monitoring");
if(mysqli_connect_error()){
  die('ConnectError('.mysqli_connect_errno().')');
}
else{
    $sql="INSERT INTO Person(person_id ,first_name ,Last_name ,birth_date ,door_number ,street_name ,city ,pincode ,email_id ) values(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'$email')";
    $sql2 = "SELECT person_id FROM Person WHERE email_id='$mail'";
    $result = $conn->query($sql2);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id= $row["person_id"];
  }
}
    if($type==="User")
    {
        $sql1="INSERT INTO User(person_id ,comapny_id ,type ,user_password ) VALUES ('$id',NULL,NULL,'$psw')";
    }
    else{
        $sql1="INSERT INTO Manager(person_id, plant_id , manager_password ,salary  ) VALUES ('$id',NULL,'$psw',NULL)";
    }


    if($result=$conn->query($sql)){
      $_SESSION['id']=$id;
      $_SESSION['success']="Welcome";
      $conn->query($sql1);
        if($type==="User"){
          header('location: userportal.php');
        }
        else{
            header('location: managerportal.php');
        }
      }
        else{
          echo "Error".$sql;
        }
        mysqli_close($conn);
}
}
?>
<?php } ?>
