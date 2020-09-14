<?php

namespace App\Config;

class DatabaseConfig
{

        public $driver = 'mysql';
        public $host = 'localhost';
        public $database = 'blog';
        public $username = 'root';
        public $password = 'root';
        public $charset = 'utf8';
        public $collation = 'utf8_general_ci';
        public $prefix = '';
}
