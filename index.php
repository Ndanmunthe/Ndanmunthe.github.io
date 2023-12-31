<?php
  session_start();
  if(empty($_SESSION['telah-login'])){
	 echo "<meta http-equiv='refresh' content='0; url=aplikasi/?page=home'>";
  }else if(!empty($_SESSION['telah-login'])){
  	 echo "<meta http-equiv='refresh' content='0; url=aplikasi/?page=home'>";
  }

?>