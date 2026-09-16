<?php
session_start();
if (isset($_SESSION["admin_id"]) || isset($_SESSION["stu_id"])) {
    session_destroy();
}
header("location:admin.php");
?>