<?php
require('sql_connect.php');
$treatment_id = $_GET['treatment_id'];

$sql = "SELECT * FROM treatment JOIN visit ON treatment.treatment_id=visit.visit_id WHERE treatment_id=".$treatment_id;
$result = mysqli_query($conn,$sql);
$row = $result->fetch_array();
      $diagnosis = $row['diagnosis'];
      $treatment = $row['treatment'];
      $time = date('h:i A', strtotime($row['time']));  
?>      
        <div style="background-color: white">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title" id="myModalLabel">Treatment Details</h4>
        </div>
                <div class="modal-body">
                  <div class="pad" id="infopanel"></div>                                
                    <div class="box">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th>Treatment Time</th>
                  <td><?php echo $time; ?></td>                  
                </tr>

                <tr>
                  <th>Diagnosis</th>
                  <td><?php echo $diagnosis; ?></td>                  
                </tr>

                <tr>
                  <th>Treatment</th>
                  <td><?php echo $treatment; ?></td>                  
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