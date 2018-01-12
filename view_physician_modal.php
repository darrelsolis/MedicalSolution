<?php
require('sql_connect.php');
$physician_id = $_GET['physician_id'];

$sql = "SELECT * FROM userdata JOIN physician ON userdata.user_id=physician.physician_id WHERE physician_id=".$physician_id;
$result = mysqli_query($conn,$sql);
$row = $result->fetch_row();
      $email = $row[1];
      $password = $row[2];
      $firstname = $row[3];
      $lastname = $row[4];
      $gender = $row[5];
      $birthdate = $row[6];
      $birthmonth = date("F", strtotime($birthdate));
      $birthday = date("j",strtotime($birthdate));
      $birthyear = date("Y",strtotime($birthdate));
      $address = $row[7];
      $contact = $row[8];
      $user_type = $row[9];
      $dateRegistered = $row[10];
      $licenseNumber = $row[12];
      $department = $row[13];
  

?>      
        <div style="background-color: white">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title" id="myModalLabel">Personal Details</h4>
        </div>
                <div class="modal-body">
                  <div class="pad" id="infopanel"></div>                                
                    <div class="box">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">                
                <tr>
                  <th>Firstname</th>
                  <td><?php echo $firstname; ?></td>                  
                </tr>

                <tr>
                  <th>Lastname</th>
                  <td><?php echo $lastname; ?></td>                  
                </tr>

                <tr>
                  <th>E-mail</th>
                  <td><?php echo $email; ?></td>                  
                </tr>

                <tr>
                  <th>Password </th>
                  <td><?php echo $password; ?></td>                  
                </tr>

                <tr>
                  <th>Gender</th>
                  <td><?php echo $gender; ?></td>                  
                </tr>

                <tr>
                  <th>Birthdate</th>
                  <td><?php echo $birthdate; ?></td>                  
                </tr>

                <tr>
                  <th>Address</th>
                  <td><?php echo $address; ?></td>                  
                </tr>

                <tr>
                  <th>Contact Number</th>
                  <td><?php echo $contact; ?></td>                  
                </tr>

                <tr>
                  <th>Date Registered</th>
                  <td><?php echo $dateRegistered; ?></td>                  
                </tr>                
              </table>
            </div>
            <!-- /.box-body -->
          </div>                       
                </div>                  
        </div>
              

<?php 
  $conn->close();
 ?>