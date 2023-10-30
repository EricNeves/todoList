<?php 

namespace App\Models\Interfaces;

interface ITodo 
{
    public static function all();
    public static function getByID(int|string $id);
    public static function create(array $data);
    public static function update(int|string $id, array $data);
    public static function updateStatus(int|string $id, array $data);
    public static function delete(int|string $id);
}