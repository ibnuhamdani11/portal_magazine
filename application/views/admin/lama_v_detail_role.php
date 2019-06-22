<?php 
    foreach ($data_count as $role) {
        $count_rows = $role->count_rows;
    }
?>

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
                            <?php foreach ($data_role as $role) {
                            ?>

                            <label class="control-label"><h4>Show data detail menu</h4></label>
                            <span class="pull-right">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editModal"><i class="fa fa-download"> Edit</i></button>
                            <div class="btn-group">
                              <button type="button" class="btn btn-success">Enable</button>
                              <button type="button" class="btn btn-danger">Disable</button>
                            </div>
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
                            <?php } ?>
                        <!-- </div> -->
                            <!-- /.table-responsive -->
                            
                        </div>

                        <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="tblroledetail" name="tblroledetail">
                                    <thead>
                                        <tr>

                                            <!-- <th> <?php echo $id ?> Name</th> -->
                                            <th width="5%">check</th>
                                            <th> Menu</th>
                                            <!-- <th width="10%">add</th>
                                            <th width="10%">edit</th>
                                            <th width="10%">delete</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $i=0;
                                         foreach ($data_menu as $menu) {
                                            $i++ ?>
                                            <tr>
                                                <td><input type="checkbox" disabled readonly
                                                <?php 
                                                    foreach ($data_roledetail as $roledetail) {
                                                        if($roledetail->menu_id == $menu->id){
                                                            if($roledetail->view == 1){
                                                                echo "checked";
                                                            }
                                                        }
                                                        
                                                    }
                                                ?>
                                                ></input></td>
                                                <td>
                                                <input type="hidden">
                                                <?php echo "$menu->name" ?></td>
                                                <!-- <td><input type="checkbox" value="1" name="add_<?= $i;?>"></input></td>
                                                <td><input type="checkbox" value="1" name="edit_<?= $i;?>"></input></td>
                                                <td><input type="checkbox" value="1" name="delete_<?= $i;?>"></input></td> -->
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
                            <h4 class="modal-title" id="modalDialogLabel"><strong>Edit Role</strong></h4>
                        </div>
                        <div class="modal-body">
                          <div id="embeddedNotification" style="display:none;"></div>
                          <form role="form" class="form-horizontal" id="form" name="form" parsley-validate="" method="POST" action="<?php echo base_url();?>admin/role/edit">
                            <input type="hidden" name="id" value="<?php echo "$role->id" ?>">
                            <input type="hidden" name="jumlah_menu" value="<?= $count_rows; ?>">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Name</label>
                                <div class="col-sm-8">
                                  <input type="text" id="name" name="name" value="<?php echo "$role->name" ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Description</label>
                                <div class="col-sm-8">
                                  <input type="text" id="description" name="description" value="<?php echo "$role->description" ?>" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="tblroledetail" name="tblroledetail">
                                    <thead>
                                        <tr>

                                            <!-- <th> <?php echo $id ?> Name</th> -->
                                            <th width="5%">check</th>
                                            <th> Menu</th>
                                            <!-- <th width="10%">add</th>
                                            <th width="10%">edit</th>
                                            <th width="10%">delete</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $i=0;
                                         foreach ($data_menu as $menu) {
                                            $i++ ?>
                                            <tr>
                                                <td><input type="checkbox" 
                                                <?php 
                                                    echo " name='view_".$menu->id."' ";
                                                    foreach ($data_roledetail as $roledetail) {                                                    
                                                        if($roledetail->menu_id == $menu->id){
                                                            if($roledetail->view == 1){
                                                                echo " checked ";                                                                
                                                            }
                                                        }
                                                        
                                                    }
                                                ?>
                                                ></input></td>
                                                <td>
                                                <input type="hidden" name="menuId_<?= $menu->id;?>" value="<?= $menu->id?>">
                                                <?php 
                                                echo "$menu->name" 
                                                
                                                ?></td>
                                                <!-- <td><input type="checkbox" value="1" name="add_<?= $i;?>"></input></td>
                                                <td><input type="checkbox" value="1" name="edit_<?= $i;?>"></input></td>
                                                <td><input type="checkbox" value="1" name="delete_<?= $i;?>"></input></td> -->
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

            