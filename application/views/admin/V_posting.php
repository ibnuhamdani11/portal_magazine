<div id="page-wrapper">
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">POSTING</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="http://wrappixel.com/templates/pixeladmin/" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a>
            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Table</a></li>
                <li class="active">Data Table</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">

        <div class="col-sm-12">
            <div class="white-box">
                <!-- <h3 class="box-title m-b-0">Data Export</h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p> -->
                <div class="row">
                    <div class="col-sm-3"> 
                        <button class="btn btn-block btn-success " data-toggle="modal" data-target="#modalAdd">Add Data</button>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width:5%;">No</th>
                                <th style="width:15%;">Judul</th>
                                <th style="width:15%;">Isi</th>
                                <th style="width:15%;">Kategori</th>
                                <th style="width:15%;">Penulis</th>
                                <th style="width:10%;">Gambar Judul</th>
                                <th style="width:10%;">Gambar Banner</th>
                                <th style="width:15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                                foreach($data_table as $data){?>
                                    <tr>
                                        <td><?= $no++;?></td>
                                        <td><?= $data->judul_post;?></td>
                                        <td><?= substr($data->isi_post,0,100);?> ...</td>
                                        <td><?= $data->nama_kategori;?></td>
                                        <td><?= $data->penulis;?></td>
                                        <td><a href="<?= base_url('upload/image_post/'.$data->gambar_judul); ?>" target="_blank">
                                                <img style="width: 70px;" src="<?= base_url('upload/image_post/'.$data->gambar_judul); ?>" alt=""></a></td>
                                        <td><a href="<?= base_url('upload/image_post/'.$data->gambar_banner); ?>" target="_blank">
                                                <img style="width: 70px;" src="<?= base_url('upload/image_post/'.$data->gambar_banner); ?>" alt=""></a></td>
                                        <td>
                                            <button type="button" data-toggle="modal" class="btn btn-info btn-circle" title="detail" onclick="location.href='<?= base_url('admin/post?action=show&val='.$data->post_id);?>'"><i class="fa fa-eye"></i> </button>
                                            <button type="button" data-toggle="modal" data-target="#modalEdit" class="btn btn-warning btn-circle" title="edit" onclick="location.href='<?= base_url('admin/post?action=edit&val='.$data->post_id);?>'"><i class="fa fa-edit"></i> </button>
                                            <a href='<?= base_url('admin/post/hapus/'.$data->post_id);?>'><button type="button" class="btn btn-danger btn-circle" title="delete" onclick="return confirm('Are you sure to delete this data');"><i class="fa fa-trash-o"></i> </button></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- .right-sidebar -->
    <div class="right-sidebar">
        <div class="slimscrollright">
            <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
            <div class="r-panel-body">
                <ul>
                    <li><b>Layout Options</b></li>
                    <li>
                        <div class="checkbox checkbox-info">
                            <input id="checkbox1" type="checkbox" class="fxhdr">
                            <label for="checkbox1"> Fix Header </label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox checkbox-warning">
                            <input id="checkbox2" type="checkbox" checked="" class="fxsdr">
                            <label for="checkbox2"> Fix Sidebar </label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox checkbox-success">
                            <input id="checkbox4" type="checkbox" class="open-close">
                            <label for="checkbox4"> Toggle Sidebar </label>
                        </div>
                    </li>
                </ul>
                <ul id="themecolors" class="m-t-20">
                    <li><b>With Light sidebar</b></li>
                    <li><a href="javascript:void(0)" theme="default" class="default-theme">1</a></li>
                    <li><a href="javascript:void(0)" theme="green" class="green-theme">2</a></li>
                    <li><a href="javascript:void(0)" theme="gray" class="yellow-theme">3</a></li>
                    <li><a href="javascript:void(0)" theme="blue" class="blue-theme working">4</a></li>
                    <li><a href="javascript:void(0)" theme="purple" class="purple-theme">5</a></li>
                    <li><a href="javascript:void(0)" theme="megna" class="megna-theme">6</a></li>
                    <li><b>With Dark sidebar</b></li>
                    <br/>
                    <li><a href="javascript:void(0)" theme="default-dark" class="default-dark-theme">7</a></li>
                    <li><a href="javascript:void(0)" theme="green-dark" class="green-dark-theme">8</a></li>
                    <li><a href="javascript:void(0)" theme="gray-dark" class="yellow-dark-theme">9</a></li>
                    <li><a href="javascript:void(0)" theme="blue-dark" class="blue-dark-theme">10</a></li>
                    <li><a href="javascript:void(0)" theme="purple-dark" class="purple-dark-theme">11</a></li>
                    <li><a href="javascript:void(0)" theme="megna-dark" class="megna-dark-theme">12</a></li>
                </ul>
                <ul class="m-t-20 chatonline">
                    <li><b>Chat option</b></li>
                    <li>
                        <a href="javascript:void(0)"><img src="<?= base_url();?>public/theme/pixeladmin/plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="<?= base_url();?>public/theme/pixeladmin/plugins/images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="<?= base_url();?>public/theme/pixeladmin/plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="<?= base_url();?>public/theme/pixeladmin/plugins/images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="<?= base_url();?>public/theme/pixeladmin/plugins/images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="<?= base_url();?>public/theme/pixeladmin/plugins/images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="<?= base_url();?>public/theme/pixeladmin/plugins/images/users/john.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="<?= base_url();?>public/theme/pixeladmin/plugins/images/users/pawandeep.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /.right-sidebar -->
