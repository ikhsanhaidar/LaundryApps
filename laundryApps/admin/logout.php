<?php
session_start();
session_destroy();

header("location:../indeks.php?pesan=logout");
?>