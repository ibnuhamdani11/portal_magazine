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
<body background="<?= base_url();?>public/theme/guest/img/background-dash.png">

    <div class="container">
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color: white;"><center>CLOCK OUT</center></h1>
            </div>
        </div>
            <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <form role="form" class="form-horizontal" id="form" name="form" parsley-validate="" method="POST" action="<?= base_url();?>Clock/output_checkin" >
                    <div class="panel-body">
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

                        <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <font size="1px;">SCAN QR CODE</font>
                                <input type="text" name="barcode" class="form-control" onkeyup="submit();" autofocus> <br>
                                <?php
                                    if (!empty($_GET['sts'])) {
                                        if ($_GET['sts']=="success") {
                                    ?>
                                        <audio autoplay>
                                          <source src="<?= base_url('upload/music/success.mp3'); ?>" type="audio/mpeg">
                                        </audio>
                                        <div class="alert alert-success msg">
                                            <b>Success</b><br>
                                            <?php
                                            $code=$_GET['code'];
                                            $query = $this->db->query("SELECT * FROM t_ticket, t_attendance, ms_event WHERE t_attendance.ticket_id = '$code' AND t_ticket.ticket_id=t_attendance.ticket_id AND t_ticket.event_id=ms_event.event_id");
                                            $row = $query->row_array();
                                            echo "Name : $row[first_name]";
                                            echo "<br>";
                                                
                                            echo "Check in time : $row[clock]";
                                            
                                            echo "<br>";
                                            echo "Event : $row[event_name]";
                                            ?>
                                        </div>
                                    <?php } elseif ($_GET['sts']=="gagal") { ?>
                                        <audio autoplay>
                                          <source src="<?= base_url('upload/music/warning.mp3'); ?>" type="audio/mpeg">
                                        </audio>
                                        <div class="alert alert-warning msg">
                                            <b>Failed</b>, please try again.
                                        </div>
                                    <?php } elseif ($_GET['sts']=="already") { ?>
                                        <audio autoplay>
                                          <source src="<?= base_url('upload/music/warning.mp3'); ?>" type="audio/mpeg">
                                        </audio>
                                        <div class="alert alert-warning msg">
                                            <b>Failed</b>, please do clock in first.
                                        </div>
                                    <?php } elseif ($_GET['sts']=="not_macth") { ?>
                                        <audio autoplay>
                                          <source src="<?= base_url('upload/music/warning.mp3'); ?>" type="audio/mpeg">
                                        </audio>
                                        <div class="alert alert-warning msg">
                                            <b>Failed</b>, unregistered data.
                                        </div>
                                <?php }} else {} ?>
                            </div>
                        <div class="col-sm-2"></div>
                    </div>
                                
                                

                </form> 
            </div>
            <!-- /.col-lg-12 -->
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
        $(".msg").delay(3200).fadeOut(300);
    </script>
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