</div>
<!-- /.container-fluid -->
<footer class="footer text-center"> 2017 &copy; Pixel Admin brought to you by wrappixel.com </footer>
</div>

<!-- modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalAdd" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Add Data</h4> </div>
            <div class="modal-body">
                <form data-toggle="validator" method="POST" enctype="multipart/form-data" action="<?= base_url('admin/post/simpan');?>">
                    <div class="form-group">
                        <label for="inputJudul" class="control-label">Judul</label>
                        <input type="text" class="form-control" id="inputJudul" name="judul" placeholder="Tutorial Ternak Lele" required> 
                    </div>
                    <div class="form-group">
                        <label for="isi" class="control-label">Isi</label>
                        <!-- <input type="text" class="form-control" id="inputJudul1" placeholder="Cina Saffary" required>  -->
                        <textarea class="form-control textareas" name="isi" required></textarea> <span class="help-block with-errors">Examp. bla blabla bla blabla blablabla</span>
                    </div>
                    <div class="form-group">
                        <label for="selectKategori" class="control-label">Kategori Posting</label>
                        <select class="form-control" id="selectKategori" name="kategori" required>
                            <option value=""> -- Pilih Kategori --</option>
                            <?php 
                                foreach($data_kategori as $kategori){
                                    echo "<option value=".$kategori->kategori_id.">".$kategori->nama."</option>";
                                }
                            ?>
                        </select>
                    </div>                    
                    <div class="form-group">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <div class="white-box">
                                    <h3 class="box-title">Gambar Judul</h3>
                                    <!-- <label for="input-file-now-custom-1">You can add a default value</label> -->
                                    <input type="file" id="input-file-now-custom-1" name="gambar_judul" class="dropify" /> 
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="white-box">
                                    <h3 class="box-title">Gambar Banner</h3>
                                    <!-- <label for="input-file-now-custom-1">You can add a default value</label> -->
                                    <input type="file" id="input-file-now-custom-1" name="gambar_banner" class="dropify" /> 
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPenulis" class="control-label">Penulis/Pengarang</label>
                        <input type="text" class="form-control" id="inputPenulis" placeholder="Hamdani" name="penulis" required> 
                    </div>
                    <div class="form-group">
                        <label for="inputCreatedBy" class="control-label">Created By</label>
                        <input type="text" class="form-control" id="inputCreatedBy" name="created_by" value="<?= $this->session->userdata('username');?>" required> 
                    </div>
                    <div class="form-group">
                        <label class="control-label">Status</label>
                        <div class="radio">
                            <input type="radio" name="status" value="1" id="aktif" required>
                            <label for="aktif"> Aktif </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="status" value="0" id="tidakAktif" required>
                            <label for="tidakAktif"> Tidak Aktif </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php
