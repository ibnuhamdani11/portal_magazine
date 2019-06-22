            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">            

                <?php 

                $warna = array('#DF0174','#FF0000','#FF8000','#FFBF00','#74DF00','#04B404','#04B4AE','#01A9DB','#0040FF','#A901DB','#6A0888','orange','orange','#DF0174','#FF0000','#6A0888','#74DF00','#6A0888','#FFBF00','#FFBF00','#04B404','#01A9DB');

                $no=0;
                foreach ($menu as $row) {
                ?>            
                    <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary" style="border-color: #D8D8D8;">
                        <div class="panel-heading" style="background-color: <?php echo $warna[$no]; ?>; border-color: #D8D8D8;">
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- <i class="fa fa-comments fa-5x"></i> -->
                                    <div class="text-left bold judul"><?= $row->name;?> </div>
                                
                                    
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url(); ?><?=$row->link;?>">
                            <div class="panel-footer">
                                <span class="pull-left judul2">Show list > </span>
                                <span class="pull-right" style="color: grey;"><i class="fa fa-plus-circle"></i></span>
                                <br>
                            </div>
                        </a>
                    </div>
                </div>

                <?php $no++; } ?>

            </div>
            <!-- /.row -->