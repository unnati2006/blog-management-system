<?php
require_once 'db.php';

// 1. Fetch all posts from the database (newest first)
$query = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Personal Blog</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; max-width: 800px; margin: 0 auto; padding: 20px; }
        .post { border-bottom: 1px solid #ccc; margin-bottom: 20px; padding-bottom: 10px; }
        .date { color: #666; font-size: 0.9em; }
    </style>
</head>
<body>
    <h1>Welcome to My Blog</h1>
    <a href="admin/create.php">+ Write New Post</a>
    <hr>

    <?php if (empty($posts)): ?>
        <p>No posts yet. Go to the admin panel to write your first one!</p>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <h2><?php echo htmlspecialchars($post['title']); ?></h2>
                <p class="date">Posted on: <?php echo $post['created_at']; ?></p>
                <p><?php echo nl2br(htmlspecialchars(substr($post['content'], 0, 150))); ?>...</p>
                <a href="post.php?id=<?php echo $post['id']; ?>">Read Full Post</a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>