<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tabulka</title>
</head>
<body>

<form method="post">
    Řádky: <input type="number" name="row" min="1"><br>
    Sloupce: <input type="number" name="col" min="1"><br>
    <input type="submit" value="Vytvořit tabulku">
</form>

<?php
// DŮLEŽITÉ: nejdřív zkontrolovat, jestli existují
$row = isset($_POST["row"]) ? (int)$_POST["row"] : 0;
$col = isset($_POST["col"]) ? (int)$_POST["col"] : 0;

if ($row > 0 && $col > 0) {

    echo "<table border='2'>";

    for ($i = 0; $i < $row; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $col; $j++) {
            echo "<td>$i.$j</td>";
        }
        echo "</tr>";
    }

    echo "</table>";

} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "Zadej platné hodnoty.";
}
?>

</body>
</html>
