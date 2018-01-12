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
           <h4 class="modal-title" id="myModalLabel">Edit Physician</h4>
        </div>
                <div class="modal-body">
                <div class="pad" id="infopanel"></div>                                
                <div class="form-horizontal">
                  <form method="POST" action="" id="edit_physician">
                    <h4 style="font-weight:bold; margin-top:-15px"> Personal Information </h4>
                      <hr>
                      <div class="form-group"> 
                        <label class="col-sm-3 control-label">Firstname </label>
                        <div class="col-sm-9">
                          <input type="hidden" name="user_id" class="form-control" value="<?php echo $physician_id; ?>">
                          <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo $firstname; ?>" required>
                        </div>
                      </div>

                      <div class="form-group"> 
                        <label class="col-sm-3 control-label">Lastname</label>
                        <div class="col-sm-9">
                          <input type="text" name ="lastname" class="form-control" id="lastname" value="<?php echo $lastname; ?>" required>
                        </div>
                      </div>

                      <div class="form-group"> 
                        <label class="col-sm-3 control-label">E-mail</label>
                        <div class="col-sm-9">
                          <input type="email" name ="email" class="form-control" id="email" value="<?php echo $email; ?>" required>
                        </div>
                      </div>

                      <div class="form-group"> 
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" name ="password" class="form-control" id="password" value="<?php echo $password; ?>" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="gender" id="gender" required>
                          <?php 
                              if($gender == 'Male'){
                                echo "
                                    <option value='Male' selected> Male </option>
                                    <option value='Female'> Female </option>
                                ";
                              }else{
                                echo "
                                    <option value='Male'> Male </option>
                                    <option value='Female' selected> Female </option>
                                ";
                              }
                           ?>                            
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-3 control-label" >Birthday </label>
                        <div class="col-sm-9">
                          <select class="form-control"  style="width:32.9%; display: inline;" name="month" value='' id="month" required>
                            <option value=""> Month </option>
                            <?php 
                              $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                              $x = 1;
                              foreach($months as $value){
                                if($birthmonth == $value){
                                    echo "<option value='".$x."' selected>".$value."</option>";
                                }else{
                                    echo "<option value='".$x."'>".$value."</option>";
                                }                                
                                $x++;
                              }
                             ?>
                          </select>

                          <?php
                          echo "<select class='form-control' style='width:32.9%; display: inline;' name='day' id='day' required>";
                          echo "<option value=''> Day </option>";
                          for($day=01;$day<=31;$day++){
                            if($birthday == $day){
                              echo "<option value='$day' selected>$day</option>";
                            }else{
                              echo "<option value='$day'>$day</option>";
                            }
                            
                          }
                          echo "</select>";
                          ?>

                          <?php
                          echo "<select class='form-control' style='width:32.8%; display: inline;' name='year' id='year' required>";
                          echo "<option value=''> Year </option>";
                          for($i=0;$i<=80;$i++){
                            $year=date('Y',strtotime("-$i year"));
                            if($birthyear == $year){
                              echo "<option name='$year' selected>$year</option>";
                            }else{
                              echo "<option name='$year'>$year</option>";
                            }
                            
                          }
                          echo "</select>";
                          ?>
                        </div>
                      </div>

                      <div class="form-group"> 
                        <label class="col-sm-3 control-label">Contact #</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="contact" id="contact" value="<?php echo $contact; ?>" required>
                        </div>
                      </div> 

                      <div class="form-group"> 
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="address" id="address" value="<?php echo $address; ?>" required>
                        </div>
                      </div>

                      <h4 style="font-weight:bold; margin-top:40px"> Work Information</h4>
                        <hr>
                        <div class="form-group"> 
                          <label class="col-sm-3 control-label">License Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="licenseNumber" id="licenseNumber" value="<?php echo $licenseNumber; ?>" required>
                          </div>
                        </div>

                        <div class="form-group"> 
                          <label class="col-sm-3 control-label">Department</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="department" id="department" value="<?php echo $department; ?>" required>
                          </div>
                        </div>


                        <div class="form-group"> 
                          <label class="col-sm-3 control-label"></label>
                          <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary" id="btnsave"><i class="fa fa-save"></i> Save and Update</button></div>
                          </form>
                        </div>
                        
                      </div>                  
                    </div>
              </div>


<?php 
  $conn->close();
 ?>