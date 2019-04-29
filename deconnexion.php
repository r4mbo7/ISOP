<?php
setcookie('prenom', ' ', time() + 365*24*3600, null, null, false, true);
setcookie('pass', ' ', time() + 365*24*3600, null, null, false, true);
session_start();
session_unset();
session_destroy();
header('Location: index.php');
exit();
?>