<?php
include "core.php";

if (isset($_GET['erase'])) {
    $id = $_GET['erase'];
    mysqli_query($core, "DELETE FROM tracks WHERE id = '$id'");
}

if (isset($_GET['obliterate'])) {
    mysqli_query($core, "TRUNCATE TABLE tracks");
}

header("Location: portal.php");
?>