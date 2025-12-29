<?php
require_once 'auth.php';
require_once '../db.php';

$stmt = $pdo->query("SELECT id, title, created_at FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll();
?>
<link rel="stylesheet" href="../css/style.css">
<h1>Admin Dashboard</h1>
<a href="create.php">+ Create New Post</a> | <a href="../index.php">View Site</a>
<hr>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Title</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    <?php foreach($posts as $post): ?>
    <tr>
        <td><?php echo htmlspecialchars($post['title']); ?></td>
        <td><?php echo $post['created_at']; ?></td>
        <td>
            <a href="edit.php?id=<?php echo $post['id']; ?>">Edit</a> | 
            <a href="delete.php?id=<?php echo $post['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
