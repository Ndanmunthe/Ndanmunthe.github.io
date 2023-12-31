<div class="span9">
  <ul class="breadcrumb">
    <li><a href="?page=home">Home</a> <span class="divider">/</span></li>
    <li><a href="?page=profil">Profil</a> <span class="divider">/</span></li>
    <li class="active">Update Profil</li>
  </ul>
  <h3> PROFIL UPDATE</h3>
  <hr class="soft"/>
  <?php
  $a = mysql_query("SELECT * FROM pembeli WHERE id_pembeli='".$_SESSION['pengusaha_id']."'",$server);
  $b = mysql_fetch_array($a);
  $id		= $b['id_pembeli'];
  $nama_pembeli = $b['nama_pembeli'];
  $telp		= $b['no_telp'];
  $alamat	= $b['alamat'];
  $kota		= $b['kota'];
  $pos		= $b['pos'];
  $email 	= $b['email'];
  if (isset($_POST['btnupdate'])){
  
  $nama_pembeli = htmlspecialchars($_POST['inputpembeli']);
  $telp		= htmlspecialchars($_POST['inputtelp']);
  $alamat	= htmlspecialchars($_POST['inputalamat']);
  $kota		= htmlspecialchars($_POST['inputkota']);
  $pos		= htmlspecialchars($_POST['inputpos']);
  $email 	= htmlspecialchars($_POST['inputemail']);
  
  		if (!empty($_FILES['inputfoto']['tmp_name'])) {
			$nama_file 		= $_FILES['inputfoto']['name'];
			$ekstensi_file 	= substr(strtolower(strrchr($nama_file, ".")), 1);
			$nama_file 		= $id.".".$ekstensi_file;
			
			copy($_FILES['inputfoto']['tmp_name'],"foto_pembeli/".$nama_file);
		}
		else {
			$nama_file = "";
		}
		
		$addsql = "UPDATE pembeli SET nama_pembeli 	= '" . strip_tags(addslashes($nama_pembeli)) . "',
								 no_telp	= '" . strip_tags(addslashes($telp)) . "',
								 alamat		= '" . strip_tags(addslashes($alamat)) . "',
								 kota		= '" . strip_tags(addslashes($kota)) . "', 
								 pos		= '" . strip_tags(addslashes($pos)) . "',
								 email		= '" . strip_tags(addslashes($email)) . "',
								 foto_pembeli= '$nama_file' 
								 WHERE id_pembeli = '".$_SESSION['pengusaha_id']."'";
		$sukses = mysql_query($addsql, $server);
		
		if ($sukses){
			echo "<div class='alert alert-success alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			<strong>Berhasil Memperbaharui Profil</strong>.
			</div>";
			echo "<meta http-equiv=Refresh content=0;url=?page=profil>";
			
		}
	}
	?>
  <div class="row">
   <form role="form" name="forminput" method="post" enctype="multipart/form-data">
      <div class="span8">
      <div class="well">
        <h5 class="offset1">DATA PERSONAL</h5>
        
          <div class="control-group offset1">
            <label class="control-label" for="inputpembeli">Nama</label>
            <div class="controls">
              <input name="inputpembeli"  type="text" autofocus required class="span3" id="inputpembeli" placeholder="Nama" title="Nama" value="<?php echo $nama_pembeli;?>" maxlength="100">
            </div>
          </div>
          <div class="control-group offset1">
            <label class="control-label" for="inputtelp">No. Telp</label>
            <div class="controls">
              <input name="inputtelp"  type="text" autofocus required class="span3" id="inputtelp" placeholder="No. Telp" title="No. Telp" value="<?php echo $telp;?>" maxlength="15">
            </div>
          </div>
          <div class="control-group offset1">
            <label class="control-label" for="inputalamat">Alamat</label>
            <div class="controls">
              <textarea name="inputalamat" rows="4" autofocus required class="span3" id="inputalamat" placeholder="Alamat" title="Alamat"><?php echo $alamat;?></textarea>
            </div>
          </div>
          <div class="control-group offset1">
            <label class="control-label" for="inputkota">Kota / Kabupaten</label>
            <div class="controls">
              <input name="inputkota"  type="text" autofocus class="span3" id="inputkota" placeholder="Kota / Kabupaten" title="Kota / Kabupaten" autocomplete="on" value="<?php echo $kota;?>" maxlength="50">
            </div>
          </div>
          <div class="control-group offset1">
            <label class="control-label" for="inputpos">Kode Pos</label>
            <div class="controls">
              <input  type="text" autofocus required class="span3" id="inputpos" placeholder="Kode Pos" title="Kode Pos" value="<?php echo $pos;?>" maxlength="6" name="inputpos">
            </div>
          </div>
          
          <div class="control-group offset1">
            <label class="control-label" for="inputemail">Email</label>
            <div class="controls">
              <input  name="inputemail" type="email" autofocus required class="span3" id="inputemail" placeholder="Email" title="Email" autocomplete="off" value="<?php echo $email;?>" maxlength="32">
            </div>
          </div>
          <div class="control-group offset1">
            <label class="control-label" for="inputfoto">Foto</label>
            <div class="controls">
              <input  name="inputfoto" type="file" class="span3" id="inputfoto" placeholder="Foto" title="Foto">
            </div>
          </div>
          <br>
          <div class="control-group offset1">
            <div class="controls">
              <button type="submit" name="btnupdate" class="btn btn-md btn-success">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    
  </div>
</div>
