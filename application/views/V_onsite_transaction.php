<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Okta Sejahtera Insani</title>

    <!-- Bootstrap Core CSS -->
    
    <link href="<?= base_url();?>public/theme/sb-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= base_url();?>public/theme/sb-admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url();?>public/theme/sb-admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="<?= base_url();?>public/theme/guest/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url();?>public/theme/sb-admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body style="background-image: url('<?= base_url();?>public/theme/guest/img/background-dash.png'); background-repeat: no-repeat;">

    <div class="container">
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color: white;"><center>TRANSACTION ONSITE</center></h1>
            </div>
        </div>
            <!-- /.row -->
        <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <div class="alert alert-info" style="min-height: 100px;">
                                <div class="col-sm-8">
                                    <font size="1px" color="black">DATE</font>
                                    <h3><b><?php  echo date("D, d M Y"); ?></b></h3>
                                </div>
                                <div class="col-sm-4">
                                    <font size="1px" color="black">TIME</font>
                                    <h3><b><p id="jam"></p></b></h3>
                                </div>                                        
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
        </div>
                            

<?php
    $karakter = '1234567890';   
      $order_id = '';   
      for($i = 0; $i < 9; $i++) {   
       $pos = rand(0, strlen($karakter)-1);   
       $order_id .= $karakter{$pos};   
      }
?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12 form-horizontal">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <form method="POST" action="<?= base_url();?>onsite/insert" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Order ID</label>
                            <div class="col-md-6">
                                <input type="text" name="order_id" class="form-control" value="<?= $order_id; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Total Ticket</label>
                            <div class="col-md-6">
                                <input type="text" name="ttl_ticket" class="form-control" value="<?= $ttl_ticket; ?>" readonly>
                            </div>
                        </div>

                        <hr>
                    
                    <?php
                      $event=$this->input->post('event');
                      $qty=$this->input->post('qty');
                      $grand=0;
                      $no=1;
                      foreach ($event as $key => $j) {
                        $sql="SELECT * FROM ms_event where event_id='$j'";
                        $query = $this->db->query($sql);
                        $boking=$query->row();
                        $total = $boking->ticket_price * $qty[$key];
                        $grand  =$grand + $total;
                    ?>
                    <h4><b> <?= $boking->event_name; ?> </b></h4>

                            <?php 
                              for ($x = 1; $x <= $qty[$key]; $x++) {
                            
                                echo '<input type="hidden" name="id_event[]" value='.$boking->event_id.'>
                                      <input type="hidden" name="price[]" value='.$boking->ticket_price.'>';
                                echo '<h4 style="color:blue;"> TICKET '.$x.'</h4>';

                                echo '<div class="form-group">'; 
                                echo '<label class="col-md-4 control-label" >First Name <font color="red">*</font></label>'; 
                                echo '<div class="col-md-6">'; 
                                echo '<input type="text" name="firstNameTicket[]"  class="form-control" Required>'; 
                                echo '</div>'; 
                                echo '</div>';

                                echo '<div class="form-group">'; 
                                echo '<label class="col-md-4 control-label" >Last Name <font color="red">*</font></label>'; 
                                echo '<div class="col-md-6">'; 
                                echo '<input type="text" name="lastNameTicket[]"  class="form-control" Required>'; 
                                echo '</div>'; 
                                echo '</div>'; 

                                echo '<div class="form-group">'; 
                                echo '<label class="col-md-4 control-label" >Name on Certificate <font color="red">*</font></label>'; 
                                echo '<div class="col-md-6">'; 
                                echo '<input type="text" name="nameCertificateTicket[]"  class="form-control" Required>'; 
                                echo '</div>'; 
                                echo '</div>'; 

                                echo '<div class="form-group">'; 
                                echo '<label class="col-md-4 control-label" >Job Position <font color="red">*</font></label>';
                                echo '<div class="col-md-6">';
                                echo '<input type="text" class="form-control" name="jobPositionTicket[]" Required>';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="form-group">'; 
                                echo '<label class="col-md-4 control-label" >Institution/ Company/ Organization <font color="red">*</font></label>'; 
                                echo '<div class="col-md-6">'; 
                                echo '<input type="text" name="organizationTicket[]"  class="form-control" Required>'; 
                                echo '</div>'; 
                                echo '</div>'; 

                                echo '<div class="form-group">'; 
                                echo '<label class="col-md-4 control-label" >Email Address <font color="red">*</font></label>'; 
                                echo '<div class="col-md-6">'; 
                                echo '<input type="email" name="emailTicket[]" class="form-control" Required>'; 
                                echo '</div>'; 
                                echo '</div>';

                                echo '<div class="form-group">'; 
                                echo '<label class="col-md-4 control-label" >Phone Number <font color="red">*</font></label>'; 
                                echo '<div class="col-md-6">'; 
                                echo '<input type="text" name="phoneTicket[]" class="form-control angka14" minlength="10" maxlength="14" Required>'; 
                                echo '</div>'; 
                                echo '</div>';


                                echo '<div class="form-group">'; 
                                echo '<label class="col-md-4 control-label">Price <font color="red">*</font></label>'; 
                                echo '<div class="col-md-6"><b> '.number_format($boking->ticket_price).'</b>';
                              
                                echo '</div>'; 
                                echo '</div>';


                                 echo '<div class="form-group">'; 
                                echo '<label class="col-md-4 control-label" >Kode Promo </label>'; 
                                echo '<div class="col-md-6">'; 
                                echo '<input type="text" name="kode_promo[]" class="form-control">'; 
                                echo '</div>'; 
                                echo '</div>';
                            ?>

                            
                            
                            <?php } ?>
                            <?php
                              echo '<hr>';
                              echo '<h4> Total : <b>'.number_format($total).'</b>';
                              echo '<hr>';
                            $no++; }
                            ?>
                            <p>
                                <h4> Grand Total : <b><?= number_format($grand); ?></b></h4>
                                <input type="hidden" name="total" value="<?= $grand; ?>"> 
                            </p>
                                                       

                            <div class="form-group">
                              <div class="col-md-10">
                                <p class="pull-right">
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin membuat transaksi ini!');">&nbsp; &nbsp; Submit &nbsp; &nbsp;</button>
                                </p>
                              </div>
                            </div>
                        </form>

                    </div>
                  </div><!-- /.modal-dialog -->
             </div><!-- /.modal -->
            <!-- End Modal -->    

                </form> 
            </div>
        </div>
           

    <!-- </div> -->

</body>
    <!-- jQuery -->
    <script src="<?= base_url();?>public/theme/sb-admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url();?>public/theme/sb-admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url();?>public/theme/sb-admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url();?>public/theme/sb-admin/dist/js/sb-admin-2.js"></script>
    <!-- jam -->
    
    <script type="text/javascript">
     window.onload = function() { jam(); }

     function jam() {
      var e = document.getElementById('jam'),
      d = new Date(), h, m, s;
      h = d.getHours();
      m = set(d.getMinutes());
      s = set(d.getSeconds());

      e.innerHTML = h +' : '+ m +' : '+ s;

      setTimeout('jam()', 1000);
     }

     function set(e) {
      e = e < 10 ? '0'+ e : e;
      return e;
     }
    </script>


</html>
