<?php
//inclusion Autoload Composer
require_once __DIR__."vendor/autoload.php";
try{
    $pdo = new \PDO("mysql:host=localhost;dbname=kandt","root","root");
    $pdo->query('set NAMES \'utf8\'');
} catch(PDOException $e){
    die($e->getMessage());
}

/**
 * @param $value1
 * @param $value2
 */
function isActive($value1, $value2)
{
    if ($value1 == $value2){
        return 'active';
    } else {
        return '';
    }
}
