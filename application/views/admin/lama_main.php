<?php 

date_default_timezone_set("Asia/Jakarta");

function rupiah($nilai, $pecahan = 0) {
    return number_format($nilai, $pecahan, ',', '.');
} 
?>
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
    <link href="<?php echo base_url();?>public/theme/sb-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url();?>public/theme/sb-admin/vendor/bootstrap/css/footer.css" rel="stylesheet"> -->

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>public/theme/sb-admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>public/theme/sb-admin/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/theme/sb-admin/dist/css/style.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>public/theme/sb-admin/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>public/theme/sb-admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url();?>public/theme/sb-admin/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>public/theme/sb-admin/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" /> -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

    <!-- tambahan plugin datepicker--> 
    <!-- <link rel="stylesheet" href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css"/> -->
    <link href="<?php echo base_url();?>public/theme/sb-admin/vendor/datetimepicker-0.0.11/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>public/select2.min.css" rel="stylesheet">

    <!-- tambahan plugin export--> 
    <!-- <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet"> -->
    <link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        @font-face {
            font-family: roboto;
            src: url(<?php echo base_url();?>public/font/Roboto-Regular.ttf);
        }
        body {
            font-family: roboto;
            background: #f8f8f8;
        }

        .sidebar ul li {
            border-bottom: 1px solid #e7e7e7;
            padding: 0px;
        }
        .nav > li > a {
            position: relative;
            display: block;
            padding: 15px 25px;
        }
        .modal-header {
            background-color: #F2F2F2;
            border:1px solid #F2F2F2;
            text-align: center;
            text-transform: uppercase;
        }
        .modal-body {
            background-color: #FAFAFA;
        }
        .page-header {
            font-size: 24px;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
        }
        small {
            color: grey;
        }

        @media screen and (min-width: 1100px) {
        .menu {
             overflow: auto;
             height: 550px;
        }
        }
        
    </style>

            


</head>

