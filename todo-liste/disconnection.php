<?php
session_start(); // unitialise la session
session_unset();// qui va desactiver la session
session_destroy();// detruire la session
setcookie('log', '', time()-3444, '/', null, false, true);
header('location: index.php');

?>