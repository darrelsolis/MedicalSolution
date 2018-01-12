<?php
require('sql_connect.php');
$appointment_id = $_GET['appointment_id'];

$sql = "SELECT * FROM appointment WHERE appointment_id=".$appointment_id;
$result = mysqli_query($conn,$sql);
$row = $result->fetch_array();
      $time = date('h:i A', strtotime($row['time']));
      $status = $row['status'];
      $approval = $row['approval'];

?>      
        <div style="background-color: white">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title" id="myModalLabel">Appointment Details</h4>
        </div>
                <div class="modal-body">
                  <div class="pad" id="infopanel"></div>                                
                    <div class="box">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th>Time</th>
                  <td><?php echo $time; ?></td>                  
                </tr>

                <tr>
                  <th>Approval</th>
                  <td><?php echo $approval; ?></td>                  
                </tr>

                <tr>
                  <th>Status</th>
                  <td><?php echo $status; ?></td>                  
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