<?php

    $dns = "mysql:host=localhost;dname=m";
    $username = "host";
    $password = "heslo123";

    try {

        $db = new PDO($dns, $username, $password);
        echo "Jsme připojeni";
    }
    catch (PDOException $e){
        echo "nezdařilo se připojit".$e->getMessage();
        exit();
    }


    
?>