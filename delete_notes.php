
<?php
include 'db.php';

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM notes WHERE id=$id";

    if(mysqli_query($conn, $sql)){
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting note: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}
?>