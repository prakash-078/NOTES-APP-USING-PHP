<?php
include 'db.php';
if(!$conn)
    { 
       die("Connection failed: " . mysqli_connect_error());
    }
    else
        {
            $sql = "SELECT * FROM notes ORDER BY id DESC";
            $result = mysqli_query($conn, $sql);

           if(!$result){
             die("Query Failed: " . mysqli_error($conn));
}
        }
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Notes</title>
</head>
<body>

<h2>All Notes</h2>

<?php
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
?>

    <div style="border:1px solid black; padding:10px; margin:10px;">
        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
        <p><?php echo htmlspecialchars($row['content']); ?></p>

        <!-- Edit & Delete Buttons -->
        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
       <a href="delete_notes.php?id=<?php echo $row['id']; ?>" 
          class="btn btn-delete"
          onclick="return confirm('Are you sure you want to delete this note?');">
          Delete
        </a>
    </div>

<?php
    }
} else {
    echo "No notes found!";
}
?>

</body>
</html>