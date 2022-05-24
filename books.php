<?php


// Create connection
$conn = mysqli_connect('localhost','root','','library');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// write query for all books

?>
