<?php
require('sql_connect.php');
$checkup_id = $_GET['checkup_id'];

$sql = "SELECT * FROM checkup JOIN visit ON checkup.checkup_id=visit.visit_id WHERE checkup_id=".$checkup_id;
$result = mysqli_query($conn,$sql);
$row = $result->fetch_array();
      $weight = $row[1];
      $height = $row[2];
      $bloodPressure = $row[3];
      $allergies = $row[4];
      $complain = $row[5];
      $feedback = $row[6];
      $date = $row[11];
      $time = date('h:i A', strtotime($row['time']));  

?>      
        <div style="background-color: white">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title" id="myModalLabel">Checkup Details</h4>
        </div>
                <div class="modal-body">
                  <div class="pad" id="infopanel"></div>                                
                    <div class="box">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th>Checkup Time</th>
                  <td><?php echo $time; ?></td>                  
                </tr>

                <tr>
                  <th>Complain</th>
                  <td width=350><?php echo $complain; ?></td>                  
                </tr>

                <tr>
                  <th>Weight</th>
                  <td><?php echo $weight." kg"; ?></td>                  
                </tr>

                <tr>
                  <th>Height</th>
                  <td><?php echo $height." cm"; ?></td>                  
                </tr>

                <tr>
                  <th>Blood Pressure</th>
                  <td><?php echo $bloodPressure; ?></td>                  
                </tr>

                <tr>
                  <th>Allergies </th>
                  <td><?php echo $allergies; ?></td>                  
                </tr>                

                <tr>
                  <th>Feedback</th>
                  <td><?php echo $feedback; ?></td>                  
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