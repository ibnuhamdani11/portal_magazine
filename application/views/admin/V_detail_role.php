

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Role</h1>

                </div>

            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            
                            <label class="control-label"><h4>Show data detail role</h4></label>
                            <span class="pull-right">

                            <button type="button" class="btn btn-danger" onclick="window.history.back();"><i class="fa fa-arrow-left"></i></button>

                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"> </i></button>
                            </span>
                            <!-- </div> -->
                        </div>
                        <!-- /.panel-heading -->

                        <div class="panel-body">


                        <!-- <div class="modal-body"> -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-8">
                                  <label class="control-label"><?php echo "$role->name" ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-8">
                                  <label class="control-label"><?php echo "$role->description" ?></label>
                                </div>
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
                                                <td><input type="checkbox" name="view[]" value="<?= $menu->menu_id; ?>"
                                                <?php 
                                                $jml=$this->db->query("SELECT * FROM ms_role_detail where menu_id='$menu->menu_id' AND role_id='$role->role_id'")->num_rows();
                                                if ($jml>0) {
                                                    echo "checked='checked'";
                                                } else {
                                                    echo "";
                                                }
                                                ?>
                                                disabled></td>
                                                <td> <?php echo "$menu->name"; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                
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
                            <h3 class="modal-title" id="modalDialogLabel"><strong>Edit Role</strong></h3>
                        </div>
                        <div class="modal-body">
                          <div id="embeddedNotification" style="display:none;"></div>
                          <form role="form" class="form-horizontal" id="form" name="form" parsley-validate="" method="POST" action="<?php echo base_url('admin/role/edit');?>">

                            <input type="hidden" name="id" value="<?php echo "$role->role_id" ?>">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Name</label>
                                <div class="col-sm-8">
                                  <input type="text" name="name" value="<?php echo "$role->name" ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Description</label>
                                <div class="col-sm-8">
                                  <input type="text" id="description" name="description" value="<?php echo "$role->description" ?>" class="form-control">
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
                                                <td><input type="checkbox" name="view[]" value="<?= $menu->menu_id; ?>"
                                                <?php 
                                                $jml=$this->db->query("SELECT * FROM ms_role_detail where menu_id='$menu->menu_id' AND role_id='$role->role_id'")->num_rows();
                                                if ($jml>0) {
                                                    echo "checked='checked'";
                                                } else {
                                                    echo "";
                                                }
                                                ?>
                                                ></td>
                                                <td> <?php echo "$menu->name"; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                
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

            