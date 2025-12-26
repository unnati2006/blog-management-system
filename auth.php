<?php
session_start();
// Agar session mein user_id nahi hai, toh login par bhej do
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>