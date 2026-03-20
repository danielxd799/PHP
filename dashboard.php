<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$logs = file_exists('log.txt') ? file_get_contents('log.txt') : 'Žádné logy';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Vítej, <?php echo $_SESSION['user']; ?></h2>
    <h3>Logy:</h3>
    <pre><?php echo htmlspecialchars($logs); ?></pre>
    <a href="logout.php">Odhlásit se</a>
</body>
</html>