if(isset($_GET['action'])){
    switch ($_GET['action']){
        case "show":
        ?>
        <!-- modal -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalShow" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Detail Data</h4> </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Judul</label>
                            <br>
                            <?= $data_show->judul_post;?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Isi</label>
                            <br>
                            <?= $data_show->isi_post;?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kategori Posting</label>
                            <br>
                            <?= $data_show->kategori_post;?>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <div class="white-box">
                                        <h3 class="box-title">Gambar Judul</h3>
                                        <!-- <label for="input-file-now-custom-1">You can add a default value</label> -->
                                        <a href="<?= base_url('upload/image_post/'.$data->gambar_judul); ?>" target="_blank">
                                            <img style="width: 70px;" src="<?= base_url('upload/image_post/'.$data->gambar_judul); ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <div class="white-box">
                                        <h3 class="box-title">Gambar Banner</h3>
                                        <!-- <label for="input-file-now-custom-1">You can add a default value</label> -->
                                        <a href="<?= base_url('upload/image_post/'.$data->gambar_banner); ?>" target="_blank">
                                            <img style="width: 70px;" src="<?= base_url('upload/image_post/'.$data->gambar_banner); ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Penulis/Pengarang</label>
                            <br>
                            <?= $data_show->penulis;?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Created By</label>
                            <br>
                            <?= $data_show->created_by;?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <br>
                            <?= $data_show->status;?>
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <script type='text/javascript'>
            $(document).ready(function(){
                $('#modalShow').modal('show');
                // alert('sssss');
            });
        </script>
        <?php
        break;
        case "edit":
        ?>
            <!-- modal -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalEdit" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myLargeModalLabel">Edit Data</h4> </div>
                        <div class="modal-body">
                            <form data-toggle="validator" method="POST" enctype="multipart/form-data" action="<?= base_url('admin/post/edit');?>">
                                <div class="form-group">
                                    <label for="inputJudul" class="control-label">Judul</label>
                                    <input type="hidden" name="id" value="<?= $data_edit->post_id;?>">
                                    <input type="text" class="form-control" id="inputJudul" name="judul" value="<?= $data_edit->judul_post;?>" required> 
                                </div>
                                <div class="form-group">
                                    <label for="isi" class="control-label">Isi</label>
                                    <!-- <input type="text" class="form-control" id="inputJudul1" placeholder="Cina Saffary" required>  -->
                                    <textarea class="form-control textareas" name="isi" required><?= $data_edit->isi_post;?></textarea> <span class="help-block with-errors"></span>
                                </div>
                                <div class="form-group">
                                    <label for="selectKategori" class="control-label">Kategori Posting</label>
                                    <select class="form-control" id="selectKategori" name="kategori" required>
                                        <option value=""> -- Pilih Kategori --</option>
                                        <?php 
                                            foreach($data_kategori as $kategori){
                                                ?>
                                                <option value="<?= $kategori->kategori_id;?>" <?php if($data_edit->kategori_post == $kategori->kategori_id){echo "selected";}?> ><?= $kategori->nama;?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Ganti Gambar ?</label>
                                    <div class="radio">
                                        <input type="radio" name="ganti_gambar" value="1" id="ya" required>
                                        <label for="ya"> Ya </label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="ganti_gambar" value="0" id="tidak" required>
                                        <label for="tidak"> Tidak </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        
                                        <div class="form-group col-sm-6">
                                            <div class="white-box">
                                                <h3 class="box-title">Gambar Judul</h3>
                                                <!-- <label for="input-file-now-custom-1">You can add a default value</label> -->
                                                <input type="file" id="input-file-now-custom-1" name="gambar_judul" class="dropify" data-default-file="<?= base_url('upload/image_post/'.$data_edit->gambar_judul);?>"/> 
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <div class="white-box">
                                                <h3 class="box-title">Gambar Banner</h3>
                                                <!-- <label for="input-file-now-custom-1">You can add a default value</label> -->
                                                <input type="file" id="input-file-now-custom-1" name="gambar_banner" class="dropify" data-default-file="<?= base_url('upload/image_post/'.$data_edit->gambar_banner);?>"/> 
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPenulis" class="control-label">Penulis/Pengarang</label>
                                    <input type="text" class="form-control" id="inputPenulis" value="<?= $data_edit->penulis;?>" name="penulis" required> 
                                </div>
                                <div class="form-group">
                                    <label for="inputCreatedBy" class="control-label">Created By</label>
                                    <input type="text" class="form-control" id="inputCreatedBy" name="created_by" value="<?= $this->session->userdata('username');?>" required> 
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Status</label>
                                    <div class="radio">
                                        <input type="radio" name="status" value="1" <?php if($data_edit->status == "1"){ echo "checked";}?> id="aktif" required>
                                        <label for="aktif"> Aktif </label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="status" value="0" <?php if($data_edit->status == "0"){ echo "checked";}?> id="tidakAktif" required>
                                        <label for="tidakAktif"> Tidak Aktif </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <script type='text/javascript'>
                $(document).ready(function(){
                    $('#modalEdit').modal('show');
                });
            </script>
        <?php
        break;
    }
}
?>