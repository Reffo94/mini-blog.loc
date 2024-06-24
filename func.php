<?php
use Src\Db;
spl_autoload_register(function ($classname){
    require_once __DIR__ . '\\' . $classname . '.php';
});

$db = new Db();

function dump($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}