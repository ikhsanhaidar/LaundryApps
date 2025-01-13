<?php
    $conn =  new mysqli('localhost', 'root', '', 'db_laundry');

    if($conn->connect_error)die('Koneksi Gagal:'. $conn->connect_error);
?>