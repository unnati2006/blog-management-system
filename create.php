<?php

require_once '../db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    
    
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts (title, content) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);

    
    try {
        $stmt->execute([$title, $content]);
        echo "<p style='color: green;'>Post saved successfully!</p>";
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create New Post</title>
</head>
<body>
    <h1>Create a New Blog Post</h1>
    <form action="create.php" method="POST">
        <div>
            <label>Title:</label><br>
            <input type="text" name="title" required>
        </div><br>
        <div>
            <label>Content:</label><br>
            <textarea name="content" rows="10" cols="30" required></textarea>
        </div><br>
        <button type="submit" name="submit">Publish Post</button>
    </form>
    <p><a href="../index.php">Go back home</a></p>
</body>
</html>
