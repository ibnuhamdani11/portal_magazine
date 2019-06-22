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
    <style type="text/css">
        .modal-header {
            background-color: #F2F2F2;
            border:1px solid #F2F2F2;
            text-align: center;
            text-transform: uppercase;
        }
        .modal-body {
            background-color: #FAFAFA;
        }
        .modal-dialog {
            width: 80%;
        }
    </style>
    

</head>
<body background="<?= base_url();?>public/theme/guest/img/background-dash.png">

    <div class="container">
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>

        <?php if (!empty($_GET['order'])) { ?>
        <script type="text/javascript">
        var timeleft = 60;
        var downloadTimer = setInterval(function(){
          document.getElementById("progressBar").value = 60 - --timeleft;
          document.getElementById("countdowntimer").textContent = timeleft;
          if(timeleft <= 0)
            clearInterval(downloadTimer);
        },1000); 
       </script>
       <script type="text/javascript">
           setTimeout(function(){ window.location="<?= base_url('onsite?order=733219863'); ?>"; }, 16000);
       </script>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <progress value="0" max="60" id="progressBar" style="width: 100%;"></progress>
                    <label>Pesan ini akan hilang dalam waktu <span id="countdowntimer"> 60 </span> detik</label>

                    <hr>
                    <label>Silahkan salin Order ID dibawah ini dan lakukan pembayaran di loket.</label>
                    <table class="table">
                        <tr>
                            <td width="10%">Order ID</td>
                            <td>: <?php echo $_GET['order']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Detail Ticket</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Event</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no=1;
                                $qty=0;
                                $price=0;
                                $total=0;
                                $order=$_GET['order'];
                                $ticket=$this->db->query("SELECT ms_event.*, sum(t_ticket.price) as total, t_ticket.price, count(t_ticket.ticket_id) as qty FROM ms_event, t_ticket where ms_event.event_id=t_ticket.event_id AND t_ticket.order_id='$order'")->result();
                                foreach ($ticket as $row) {
                                $qty=$qty+$row->qty;
                                $price=$price+$row->price;
                                $total=$total+$row->total;
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?= $row->event_name; ?></td>
                                        <td><?= $row->qty; ?></td>
                                        <td><?= number_format($row->price); ?></td>
                                        <td></td>
                                        <td><?= number_format($row->total); ?></td>
                                    </tr>
                                <?php $no++; } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">Grand Total</th>
                                        <th><?php echo $qty; ?></th>
                                        <th><?php echo number_format($price); ?></th>
                                        <th></th>
                                        <th><?php echo number_format($total); ?></th>
                                    </tr>
                                </tfoot>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <a href="<?= base_url('onsite'); ?>"><button type="button" class="btn btn-primary pull-right">Finish</button></a>
                  </div>
                </div>
            </div>
        </div>                                
        <?php } else { ?>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color: white;"><center>REGISTER ONSITE</center></h1>
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

                        <div class="col-sm-12 text-center">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" style="width: 50%"> R E G I S T E R </button>
                            
                        </div>                      
        </div>
        <?php } ?>
    </div>


            <!-- Insert -->
            <!-- popup -->
            <!-- Modal Alert -->
             <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalDialogLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                            <h4 class="modal-title" id="modalDialogLabel"><strong>TRANSACTION ONSITE</strong></h4>
                        </div>
                        <div class="modal-body">            

                            <div class="row-fluid">
                                    <form action="<?= base_url(); ?>onsite/transaction" method="post">

                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th width="300px">Event</th>
                                                    <th width="100px">Qty</th>
                                                    <th width="80px"></th>
                                                </tr>
                                            </thead>
                                            <!--elemet sebagai target append-->
                                            <tbody id="itemlist">
                                                <tr>
                                                    <td><div id="event"><select class="form-control" name="event[0]">
                                                        <?php foreach ($data_event as $row) {
                                                           echo "<option value='$row->event_id'>$row->event_name</option>";
                                                        } ?>
                                                    </select></div></td>

                                                    <td><input name="qty[0]" class="form-control" /></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <button type="button" class="btn btn-small btn-default" onclick="additem(); return false"><i class="fa fa-plus"></i></button>
                                                        <button type="submit" name="submit" class="btn btn-small btn-primary"><i class="fa fa-check"></i></button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </form>           
                            </div>
                            <script>


                                var i = 1;
                                function additem() {
                    //                menentukan target append
                                    var itemlist = document.getElementById('itemlist');
                                    var event = document.getElementById('event');
                                    
                    //                membuat element
                                    var row = document.createElement('tr');
                                    var event = document.createElement('td');
                                    var qty = document.createElement('td');
                                    var aksi = document.createElement('td');
                     
                    //                meng append element
                                    itemlist.appendChild(row);
                                    row.appendChild(event);
                                    row.appendChild(qty);
                                    row.appendChild(aksi);
                     
                    //                membuat element input
                                    var event_input = document.createElement('select');
                                    event_input.setAttribute('name', 'event[' + i + ']');
                                    event_input.setAttribute('class', 'form-control');

                                    <?php 
                                    $x=1;
                                    foreach ($data_event as $row) { ?>
                                    var option<?= $x; ?> = document.createElement("option");
                                        option<?= $x; ?>.text = "<?= $row->event_name; ?>";
                                        option<?= $x; ?>.value = "<?= $row->event_id; ?>";

                                    event_input.appendChild(option<?= $x; ?>);

                                    <?php $x++; } ?>
                     
                                    var qty_input = document.createElement('input');
                                    qty_input.setAttribute('name', 'qty[' + i + ']');
                                    qty_input.setAttribute('class', 'form-control');
                     
                                    var hapus = document.createElement('span');
                     
                    //                meng append element input
                                    event.appendChild(event_input);                
                                    qty.appendChild(qty_input);
                                    aksi.appendChild(hapus);
                     
                                    hapus.innerHTML = '<button class="btn btn-small btn-default"><i class="fa fa-trash-o"></i></button>';
                    //                membuat aksi delete element
                                    hapus.onclick = function () {
                                        row.parentNode.removeChild(row);
                                    };
                     
                                    i++;
                                }
                            </script>


                        </div>
                     </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
             </div><!-- /.modal -->
            <!-- End Modal -->


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
