<?php
setcookie("cc_usr", "", time()-3600);
header("Location: index.php");
?>