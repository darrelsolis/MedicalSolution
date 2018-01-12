<?php
require('sql_connect.php');
$medicine_id = $_GET['medicine_id'];

$sql = "SELECT * FROM medicine WHERE medicine_id=".$medicine_id;
$result = mysqli_query($conn,$sql);
$row = $result->fetch_row();
      $name = $row[1];
      $genericName = $row[2];
      $description = $row[3];
      // $stock = $row[4];
      // $price = $row[5];
?>      
        <div style="background-color: white">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title" id="myModalLabel">Medicine Description</h4>
        </div>
                <div class="modal-body">
                  <div class="pad" id="infopanel"></div>                                
                    <div class="box">
                      <div class="box-body no-padding">
                        <table class="table table-striped">                
                          <tr>
                            <th width=150>Name</th>
                            <td><?php echo $name; ?></td>                  
                          </tr> 

                          <tr>
                            <th width=150>Generic Name</th>
                            <td><?php echo $genericName; ?></td>                  
                          </tr>

                          <tr>
                            <th width=150>Description</th>
                            <td><?php echo $description ?></td>                  
                          </tr>
                        </table>
                      </div>
                    </div>                       
                  </div>                  
                </div>
              

<?php 
  $conn->close();
 ?>