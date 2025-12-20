<?php
require_once 'db.php';

// 1. Get the ID from the URL (e.g., post.php?id=5)
$id = $_GET['id'] ?? null;

if (!$id) {
    die("Post ID not specified.");
}

// 2. Fetch only the post with that specific ID
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch();

if (!$post) {
    die("Post not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo htmlspecialchars($post['title']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
    <p><em>Published on: <?php echo $post['created_at']; ?></em></p>
    <hr>
    <div>
        <?php echo nl2br(htmlspecialchars($post['content'])); ?>
    </div>
    <br>
    <a href="index.php">&larr; Back to Home</a>
</body>
</html>