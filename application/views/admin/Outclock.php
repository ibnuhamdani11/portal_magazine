<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clock Out</title>

    <!-- Bootstrap Core CSS -->
    <?php $url_hrf = 'http://localhost/ticketing/'?>
    <link href="<?= $url_hrf;?>public/theme/sb-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= $url_hrf;?>public/theme/sb-admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= $url_hrf;?>public/theme/sb-admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="<?= $url_hrf;?>public/theme/guest/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= $url_hrf;?>public/theme/sb-admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <div class="col-md-2">
                </div>
                <div class="col-md-4 " style="padding: 0px;">
                    <img src="<?= $url_hrf;?>public/theme/guest/img/admin-login.png" alt="" style="width:100%; height:420px;">
                </div>
                <div class="col-md-4 " style="padding: 0px; background: white; height:420px;">
                <div class="clearfix"></div>
                
                <br>
                <br>
                    <div class="panel-heading">
                        <h3 class="panel-title"><center>CLOCK OUT </h3>                        
                    </div>

                                <div class="alert alert-info" style="min-height: 100px;">
                                    <div class="col-sm-7">
                                        <font size="1px" color="black">DATE</font>
                                        <h4><b><?php  echo date("D, d M Y"); ?></b></h4>
                                    </div>
                                    <div class="col-sm-5">
                                        <font size="1px" color="black">TIME</font>
                                        <h4><b><p id="jam"></p></b></h4>
                                    </div>                                        
                                </div>



                    <div class="panel-body">
                        <form role="form" action="" method="POST">
                            <fieldset>
                                <h6>Scanner Barcode</h6>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Barcode" name="barcode" onkeyup="simpan()" id="barcode" type="text" autofocus>
                                </div> 
                                <div id="ket"></div>                               
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="col-md-2">
                </div>            
        </div>
    </div>

</body>
    <!-- jQuery -->
    <script src="<?= $url_hrf;?>public/theme/sb-admin/vendor/jquery/jquery.min.js"></script>

    <script type="text/javascript">
            
            function simpan(){
            var barcode = $("#barcode").val();
            
                $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>admin/outclock/save",
                data: "barcode="+barcode,
                dataType: "JSON",
                success: function(data) {
                    if (data=='sukses') {
                        alert('Data Berhasil Disimpan!');
                        window.location='<?php echo base_url(); ?>admin/outclock';
                    }

                    if (data=='gagal') {
                        alert('Data Tidak Berhasil Disimpan!');
                        window.location='<?php echo base_url(); ?>admin/outclock';
                    }


                    if (data=='tidak') {
                        alert('Anda Belum Melakukan Clock In!');
                        window.location='<?php echo base_url(); ?>admin/outclock';
                    }

                    
                    console.log(data);
                    
                 }
                });
            };
        </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= $url_hrf;?>public/theme/sb-admin/vendor/bootstrap/js/bootstrap.min.js"></script>

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
