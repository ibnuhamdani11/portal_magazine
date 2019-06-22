<?php
$act=@$_GET['act'];
switch ($act) {
    default:
?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Menu</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Menu</button>
                        <button type="button" class="btn btn-default" onclick="window.location.reload();"><i class="fa fa-refresh"> Reload</i></button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Position Number</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($menu as $data) {?>
                                        <tr>
                                            <td><?php echo "$data->name" ?></td>
                                            <td><?php echo "$data->link" ?></td>
                                            <td><?php echo "$data->position_number" ?></td>
                                            <td><?php echo "$data->description" ?></td>
                                            <td>
                                            <a href="<?php echo base_url()."admin/menu/?act=detail&id=".$data->menu_id; ?>" title="Detail"><button type="button" class="btn btn-warning"><i class="fa fa-eye"></i></button></a>

                                            <a href="<?php echo base_url()."admin/menu/delete/".$data->menu_id; ?>" title="Hapus"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data');"><i class="fa fa-trash"></i></button></a>

                                            <?php if ($data->menu_status=="0") { ?>
                                                <a href="<?= base_url('admin/menu/enable/'.$data->menu_id); ?>" title="Enable">
                                                <button type="button" class="btn btn-success"><i class="fa fa-toggle-on"></i></button></a>
                                            <?php } else { ?>
                                                <a href="<?= base_url('admin/menu/disabled/'.$data->menu_id); ?>" title="Disabled">
                                                <button type="button" class="btn btn-default"><i class="fa fa-toggle-off"></i></button></a>
                                            <?php } ?>

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
                            <h4 class="modal-title text-center" id="modalDialogLabel"><strong>Create Menu</strong></h4>
                        </div>
                        <div class="modal-body">
                          <div id="embeddedNotification" style="display:none;"></div>
                          <form role="form" class="form-horizontal" id="form" name="form" parsley-validate="" method="POST" action="<?= base_url('admin/menu/insert');?>">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Name</label>
                                <div class="col-sm-8">
                                  <input type="text"  name="name"  class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Link</label>
                                <div class="col-sm-8">
                                  <input type="text"  name="link" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Position Number</label>
                                <div class="col-sm-8">
                                  <input type="text"  name="position_number" class="form-control angka4" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Description</label>
                                <div class="col-sm-8">
                                  <input type="text"  name="description" class="form-control" required>
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

<?php 
break;
case 'detail':
$id=@$_GET['id'];
$data=$this->db->query("SELECT * FROM ms_menu where menu_id='$id'")->row();
?>
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

                            <label class="control-label"><h4>Show data detail menu</h4></label>
                            <span class="pull-right">
                              <button type="button" class="btn btn-danger" onclick="window.history.back();"><i class="fa fa-arrow-left"></i></button>
                              
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></button>
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
                                <td>: <?php echo "$data->name" ?></td>
                              </tr>
                              <tr>
                                <th>Link</th>
                                <td>: <?php echo "$data->link" ?></td>
                              </tr>
                              <tr>
                                <th>Position Number</th>
                                <td>: <?php echo "$data->position_number" ?></td>
                              </tr>
                              <tr>
                                <th>Description</th>
                                <td>: <?php echo "$data->description" ?></td>
                              </tr>
                            </table>
                            </div>
                            
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
                            <h3 class="modal-title" id="modalDialogLabel"><strong>Edit Menu</strong></h3>
                        </div>
                        <div class="modal-body">
                          <div id="embeddedNotification" style="display:none;"></div>
                          <form role="form" class="form-horizontal" id="form" name="form" parsley-validate="" method="POST" action="<?php echo base_url('admin/menu/edit');?>">

                          <input type="hidden" name="menu_id" value="<?php echo "$data->menu_id"; ?>">


                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Name</label>
                                <div class="col-md-8">
                                  <input type="text"  name="menu_name"  parsley-minlength="1" value="<?php echo "$data->name"; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Link</label>
                                <div class="col-md-8">
                                  <input type="text"  name="menu_link"  parsley-minlength="1" value="<?php echo "$data->link"; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Position Number</label>
                                <div class="col-md-8">
                                  <input type="text" name="menu_position" value="<?php echo "$data->position_number"; ?>"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Description</label>
                                <div class="col-md-8">
                                  <input type="text"  name="menu_description"  parsley-minlength="1" value="<?php echo "$data->description"; ?>" class="form-control">
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


<?php
break;
} ?>       