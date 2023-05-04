<?php
session_start();
session_destroy();
header("Location: http://localhost/carpool_app/index.php");
exit();
?>