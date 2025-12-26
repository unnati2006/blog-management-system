<?php
require_once '../db.php';

$id = $_GET['id'] ?? null;
if (!$id) { die("Invalid ID"); }

// 1. Purana data fetch karna
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch();

// 2. Agar Form Submit hua toh Update karna
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $updateStmt = $pdo->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
    $updateStmt->execute([$title, $content, $id]);
    
    header("Location: dashboard.php");
    exit;
}
?>

<h1>Edit Post</h1>
<form method="POST">
    <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required><br><br>
    <textarea name="content" rows="10" cols="50" required><?php echo htmlspecialchars($post['content']); ?></textarea><br><br>
    <button type="submit">Update Post</button>
</form>
<a href="dashboard.php">Cancel</a>