<?php
session_start();
session_destroy();

echo "<script>alert('Terima kasih atas kunjungannya'); window.location='index.php?menu=member';</script>";
?>