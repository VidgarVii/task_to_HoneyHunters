<?php
$config = require_once 'config.php';
$dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];
try {
    
   $db = new PDO($dsn, $config['username'], $config['psw']);
}
catch(  PDOException $e  ) {
    
    echo "Фигня какая-то: ".$e->getMessage()."<br>";
    echo "Тут: ".$e->getLine();
}
//Получаем запись из БД



