<?php

namespace App\Models;

use App\Models\Database;
use App\Models\Interfaces\ITodo;

class Todo extends Database implements ITodo
{
    /**
     * 
     * Fetch all todos from table 'todos'
     */
    public static function all()
    {
        try {
            $pdo = self::getConnection();

            $stmt = $pdo->query("SELECT * FROM todos ORDER BY id DESC");
            
            return $stmt->fetchAll(\PDO::FETCH_ASSOC) ?? [];
        } catch (\PDOException $e) {
            // 42P01
            throw new \Exception($e->errorInfo[0]);
        }
    }

    /**
     * 
     * Fetch a todo by id from table 'todos'
     * 
     * @param int|string $id
     */
    public static function getByID(int|string $id)
    {
        try {
            $pdo = self::getConnection();

            $stmt = $pdo->prepare("SELECT * FROM todos WHERE id = ?");
            $stmt->execute([$id]);
            
            return $stmt->fetch(\PDO::FETCH_ASSOC) ?? []; 
        } catch (\PDOException $e) {
            // 42P01
            throw new \Exception($e->errorInfo[0]);
        }
    } 

    /**
     * 
     * Create a todo in table 'todos'
     * 
     * @param array $data
     */
    public static function create(array $data)
    {
        try {
            $pdo = self::getConnection();

            $stmt = $pdo->prepare("INSERT INTO todos (task) VALUES (?)");
            $stmt->execute([$data['task']]);
            
            if ($pdo->lastInsertId() > 0) {
                return [
                    'id'    => $pdo->lastInsertId(),
                    'task'  => $data['task']
                ];
            } else {
                return [];
            }
        } catch (\PDOException $e) {
            // 42P01
            throw new \Exception($e->errorInfo[0]);
        }
    }

    /**
     * 
     * Update a todo in table 'todos'
     * 
     * @param int|string $id
     * @param array $data
     */
    public static function update(int|string $id, array $data) 
    {
        try {
            $pdo = self::getConnection();

            $stmt = $pdo->prepare("UPDATE todos SET task = ? WHERE id = ?");
            $stmt->execute([$data['task'], $id]);
            
            if ($stmt->rowCount() > 0) {
                return [
                    'id'    => $id,
                    'task' => $data['task']
                ];
            } else {
                return [];
            }
        } catch (\PDOException $e) {
            // 42P01
            throw new \Exception($e->errorInfo[0]);
        }
    }

    /**
     * 
     * Update status todo in table 'todos'
     * Completed or not completed
     * 
     * @param int|string $id
     * @param array $data
     */
    public static function updateStatus(int|string $id, array $data)
    {
        try {
            $pdo = self::getConnection();

            $stmt = $pdo->prepare("UPDATE todos SET completed = ? WHERE id = ?");
            $stmt->execute([$data['completed'], $id]);
            
            if ($stmt->rowCount() > 0) {
                return [
                    'id'        => $id,
                    'completed' => $data['completed'],
                ];
            } else {
                return [];
            }
        } catch (\PDOException $e) {
            // 42P01
            throw new \Exception($e->errorInfo[0]);
        }
    }

    /**
     * 
     * Delete a todo in table 'todos'
     * 
     * @param int|string $id
     */
    public static function delete(int|string $id)
    {
        try {
            $pdo = self::getConnection();

            $stmt = $pdo->prepare("DELETE FROM todos WHERE id = ?");
            $stmt->execute([$id]);
            
            if ($stmt->rowCount() > 0) {
                return [
                    'id' => $id
                ];
            } else {
                return [];
            }
        } catch (\PDOException $e) {
            // 42P01
            throw new \Exception($e->errorInfo[0]);
        }
    }
}