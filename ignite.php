<?php
include "core.php";

$title = $_POST['title'];
$artist = $_POST['artist'];
$duration = $_POST['duration'];

mysqli_query($core, "INSERT INTO tracks (title, artist, duration) VALUES ('$title', '$artist', '$duration')");

header("Location: portal.php");
?>