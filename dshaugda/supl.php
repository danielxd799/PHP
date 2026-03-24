<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label>Text</label> <br>
        <input type="text" name="text"> <br>
        <label>Number</label> <br>
        <input type="number" name="cislo" id="name"> <br>
        <label>Nova promena</label> <br>
        <input type="text" name="nove"> <br>
        <input type="submit" name="submit" value="submit">
    </form>

<?php

    var_dump($_POST['text']);
    echo "<br>";
    var_dump($_POST['cislo']);

    $a = 22;
    $b = "22";
    $c = 22.345;

    echo "<br>";
    echo var_dump($a);
    echo var_dump($b);
    echo var_dump($c);


    $cislo = (float)$_POST['cislo'];
    var_dump($cislo);

    if(is_numeric($_POST['text'])){
        echo $_POST['text'] + 1;
    } else {
        echo("Není číslo");
    }

    $cislo2 = filter_var($_POST['nove'], FILTER_VALIDATE_INT);
    if ($cislo2 !== FALSE){
        echo("Máš čáslo - celé");
    } else {
        echo("Nemáš celé číslo");
    }

?>
</body>
</html>