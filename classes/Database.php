<?php 
class Database{

    public static $pdo;
    public static $host = 'sql659.your-server.de';
    public static $username = 'lostra_s';
    public static $dbname = 'schedule';
    public static $password = 'pt7VxpY2YrwFH5zQ';

    public static function innit(){
        self::$pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname, self::$username, self::$password);
    }
}
Database::innit();
?>