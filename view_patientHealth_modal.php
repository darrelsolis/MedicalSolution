<?php
require('sql_connect.php');
$patient_id = $_GET['patient_id'];

$sql = "SELECT * FROM patient WHERE patient_id=".$patient_id;
$result = mysqli_query($conn,$sql);
$row = $result->fetch_row();
      $bloodType = $row[1];
      $bloodPressure = $row[2];
      $weight = $row[3];
      $height = $row[4];
      $allergies = $row[5];
?>      
        <div style="background-color: white">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title" id="myModalLabel">Patient Status</h4>
        </div>
                <div class="modal-body">
                  <div class="pad" id="infopanel"></div>                                
                    <div class="box">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">                
                <tr>
                  <th>Weight</th>
                  <td><?php echo $weight." kg"; ?></td>                  
                </tr>

                <tr>
                  <th>Height</th>
                  <td><?php echo $height." cm"; ?></td>                  
                </tr>

                <tr>
                  <th>Blood Type</th>
                  <td><?php echo $bloodType; ?></td>                  
                </tr>

                <tr>
                  <th>Blood Pressure</th>
                  <td><?php 
                  if($bloodPressure == ''){
                    echo "<i>Not yet checked</i>";
                  }else{
                    echo $bloodPressure;
                  }
                   ?></td>                  
                </tr>

                <tr>
                  <th>Allergies</th>
                  <td><?php echo $allergies; ?></td>                  
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