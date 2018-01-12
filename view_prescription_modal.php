<?php
require('sql_connect.php');
$visit_id = $_GET['visit_id'];

$sql = "SELECT * FROM prescription JOIN medicine ON prescription.medicine_id=medicine.medicine_id WHERE visit_id=".$visit_id;
$result = mysqli_query($conn,$sql);
$row = $result->fetch_row();
      $quantity = $row[2];
      $dosage = $row[3];
      $medicineName = $row[5];
      $genericName = $row[6];
      $description = $row[7];
      $price = $row[9];
?>      
        <div style="background-color: white">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title" id="myModalLabel">Prescription Details</h4>
        </div>
                <div class="modal-body">
                  <div class="pad" id="infopanel"></div>                                
                    <div class="box">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <?php 
                  if($result->num_rows > 0){
                    echo "
                    <table class='table table-striped'>
                      <tr>
                        <th>Medicine Name</th>
                        <td width=350>
                          ".$medicineName." 
                        </td>                  
                      </tr>

                      <tr>
                        <th>Generic Name</th>
                        <td>".$genericName."</td>                  
                      </tr>

                      <tr>
                        <th>Description</th>
                        <td>".$description."</td>                  
                      </tr> 

                      <tr>
                        <th>Quantity</th>
                        <td>".$quantity."</td>                
                      </tr>

                      <tr>
                        <th>Dosage</th>
                        <td>".$dosage."</td>               
                      </tr>                               

                      <tr>
                        <th>Unit Price</th>
                        <td>Php ".$price."</td>                  
                      </tr>                       
                    </table>
                    ";
                  }else{
                    echo "
                    <table class='table table-striped'>
                      <tr>
                      <td><h5 style='font-style:italic'>No medicine prescribed by the physician.</h5></td>
                      </tr>
                    </table>"; 
                  }
               ?>              
            </div>
            <!-- /.box-body -->
          </div>                       
                </div>                  
        </div>
              

<?php 
  $conn->close();
 ?>