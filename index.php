<?php
require_once 'db.php';


$query = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <title>My Personal Blog</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; max-width: 800px; margin: 0 auto; padding: 20px; }
        .post { border-bottom: 1px solid #ccc; margin-bottom: 20px; padding-bottom: 10px; }
        .date { color: #666; font-size: 0.9em; }
    </style>
</head>
<body>
    <div class="container">
    <header>
        <div class="container">
            <span class="logo">My Personal Blog</span>
        </div>
    </header>

    <?php foreach($posts as $post): ?>
        <div class="post-card">
            <h2><?php echo $post['title']; ?></h2>
            <p><?php echo substr($post['content'], 0, 150); ?>...</p>
            <br>
            <a href="post.php?id=<?php echo $post['id']; ?>" class="btn">Read More</a>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
</html>
