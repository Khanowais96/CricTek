<?php


session_start();
unset($_SESSION['owner_id']);
header("Location: g_ownerlogin.php");
?>