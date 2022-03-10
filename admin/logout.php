<?php
include('./const.php');
session_destroy();
header("location:"."http://localhost/foodorder/admin/login.php");
?>