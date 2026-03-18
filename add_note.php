<?php
include 'db.php';
if(!$conn)
    {
       die("Connection failed: " . mysqli_connect_error());
    }
    $error = "";
    $success = "";
    if(isset($_POST['sb']))
        {
            $title=trim($_POST['title']);
            $note=trim($_POST['note']);
            if(empty($title) || empty($note))
                {
                    $error="All fields are required";
                }
            else
               {
                $query = "INSERT INTO notes(title,content)   VALUES('$title','$note')";
                $execute = mysqli_query($conn,$query);
                if($execute)
                    {
                        $success="Note saved Sucessfully!";
                    }
                    else
                        {
                            $error="Something went wrong!";
                        }

               }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddNotes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Add notes</h2>
         <?php if(!empty($error)) { ?>
        <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <?php if(!empty($success)) { ?>
        <div class="success"><?php echo $success; ?></div>
    <?php } ?>
        <form action="" method="POST">
             <div class="input-group">
            <input type="text" name="title" placeholder="Write title">
        </div>
           <div class="input-group">
            <textarea name="note" placeholder="write note"></textarea>
        </div>
         <button type="submit" name="sb" class="sv">save</button>
          <div class="link">
           <a href="index.php" class="sv">View</a>
           </div>
          <div class="link">
           <a href="dashboard.php" class="sv">Home</a>
       </div>
        </form>
    </div>
</body>
</html>