<?php 

namespace App\Models;

class Database 
{
    /**
     * 
     * Get the database connection
     */
    public static function getConnection()
    {
        try {
            $pdo = new \PDO(
                "pgsql:host=".$_ENV['DB_HOST'].";port=".$_ENV['DB_PORT'].";dbname=".$_ENV['DB_NAME']."",
                $_ENV['DB_USER'], $_ENV['DB_PASS']
            );

            return $pdo;
        } catch (\PDOException $e) {
            // 08006
            throw new \Exception($e->errorInfo[0]);
        }
    }
}
