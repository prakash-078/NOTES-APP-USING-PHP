<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM notes WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE notes SET title='$title', content='$content' WHERE id=$id";

    if(mysqli_query($conn, $sql)){
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Note</title>

    <!-- Link your existing CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Edit Note</h2>

    <form method="POST">

        <div class="input-group">
            <input type="text" name="title"
                value="<?php echo htmlspecialchars($row['title']); ?>" required>
        </div>

        <br>

        <div class="input-group">
            <textarea name="content" rows="5" required><?php echo htmlspecialchars($row['content']); ?></textarea>
        </div>

        <br>

        <!-- Reusing your button style -->
        <button type="submit" name="update" class="btn">Update Note</button>

    </form>

    <div class="link">
        <a href="index.php" class="btn">← Back</a>
    </div>
</div>

</body>
</html>