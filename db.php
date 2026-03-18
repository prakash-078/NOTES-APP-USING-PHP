<?php
$conn = mysqli_connect("localhost", "root", "Prakash@123", "notesdb");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>