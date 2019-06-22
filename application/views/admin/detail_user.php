
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail User</h1>

                </div>

            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <?php foreach ($data as $user) {
                            ?>

                            <label class="control-label"><h4>Show Data Detail User</h4></label>
                            <span class="pull-right">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"> Edit</i></button>
                            <div class="btn-group">
                              <a href="<?php echo base_url()."admin/user/statusEna/".$user->id; ?>">
                              <button type="button" class="btn btn-success" <?php if ($user->user_status == 1) {
                                  # code..
                                echo "disabled";
                              }?>>Enable</button></a>
                              <a href="<?php echo base_url()."admin/user/statusDis/".$user->id; ?>">
                              <button type="button" class="btn btn-danger" <?php if ($user->user_status == 0) {
                                  # code...
                                echo "disabled";
                              }?>>Disable</button></a>
                            </div>
                            </span>
                            <!-- </div> -->
                        </div>
                        <!-- /.panel-heading -->

                        <div class="panel-body">

                            <p>&nbsp;</p>
                            <div style="overflow: auto;">
                            <table class="table">
                              <tr>
                                <th width="25%">User ID</th>
                                <td>: <?php echo "$user->id" ?></td>
                              </tr>
                              <tr>
                                <th> First Name</th>
                                <td>: <?php echo "$user->first_name" ?></td>
                              </tr>
                              <tr>
                                <th> Last Name</th>
                                <td>: <?php echo "$user->last_name" ?></td>
                              </tr>
                              <tr>
                                <th> Email</th>
                                <td>: <?php echo "$user->email" ?></td>
                              </tr>
                              <tr>
                                <th> Phone</th>
                                <td>: <?php echo "$user->phone" ?></td>
                              </tr>
                              <tr>
                                <th> Date Birth</th>
                                <td>: <?php echo "$user->date_birth" ?></td>
                              </tr>
                              <tr>
                                <th> Gender</th>
                                <td>: <?php
                                    if($user->gender == 0 ) {
                                      echo "Male";
                                    }else{
                                      echo "Female";
                                    }
                                  ?></td>
                              </tr>
                              <tr>
                                <th> Role</th>
                                <td>: <?php echo "$user->role_name" ?></td>
                              </tr>
                              <tr>
                                <th> Registration Date</th>
                                <td>: <?php echo "$user->create_date" ?></td>
                              </tr>
                            </table>
                          </div>
                            
                            <?php } ?>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- Insert -->
            <!-- popup -->
            <!-- Modal Alert -->
             <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modalDialogLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                            <h4 class="modal-title" id="modalDialogLabel"><strong>User</strong></h4>
                        </div>
                        <div class="modal-body">
                          <div id="embeddedNotification" style="display:none;"></div>
                          <form role="form" class="form-horizontal" id="form" name="form" parsley-validate="" method="POST" action="<?php echo base_url();?>admin/user/edit">
                            <div class="form-group">
                              <input type="hidden" name="id" value="<?php echo "$user->id" ?>">
                                <label class="col-sm-4 control-label" for="name">First Name</label>
                                <div class="col-sm-8">
                                  <input type="text" id="firstname" name="firstname" value="<?php echo "$user->first_name" ?>" class="form-control" requred>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Last Name</label>
                                <div class="col-sm-8">
                                  <input type="text" id="lastname" name="lastname" value="<?php echo "$user->last_name" ?>"  class="form-control" requred>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Email</label>
                                <div class="col-sm-8">
                                  <input type="email" id="email" name="email"  value="<?php echo "$user->email" ?>" class="form-control" requred>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Phone</label>
                                <div class="col-sm-8">
                                  <input type="text" id="phone" name="phone" value="<?php echo "$user->phone" ?>" class="form-control angka14" requred>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Date Birth</label>
                                <div class="col-sm-8">
                                  <input type="text" id="datebirth" name="datebirth" value="<?php echo "$user->date_birth" ?>" class="form-control tanggal" requred>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Gender</label>
                                <div id="selectbox" class="col-sm-8">
                                  <select class="chosen-select chosen-transparent form-control" id="gender" name="gender">
                                    <?php 
                                      if($user->gender == 0){
                                        echo "<option value='0' selected>Male</option>";
                                        echo "<option value='1'>Female</option>";
                                        
                                      }else{
                                        echo "<option value='0' >Male</option>";
                                        echo "<option value='1' selected>Female</option>";
                                        
                                      }

                                    ?>
                                  </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Role</label>
                                <div class="col-sm-8" id="selectboxRole">
                                    <select class="chosen-select chosen-transparent form-control" id="role" name="role" requred>
                                        <option value="0">-- Select Role --</option>
                                        <?php foreach ($data_role as $data) {?>
                                            <option  
                                              <?php
                                                if($data->id == $user->role_id){
                                                  echo "selected";
                                                }
                                              ?>
                                            value='<?php echo "$data->id" ?>'><?php echo "$data->name" ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Created Date</label>
                                <div class="col-sm-8">
                                  <input type="text" id="created_date" name="created_date" value="<?= "$user->create_date" ?>" readonly="" class="form-control" requred>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Job Position</label>
                                <div class="col-sm-8">
                                  <input type="text" id="job_position" name="job_position" value="<?= "$user->job_position" ?>" class="form-control" requred>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Company</label>
                                <div class="col-sm-8">
                                  <input type="text" id="company" name="company" value="<?= "$user->company" ?>" class="form-control" requred>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">City</label>
                                <div class="col-sm-8">
                                  <input type="text" id="city" name="city" value="<?= "$user->city" ?>" class="form-control" requred>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Pos Code</label>
                                <div class="col-sm-8">
                                  <input type="text" id="pos_code" name="pos_code" value="<?= "$user->pos_code" ?>" class="form-control" requred>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Region</label>
                                <div class="col-sm-8">
                                  <input type="text" id="region" name="region" value="<?= "$user->region" ?>" class="form-control" requred>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Country</label>
                                <div class="col-sm-8">
                                  <input type="text" id="country" name="country" value="<?= "$user->country" ?>" class="form-control" requred>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Work Address</label>
                                <div class="col-sm-8">
                                  <input type="text" id="work_address" name="work_address" value="<?= "$user->work_address" ?>" class="form-control" requred>
                                </div>
                            </div>
                            <div class="form-group form-footer">
                                <div class="col-sm-offset-10 col-sm-4">
                                  <button class="btn btn-danger" type="submit" id="submit" onclick="this.clicked=true">Save</button>
                                  <button class="btn btn-active" type="reset" id="reset">Reset</button>
                                </div>
                              </div>
                          </form>
                        </div>
                     </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
             </div><!-- /.modal -->
            <!-- End Modal -->

            