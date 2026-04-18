<?php
$core = mysqli_connect("localhost", "root", "", "receiptify");

if (!$core) {
    die("Core connection failed: " . mysqli_connect_error());
}
?>