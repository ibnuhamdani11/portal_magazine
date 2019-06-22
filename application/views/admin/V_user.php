
            <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ User</button>
                    <!-- <button type="button" class="btn btn-default"><i class="fa fa-download"> Export to Excel</i></button>
                    <button type="button" class="btn btn-default"><i class="fa fa-download"> Export to Pdf</i></button> -->
                    <button type="button" class="btn btn-default"><i class="fa fa-refresh"> Reload</i></button>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_user as $data) {?>
                                    <tr>
                                        <td><?php echo "$data->user_id" ?></td>
                                        <td><?php echo "$data->first_name" ?> [<?php echo "$data->last_name" ?>]</td>
                                        <td><?php echo "$data->phone" ?></td>
                                        <td><?php echo "$data->email" ?></td>
                                        <td><?php echo "$data->role_name" ?></td>
                                        <td>
                                            <a href="<?php echo base_url()."admin/user/detail/".$data->user_id; ?>" title="Detail"><button type="button" class="btn btn-warning"><i class="fa fa-eye"></i></button></a>

                                            <a href="<?= base_url()."admin/user/hidden/".$data->user_id; ?>" title="Hidden"><button type="button" class="btn btn-info" onclick="return confirm('Are you sure to hidden this data');"><i class="fa fa-eye-slash"> </i></button></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                        
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
         <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalDialogLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                        <h3 class="modal-title" id="modalDialogLabel"><strong>Create User</strong></h3>
                    </div>
                    <div class="modal-body">
                      <div id="embeddedNotification" style="display:none;"></div>
                      <form role="form" class="form-horizontal" id="form" name="form" parsley-validate="" method="POST" action="<?php echo base_url('admin/user/insert');?>">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">First Name</label>
                            <div class="col-sm-8">
                              <input type="text"  name="firstname" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">Last Name</label>
                            <div class="col-sm-8">
                              <input type="text"  name="lastname" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">Email</label>
                            <div class="col-sm-8">
                              <input type="email"  name="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">Phone</label>
                            <div class="col-sm-8">
                              <input type="text"  name="phone" class="form-control angka14">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">Date Birth</label>
                            <div class="col-sm-8">
                              <input type="text"  name="datebirth" class="form-control tanggal1" placeholder="YYYY-MM-DD">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">Gender</label>
                            <div id="selectbox" class="col-sm-8">
                              <select class="chosen-select chosen-transparent form-control" id="gender" name="gender">
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">Role</label>
                            <div class="col-sm-8" >
                                <select class="chosen-select chosen-transparent form-control" id="role" name="role">
                                    <option value="0">-- Select Role --</option>
                                    <?php foreach ($data_role as $data) {?>
                                        <option value='<?php echo "$data->role_id" ?>'><?php echo "$data->role_name" ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">Created Date</label>
                            <div class="col-sm-8">
                              <input type="text" name="created_date" value="<?= date('Y-m-d');?>" readonly="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">Password</label>
                            <div class="col-sm-8">
                              <input type="password" id="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">Job Position</label>
                            <div class="col-sm-8">
                              <input type="text" id="job_position" name="job_position" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">Company</label>
                            <div class="col-sm-8">
                              <input type="text" id="company" name="company" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">City</label>
                            <div class="col-sm-8">
                              <input type="text" id="city" name="city" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">Pos Code</label>
                            <div class="col-sm-8">
                              <input type="text" id="pos_code" name="pos_code" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">Region</label>
                            <div class="col-sm-8">
                              <input type="text" id="region" name="region" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">Country</label>
                            <div class="col-sm-8">
                              <input type="text" name="country" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">Work Address</label>
                            <div class="col-sm-8">
                              <input type="text" name="work_address" class="form-control">
                            </div>
                        </div>
                        <div class="form-group form-footer">
                            <div class="col-sm-offset-8 col-sm-4">
                              <button class="btn btn-primary" type="submit" id="submit" onclick="this.clicked=true">Save</button>
                              <button class="btn btn-active" type="reset" id="reset">Reset</button>
                            </div>
                          </div>
                      </form>
                    </div>
                 </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
         </div><!-- /.modal -->
        <!-- End Modal -->

