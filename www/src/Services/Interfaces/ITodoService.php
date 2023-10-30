<?php 

namespace App\Services\Interfaces;

interface ITodoService 
{
    public static function fetchAllTodos();
    public static function fetchTodoByID(int|string $id);
    public static function store(array $data);
    public static function update(int|string $id, array $data);
    public static function changeStatus(int|string $id, array $data);
    public static function remove(int|string $id);
}