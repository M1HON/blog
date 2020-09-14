<?php

namespace App\Components;

use App\Config\DatabaseConfig;
use App\Config\Install;
use PDO;

class Database
{
    public static function connect_to_database()
    {
        $config = new DatabaseConfig;
        $dsn = "mysql:host={$config->host};dbname={$config->database}";
        $connection = new PDO($dsn, $config->username, $config->password);
        $connection->exec("set names utf8");
        $check_tables = new Install();
        $check_tables->Chek_tables($connection);
        return  $connection;
    }
 
}
