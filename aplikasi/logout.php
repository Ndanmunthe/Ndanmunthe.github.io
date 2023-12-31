<?php
session_unset("telah-login");
session_unset("pengusaha_username");
session_unset("pengusaha_password");
session_unset("pengusaha_id");
session_unset("pengusaha_level");
echo "<meta http-equiv=Refresh content=0;url=?page=login>";

?>