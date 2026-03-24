<?php
require "db.php";

// SQL dotaz
$stmt = $conn->prepare("SELECT ID, Login, Jmeno, Email, Profil, vytvoren FROM users");
$stmt->execute();

// načtení dat
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="cs">
<head>
<meta charset="UTF-8">
<title>Seznam uživatelů</title>
<style>
table {
  border-collapse: collapse;
  width: 80%;
}
th, td {
  border: 1px solid black;
  padding: 8px;
}
th {
  background-color: #eee;
}
</style>
</head>
<body>

<h2>Seznam uživatelů</h2>

<table>
<tr>
  <th>ID</th>
  <th>Login</th>
  <th>Jméno</th>
  <th>Email</th>
  <th>Profil</th>
  <th>Vytvořen</th>
</tr>

<?php foreach ($users as $user): ?>
<tr>
  <td><?= htmlspecialchars($user['ID']) ?></td>
  <td><?= htmlspecialchars($user['Login']) ?></td>
  <td><?= htmlspecialchars($user['Jmeno']) ?></td>
  <td><?= htmlspecialchars($user['Email']) ?></td>
  <td><?= htmlspecialchars($user['Profil']) ?></td>
  <td><?= htmlspecialchars($user['vytvoren']) ?></td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>