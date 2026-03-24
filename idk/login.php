<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';


    $valid_user = 'admin';
    $valid_pass = '1234';



    $log = date('Y-m-d H:i:s') . " | Pokus: $username\n";
    file_put_contents('log.txt', $log, FILE_APPEND);


    if ($username === $valid_user && $password === $valid_pass) {
        $_SESSION['user'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Špatné přihlašovací údaje";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Přihlášení</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Uživatelské jméno" required><br><br>
        <input type="password" name="password" placeholder="Heslo" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
