
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Role</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="btn-group btn-group-justified">  
                        <a href="<?= base_url('admin/role'); ?>" class="btn btn-default"><i class="fa fa-exchange-alt"></i> Show Role </a> 
                        <a href="<?= base_url('admin/role/role_hidden'); ?>" class="btn btn-danger"><i class="fa fa-exchange-alt"></i> Disable Role</a>
            </div>
            <br>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Role</button>
                        <button type="button" class="btn btn-default" onclick="window.location.reload();"><i class="fa fa-refresh"> Reload</i></button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th width="15%">Action</th>
                                        <!-- <th>Delete</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_role as $data) {?>
                                        <tr>
                                            <td><?php echo "$data->name" ?></td>
                                            <td><?php echo "$data->description" ?></td>
                                            <td>
                                            <a href="<?php echo base_url()."admin/role/detail/".$data->role_id; ?>" title="Detail"><button type="button" class="btn btn-warning"><i class="fa fa-eye"></i></button></a>

                                            <a href="<?= base_url()."admin/role/hidden/".$data->role_id; ?>" title="Disable"><button type="button" class="btn btn-info" onclick="return confirm('Are you sure to disable this data');"><i class="fa fa-eye-slash"> </i></button></a>
                                            </td>
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
                            <h4 class="modal-title" id="modalDialogLabel"><strong>Create Role</strong></h4>
                        </div>
                        <div class="modal-body">
                          <div id="embeddedNotification" style="display:none;"></div>
                          <form role="form" class="form-horizontal" id="form" name="form" parsley-validate="" method="POST" action="<?php echo base_url('admin/role/insert');?>">

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Name</label>
                                <div class="col-sm-8">
                                  <input type="text" id="date" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Description</label>
                                <div class="col-sm-8">
                                  <input type="text" id="name" name="description" class="form-control" required>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="tblroledetail" name="tblroledetail">
                                    <thead>
                                        <tr>

                                            <th width="5%">check</th>
                                            <th> Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($data_menu as $menu) { ?>
                                            <tr>
                                                <td><input type="checkbox" name="view[]" value="<?= $menu->menu_id; ?>"></td>
                                                <td> <?php echo "$menu->menu_name"; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                
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

            