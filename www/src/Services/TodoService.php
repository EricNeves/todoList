<?php 

namespace App\Services;

use App\Models\Todo;
use App\Utils\Validator;
use App\Services\Interfaces\ITodoService;

class TodoService implements ITodoService
{
    public static function fetchAllTodos()
    {
        try {
            $data = Todo::all();

            return $data;
        } catch (\Exception $e) {
            if ($e->getMessage() === '42P01') return ['db_error' => 'Error in table todos.']; 
            if ($e->getMessage() === '08006') return ['db_error' => 'Error in database todo_list']; 
            if ($e->getMessage() === '42601') return ['db_error' => 'Syntax error in query - table todos.']; 

            return ['error' => $e->getMessage()];
        }
    }

    /**
     * 
     * @param int|string $id
     */
    public static function fetchTodoByID(int|string $id)
    {
        try {
            $todo = Todo::getByID($id);

            if (empty($todo)) {
                return ['error' => 'Sorry, todo not found.'];
            } else {
                return $todo;
            }
        } catch (\Exception $e) {
            if ($e->getMessage() === '42P01') return ['db_error' => 'Error in table todos.']; 
            if ($e->getMessage() === '08006') return ['db_error' => 'Error in database todo_list']; 
            if ($e->getMessage() === '42601') return ['db_error' => 'Syntax error in query - table todos.']; 

            return ['error' => $e->getMessage()];
        }
    }

    /**
     * 
     * @param array $data
     */
    public static function store(array $data)
    {
        try {
            $validatedFields  = Validator::validate([
                'task' => $data['task'] ?? ''
            ]);

            $todo = Todo::create($validatedFields);

            return $todo;
        } catch (\Exception $e) {
            if ($e->getMessage() === '42P01') return ['db_error' => 'Error in table todos.']; 
            if ($e->getMessage() === '08006') return ['db_error' => 'Error in database todo_list']; 
            if ($e->getMessage() === '42601') return ['db_error' => 'Syntax error in query - table todos.']; 

            return ['error' => $e->getMessage()];
        }
    }

    /**
     * 
     * @param int|string $id
     * @param array $data
     */
    public static function update(int|string $id, array $data)
    {
        try {
            $validatedFields  = Validator::validate([
                'task' => $data['task'] ?? ''
            ]);

            $todo = Todo::update($id, $validatedFields);

            if (empty($todo)) {
                return ['error' => 'Sorry, todo not found.'];
            } else {
                return $todo;
            }
        } catch (\Exception $e) {
            if ($e->getMessage() === '42P01') return ['db_error' => 'Error in table todos.']; 
            if ($e->getMessage() === '08006') return ['db_error' => 'Error in database todo_list']; 
            if ($e->getMessage() === '42601') return ['db_error' => 'Syntax error in query - table todos.']; 

            return ['error' => $e->getMessage()];
        }
    }

    /**
     * 
     * @param int|string $id
     * @param array $data
     */
    public static function changeStatus(int|string $id, array $data)
    {
        try {
            $validatedFields  = Validator::validate([
                'completed' => $data['completed'] ?? '',
            ]);

            $todo = Todo::updateStatus($id, $validatedFields);

            if (empty($todo)) {
                return ['error' => 'Sorry, todo not found.'];
            } else {
                return self::fetchTodoByID($id);
            }
        } catch (\Exception $e) {
            if ($e->getMessage() === '42P01') return ['db_error' => 'Error in table todos.']; 
            if ($e->getMessage() === '08006') return ['db_error' => 'Error in database todo_list']; 
            if ($e->getMessage() === '42601') return ['db_error' => 'Syntax error in query - table todos.']; 

            return ['error' => $e->getMessage()];
        }
    }

    /**
     * 
     * @param int|string $id
     */
    public static function remove(int|string $id)
    {
        try {
            $todo = Todo::delete($id);

            if (empty($todo)) {
                return ['error' => 'Sorry, todo not found.'];
            } else {
                return $todo;
            }
        } catch (\Exception $e) {
            if ($e->getMessage() === '42P01') return ['db_error' => 'Error in table todos.']; 
            if ($e->getMessage() === '08006') return ['db_error' => 'Error in database todo_list']; 
            if ($e->getMessage() === '42601') return ['db_error' => 'Syntax error in query - table todos.']; 

            return ['error' => $e->getMessage()];
        }
    }
}