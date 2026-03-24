<?php
session_start();

/* pevné přihlašovací údaje */
$fixedUser = "admin";
$fixedPass = "1234";

/* LOGOUT */
if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

/* LOGIN */
$error = "";

if (isset($_POST["uname"], $_POST["psw"])) {
    if ($_POST["uname"] === $fixedUser && $_POST["psw"] === $fixedPass) {
        $_SESSION["uname"] = $_POST["uname"];
    } else {
        $error = "Špatné jméno nebo heslo.";
    }
}
?>  
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<?php if (isset($_SESSION["uname"])): ?>

    <h2>Přihlášen jako <?= $_SESSION["uname"] ?></h2>
    <a href="?logout=1">Odhlásit se</a>

<?php else: ?>

    <h2>Přihlášení</h2>

    <?php if ($error): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="uname" placeholder="Uživatelské jméno" required><br><br>
        <input type="password" name="psw" placeholder="Heslo" required><br><br>

        <label>
            <input type="checkbox" name="remember">
            Pamatovat si mě
        </label><br><br>

        <button type="submit">Přihlásit</button>
    </form>

<?php endif; ?>

</body>
</html>
