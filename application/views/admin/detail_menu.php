
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Menu</h1>

                </div>

            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <?php foreach ($data as $menu) {
                            ?>

                            <label class="control-label"><h4>Show data detail menu</h4></label>
                            <span class="pull-right">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"> Edit</i></button>
                            <div class="btn-group">
                                <a href="<?php echo base_url()."admin/menu/statusEna/".$menu->id; ?>">
                                <button type="button" class="btn btn-success" <?php if ($menu->menu_status == 1) {
                                    # code...
                                    echo "disabled";
                                }?>>Enable</button></a>
                                <a href="<?php echo base_url()."admin/menu/statusDis/".$menu->id; ?>">
                                <button type="button" class="btn btn-danger" <?php if ($menu->menu_status == 0) {
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
                                <th width="25%">Name</th>
                                <td>: <?php echo "$menu->name" ?></td>
                              </tr>
                              <tr>
                                <th>Link</th>
                                <td>: <?php echo "$menu->link" ?></td>
                              </tr>
                              <tr>
                                <th>Position Number</th>
                                <td>: <?php echo "$menu->position_number" ?></td>
                              </tr>
                              <tr>
                                <th>Description</th>
                                <td>: <?php echo "$menu->description" ?></td>
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
                          <button type="button" class="close" data-dimdiss="modal" aria-hidden="true">Close</button>
                            <h3 class="modal-title" id="modalDialogLabel"><strong>Menu</strong></h3>
                        </div>
                        <div class="modal-body">
                          <div id="embeddedNotification" style="display:none;"></div>
                          <form role="form" class="form-horizontal" id="form" name="form" parsley-validate="" method="POST" action="<?php echo base_url();?>admin/menu/edit">
                          <input type="hidden" name="id" value="<?php echo "$menu->id" ?>">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Name</label>
                                <div class="col-md-8">
                                  <input type="text" id="name" name="name" parsley-validation-minlength="1" parsley-minlength="1" value="<?php echo "$menu->name" ?>" parsley-required="true" parsley-trigger="change" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Link</label>
                                <div class="col-md-8">
                                  <input type="text" id="name" name="link" parsley-validation-minlength="1" parsley-minlength="1" value="<?php echo "$menu->link" ?>" parsley-required="true" parsley-trigger="change" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Position Number</label>
                                <div class="col-md-8">
                                  <input type="text" id="name" name="position_number" parsley-validation-minlength="1" value="<?php echo "$menu->position_number" ?>" parsley-minlength="1" parsley-required="true" parsley-trigger="change" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Description</label>
                                <div class="col-md-8">
                                  <input type="text" id="name" name="description" parsley-validation-minlength="1" parsley-minlength="1" value="<?php echo "$menu->description" ?>" parsley-required="true" parsley-trigger="change" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group form-footer">
                                <div class="col-md-offset-8 col-md-4">
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

            