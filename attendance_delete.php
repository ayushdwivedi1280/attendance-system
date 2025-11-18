<?php
include "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    mysqli_query($conn, "DELETE FROM attendance WHERE id = '$id'");
    header("Location: attendance_report.php?deleted=1");
    exit;
}
?>
