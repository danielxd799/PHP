<?php
$baseDir = __DIR__ . '/files';
if (!is_dir($baseDir)) mkdir($baseDir);

function listFiles($dir) {
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        $path = $dir . '/' . $file;
        echo '<li>';
        if (is_dir($path)) {
            echo " <b>$file</b><ul>";
            listFiles($path);
            echo '</ul>';
        } else {
            echo " <a href='editor.php?file=" . urlencode($path) . "'>$file</a>";
        }
        echo '</li>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>File Manager</title>
</head>
<body>
<h2>Soubory</h2>
<ul>
<?php listFiles($baseDir); ?>
</ul>

<h3>Přidat soubor</h3>
<form method="post" action="editor.php">
    <input type="text" name="newfile" placeholder="např. test.txt">
    <button type="submit">Vytvořit</button>
</form>
</body>
</html>