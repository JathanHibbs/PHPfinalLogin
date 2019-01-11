<?php
setcookie('username', '', strtotime('-1 year'), '/');
setcookie('password', '', strtotime('-1 year'), '/');
$loggedIn = false;
header("Location:.");
?>
