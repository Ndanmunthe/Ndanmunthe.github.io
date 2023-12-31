    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      <?php 
		include_once "sidebar.php";
		include_once "topbar.php";
		
		$nama	= "";
		$network	= "";
		$launch	= "";
		$body  = "";
		$display  = "";
    $platform	= "";
		$memory	= "";
		$camera	= "";
		$sound  = "";
		$comms  = "";
    $features	= "";
		$battery	= "";
		$misc	= "";
		$tests  = "";
		$harga	= "";
		$stok	= "";
		$ket	="";
		$sel1="";
		$sel2="";
		$sel3="";
		$sel4="";
		$sel5="";
		$sel6="";
		$sel7="";
		
	  ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="page-title">
              <div class="title_left">
                <h3>Produk</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Produk Baru</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <?php
					if(isset($_POST["btnsimpan"])){
						$id 	 = NewKode("produk","PRD"); 
						$nama	 = (ucwords(strtolower($_POST['inputNama'])));
						$network	 = $_POST['inputnetwork'];
						$launch	 = $_POST['inputlaunch'];
						$body	 = $_POST['inputbody'];
						$display	 = $_POST['inputdisplay'];
            $platform	 = $_POST['inputplatform'];
						$memory	 = $_POST['inputmemory'];
						$camera	 = $_POST['inputcamera'];
						$sound	 = $_POST['inputsound'];
            $comms	 = $_POST['inputcomms'];
            $features	 = $_POST['inputfeatures'];
						$battery	 = $_POST['inputbattery'];
						$misc	 = $_POST['inputmisc'];
						$tests	 = $_POST['inputtests'];
						$stok	 = $_POST['inputStok'];
						$harga	 = $_POST['inputHarga'];
						$harga	 = str_replace(" ","",$harga);
						$harga	 = str_replace(".","",$harga);
						$harga	 = str_replace(",","",$harga);
						$namafoto= str_replace(" ","_",$nama);
						
						$cekuname= mysql_num_rows(mysql_query("SELECT nama_produk FROM produk WHERE nama_produk='$nama'"));
						if ($cekuname > 0){
							echo "<div class='alert alert-warning alert-dismissible' role='alert'>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<strong>Produk sudah ada</strong>.
								</div>";
						}else{
							if (!empty($_FILES['inputFoto']['tmp_name'])) {
								$nama_file 		= $_FILES['inputFoto']['name'];
								$ekstensi_file 	= substr(strtolower(strrchr($nama_file, ".")), 1);
								$nama_file 		= $namafoto.".".$ekstensi_file;
								
								copy($_FILES['inputFoto']['tmp_name'],"../images/produk/".$nama_file);
							}
							else {
								$nama_file = "";
							}
							$addsql = "INSERT INTO produk values ('$id','$nama','$network','$launch','$body','$display','$platform','$memory','$camera','$sound','$comms','$features','$battery','$misc','$tests','$stok','$harga','$nama_file')"; 
									
							$sukses = mysql_query($addsql, $server);
							
							if ($sukses){
								echo "<div class='alert alert-success alert-dismissible' role='alert'>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<strong>Berhasil Menambah Produk</strong>.
								</div>";
								echo "<meta http-equiv=Refresh content=0;url=?page=produk>";
								
							}
						  }	
						}
						?>
				  <!-- start of Data Personal -->
				  <form name="forminput" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <p>&nbsp;</p>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputNama">Nama Produk
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputNama" type="text" required class="form-control col-md-7 col-xs-12" id="inputNama" placeholder="Nama Produk" title="Nama" value="<?php echo $nama?>" size="150">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputnetwork">Network
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputnetwork" type="text" required class="form-control col-md-7 col-xs-12" id="inputnetwork" placeholder="Network" title="Network" value="<?php echo $network?>" size="150">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputlaunch">Launch
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputlaunch" required type="text" class="form-control col-md-7 col-xs-12" id="inputlaunch" placeholder="Launch" title="Launch" value="<?php echo $launch?>" size="5">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputbody">Body
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputbody" required type="text" class="form-control col-md-7 col-xs-12" id="inputbody" placeholder="Body" title="Body" value="<?php echo $body?>" size="5">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputdisplay">Display
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputdisplay" required type="text" class="form-control col-md-7 col-xs-12" id="inputdisplay" placeholder="Display" title="Display" value="<?php echo $display?>" size="5">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputplatform">Platform
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputplatform" required type="text" class="form-control col-md-7 col-xs-12" id="inputplatform" placeholder="Platform" title="Platform" value="<?php echo $platform?>" size="5">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputmemory">Memory
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputmemory" required type="text" class="form-control col-md-7 col-xs-12" id="inputmemory" placeholder="Memory" title="Memory" value="<?php echo $memory?>" size="5">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputcamera">Camera
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputcamera" required type="text" class="form-control col-md-7 col-xs-12" id="inputcamera" placeholder="Camera" title="Camera" value="<?php echo $camera?>" size="5">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputsound">Sound
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputsound" required type="text" class="form-control col-md-7 col-xs-12" id="inputsound" placeholder="Sound" title="Sound" value="<?php echo $sound?>" size="5">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputcomms">Comms
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputcomms" required type="text" class="form-control col-md-7 col-xs-12" id="inputcomms" placeholder="Comms" title="Comms" value="<?php echo $comms?>" size="5">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputfeatures">Features
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputfeatures" required type="text" class="form-control col-md-7 col-xs-12" id="inputfeatures" placeholder="Features" title="Features" value="<?php echo $features?>" size="5">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputbattery">Battery
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputbattery" required type="text" class="form-control col-md-7 col-xs-12" id="inputbattery" placeholder="Battery" title="Battery" value="<?php echo $battery?>" size="5">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputmisc">Misc
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputmisc" required type="text" class="form-control col-md-7 col-xs-12" id="inputmisc" placeholder="Misc" title="Misc" value="<?php echo $misc?>" size="5">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputtests">Tests
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputtests" required type="text" class="form-control col-md-7 col-xs-12" id="inputtests" placeholder="Tests" title="Tests" value="<?php echo $tests?>" size="5">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputStok">Stok
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputStok" type="text" class="form-control col-md-7 col-xs-12" id="inputStok" placeholder="Stok" required title="Stok" value="<?php echo $stok?>" size="10">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputHarga">Harga (Rp.)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputHarga" type="text" class="form-control col-md-7 col-xs-12" id="inputHarga" placeholder="Harga" required title="Harga" value="<?php echo $harga?>" size="12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputFoto">File Foto</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="inputFoto" type="file" class="form-control col-md-7 col-xs-12" id="inputFoto" title="File Foto">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?page=produk" class="btn btn-primary">Batal</a>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="btnsimpan" class="btn btn-success">Simpan</button>
                        </div>
                      </div>

                    
                      <!-- end of Data Personal -->
                      
                      </div>
                      </form>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>