<body onLoad="waktu()">

    <div id="wrapper">

        <!-- Navigation -->
        
        <div class="row" style="margin: 0px; padding: 0px;">
            <div class="col-md-3" style="padding: 11px 30px 11px 30px; background-image: url('<?php echo base_url();?>public/theme/guest/img/logoexposi_web-04.jpg'); background-size: 100% 100%; height: 82px;">
            
        </div>
        <div class="col-md-9" style="padding: 0px;">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background: white;">
            <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                
                <li><a href="<?=base_url();?>admin/accountsetting"><?= $this->session->userdata("username");?></a></li>
                <li><a href="<?=base_url();?>admin/accountsetting"><i class="fa fa-gear"></i></a></li>
                <li><a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-sign-out"></i></a></li>
            </ul>
        
        <div class="col-md-12" style="padding: 5px 15px; margin-top: 0px; background-color: #F5F5F5; font-size: 15px;">
                <?= date("D");?>,&nbsp;&nbsp;<?= date("M-d-Y H:i");?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        </div>
        </div>
        </div>

        <div class="row" style="margin: 0px; padding: 0px;">
        <div class="col-md-3 menu" style="padding: 0px;">

            <?php $this->load->view('./admin/menu'); ?>
        </nav>  
        </div>      <!--  -->
        <div class="col-md-9" style="background:white; min-height: 550px;">

            <?php $this->load->view($content);?>

        </div>
        </div>
        </div>
        <!-- /#page-wrapper -->
        <footer class="footer">
        <!-- <div class="container"> -->
            <div class="row" style="padding: 0px; margin: 0px;">
                <div class="col-md-12">
                <div class="clearfix"></div>
                    <p align="center">Copyright &copy; 2017 PT. Okta Sejahtera Insani - Hospital Expo. All Rights Reserved. <small font-color="white">Powered By</small> <a href="www.sap-samara.com" target="_blank">Samara</a></p>
                <div class="clearfix"></div>
                </div>
            </div>
        <!-- </div> -->
        
        <!-- /.container -->
    </footer>

    

   
            <!-- jQuery -->
            <script src="<?php echo base_url();?>public/theme/sb-admin/vendor/jquery/jquery.min.js"></script>
            <script type="text/javascript">
            function isi_otomatis(qr){
                $.ajax({
                url: "<?= base_url('admin/ajax_certificate'); ?>",
                data:"qr="+qr ,
                dataType: 'json',
                success: function(data) {
                    $('#nm').val(data.nama);
                }
                });
            };

            $('.event_id').change(function() {
                var event_id = $(this).val(); 
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url('admin/transactionheader/ajax_event'); ?>", 
                    data: "event_id=" + event_id, 
                    success: function(data) { 
                        $('.harga').val(data);            
                    }
                });
            }); 

            </script>




            <!-- include tinymce -->
            <script type="text/javascript" src="<?= base_url();?>/tinymce/tiny_mce/tiny_mce_src.js"></script>
            <script type="text/javascript">

            tinyMCE.init({
             
              mode : "textareas",
                
              // ===========================================
              // Set THEME to ADVANCED
              // ===========================================
                
              theme : "advanced",
                
              // ===========================================
              // INCLUDE the PLUGIN
              // ===========================================
             
              plugins : "jbimages,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
                
              // ===========================================
              // Set LANGUAGE to EN (Otherwise, you have to use plugin's translation file)
              // ===========================================
             
              language : "en",
                 
              theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
              theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
              theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
             
              // ===========================================
              // Put PLUGIN'S BUTTON on the toolbar
              // ===========================================
             
              theme_advanced_buttons4 : "jbimages,|,insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
                
              theme_advanced_toolbar_location : "top",
              theme_advanced_toolbar_align : "left",
              theme_advanced_statusbar_location : "bottom",
              theme_advanced_resizing : true,
                
              // ===========================================
              // Set RELATIVE_URLS to FALSE (This is required for images to display properly)
              // ===========================================
             
              relative_urls : false
                
            });
             
            </script>    


    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#view_image')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    
    

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>public/theme/sb-admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    
    
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>public/theme/sb-admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>public/theme/sb-admin/vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url();?>public/theme/sb-admin/vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url();?>public/theme/sb-admin/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>public/theme/sb-admin/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>public/theme/sb-admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>public/theme/sb-admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>public/theme/sb-admin/vendor/datatables-responsive/dataTables.responsive.js"></script>

  
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>

    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
    <script>
        $('#form').validate();
    </script>



    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/2.18.1/moment.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
     $(document).ready(function() {
      $('#end_date').datetimepicker();
      });
    </script>

    
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function() {
                $('.tanggal').datepicker({
                  format: 'yyyy-mm-dd',
                  autoclose:true
            });
                $('.tanggal1').datepicker({
                  format: 'yyyy-mm-dd',
                  autoclose:true
            });
                $('.tanggal2').datepicker({
                  format: 'yyyy-mm-dd',
                  autoclose:true
            });
                $('.tanggal3').datepicker({
                  format: 'yyyy-mm-dd',
                  autoclose:true
            });
                $('.tanggal4').datepicker({
                  format: 'yyyy-mm-dd',
                  autoclose:true
            })
                $('.tanggal5').datepicker({
                  format: 'yyyy-mm-dd',
                  autoclose:true
            })
            });        
    </script> 


    <script src="<?php echo base_url();?>public/theme/sb-admin/js/jquery.mask.js"></script>
    <script >
        $(document).ready(function(){
                $(".tanggal").mask("9999-99-99");
                $(".tanggal1").mask("9999-99-99");
                $(".tanggal2").mask("9999-99-99");
                $(".tanggal3").mask("9999-99-99");
                $(".tanggal4").mask("9999-99-99");
                $(".tanggal5").mask("9999-99-99");                
                $(".angka2").mask("99");
                $(".angka3").mask("999");
                $(".angka4").mask("9999");
                $(".angka5").mask("99999");
                $(".angka6").mask("999999");
                $(".angka7").mask("9999999");
                $(".angka8").mask("99999999");
                $(".angka9").mask("999999999");
                $(".angka10").mask("9999999999");
                $(".angka11").mask("99999999999");
                $(".angka12").mask("999999999999");
                $(".angka13").mask("9999999999999");
                $(".angka14").mask("99999999999999");
        }); 
    </script>


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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
            {   
                extend: 'copy',
                        exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {   
                extend: 'csv',
                        exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {   
                extend: 'excel',
                        exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {   
                extend: 'pdf',
                        exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {   
                extend: 'print',
                        exportOptions: {
                    columns: ':not(:last-child)',
                }
            }
            ]
        });
        // $('#dataTables-example').DataTable({
        //     responsive: true,
        //     dom: 'Bfrtip',
        //     buttons: [
        //         'copy', 'csv', 'excel', 'pdf', 'print'
        //     ]
        // });
    });
    

    </script>


</body>

</html>
