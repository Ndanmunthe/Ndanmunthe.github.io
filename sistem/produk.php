    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      <?php 
		include_once "sidebar.php";
		include_once "topbar.php";
		
	  ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Produk</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <a href="?page=tambah-produk" title="Tambah Produk" class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i> Tambah Produk</a>
                    <?php?>
                    </p>
                    <table id="data-tabel" class="table jambo_table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th width="15%">ID</th>
                          <th>Produk</th>
                          <th width="100%">Network</th>
                          <th width="100%">Launch</th>
                          <th width="100%">Body</th>
                          <th width="100%">Display</th>
                          <th width="100%">Platform</th>
                          <th width="100%">Memory</th>
                          <th width="100%">Camera</th>
                          <th width="100%">Sound</th>
                          <th width="100%">Comms</th>
                          <th width="100%">Features</th>
                          <th width="100%">Battery</th>
                          <th width="100%">Misc</th>
                          <th width="100%">Tests</th>
                          <th width="100%">Stok</th>
                          <th width="100%">Harga</th>
                          <th width="20%">#</th>
                          <?php?>
                        </tr>
                      </thead>
                      <tbody>
						<?php
						$sql 	= "SELECT * FROM produk ORDER BY id_produk DESC";
						$query 	= mysql_query($sql,$server);
						
						while ($data = mysql_fetch_array($query)){
						$id		= $data['id_produk'];
						$nama	 = $data['nama_produk'];
		        $network	 = $data['network'];
		        $launch	 = $data['launch'];
		        $body	 = $data['body'];
		        $display	 = $data['display'];
            $platform	 = $data['platform'];
		        $memory	 = $data['memory'];
		        $camera	 = $data['camera'];
		        $sound	 = $data['sound'];
            $comms	 = $data['comms'];
            $features	 = $data['features'];
		        $battery	 = $data['battery'];
		        $misc	 = $data['misc'];
		        $tests	 = $data['tests'];
						$stok	= $data['stok'];
						$harga	= format_rupiah($data['harga']);
                        ?>

                      	<tr>
                          <td><a href="?page=produk-detail&id=<?php echo $id?>" title="Detail"><i class="fa fa-eye"></i> <?php echo $id?></a></td>
                          <td><?php echo $nama?></td>
                          <td><?php echo $network?></td>
                          <td><?php echo $launch?></td>
                          <td><?php echo $body?></td>
                          <td><?php echo $display?></td>
                          <td><?php echo $platform?></td>
                          <td><?php echo $memory?></td>
                          <td><?php echo $camera?></td>
                          <td><?php echo $sound?></td>
                          <td><?php echo $comms?></td>
                          <td><?php echo $features?></td>
                          <td><?php echo $battery?></td>
                          <td><?php echo $misc?></td>
                          <td><?php echo $tests?></td>
                          <td><?php echo $stok?></td>
                          <td>Rp. <?php echo $harga?></td>
                          
                          <td>
                          <a href="?page=edit-produk&id=<?php echo $id?>" title="Edit" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>	
                          
                          <a href="?page=hapus-karyawan&id=<?php echo $id?>" title="Hapus" onClick="return confirm('Yakin ingin menghapus karyawan &quot;<?php echo $nama?>&quot; ?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                          </td>
                          <?php }?>
                          <?php?>
                        </tr>
                        <?php?>
                      </tbody>
                    </table>
                  </div>
                  
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include "../lib/footer.php";?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    
    <!-- DATA TABES SCRIPT -->
    <script src="../vendors/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../vendors/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        $('#data-tabel').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": false,
          "bInfo": false,
          "bAutoWidth": true
        });
      });
    </script>

  </body>
</html>