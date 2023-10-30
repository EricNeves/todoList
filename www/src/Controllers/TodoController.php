<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\TodoService;

class TodoController
{
    /**
     * 
     * @param Request  $request
     * @param Response $response
     */
    public function index(Request $request, Response $response)
    {
        $todos = TodoService::fetchAllTodos();

        if (isset($todos['db_error'])) {
            return $response::json([
                'error'   => true,
                'success' => false,
                'message' => $todos['db_error']
            ], 400);
        }

        return $response::json([
            'error'   => false,
            'success' => true,
            'data'    => $todos
        ]);
    }

    /**
     * 
     * @param Request  $request
     * @param Response $response
     * @param array    $param
     */
    public function fetchByID(Request $request, Response $response, array $params)
    {
        $todo = TodoService::fetchTodoByID($params[0]);

        if (isset($todo['db_error'])) {
            return $response::json([
                'error'   => true,
                'success' => false,
                'message' => $todo['db_error']
            ], 400);
        }

        if (isset($todo['error'])) {
            return $response::json([
                'error'   => true,
                'success' => false,
                'message' => $todo['error']
            ], 400);
        }

        return $response::json([
            'error'   => false,
            'success' => true,
            'data'    => $todo
        ]);
    }

    /**
     * 
     * @param Request  $request
     * @param Response $response
     */
    public function create(Request $request, Response $response)
    {
        $data = $request::body();

        $todo = TodoService::store($data);

        if (isset($todo['db_error'])) {
            return $response::json([
                'error'   => true,
                'success' => false,
                'message' => $todo['db_error']
            ], 400);
        }

        if (isset($todo['error'])) {
            return $response::json([
                'error'   => true,
                'success' => false,
                'message' => $todo['error']
            ], 400);
        }

        return $response::json([
            'error'   => false,
            'success' => true,
            'data'    => $todo
        ]);
    }

    /**
     * 
     * @param Request  $request
     * @param Response $response
     * @param array    $param
     */
    public function update(Request $request, Response $response, array $params)
    {
        $data = $request::body();

        $todo = TodoService::update($params[0], $data);

        if (isset($todo['db_error'])) {
            return $response::json([
                'error'   => true,
                'success' => false,
                'message' => $todo['db_error']
            ], 400);
        }

        if (isset($todo['error'])) {
            return $response::json([
                'error'   => true,
                'success' => false,
                'message' => $todo['error']
            ], 400);
        }

        return $response::json([
            'error'   => false,
            'success' => true,
            'data'    => $todo
        ]);
    }

    /**
     * 
     * @param Request  $request
     * @param Response $response
     * @param array    $param
     */
    public function updateStatus(Request $request, Response $response, array $params)
    {
        $data = $request::body();

        $todo = TodoService::changeStatus($params[0], $data);

        if (isset($todo['db_error'])) {
            return $response::json([
                'error'   => true,
                'success' => false,
                'message' => $todo['db_error']
            ], 400);
        }

        if (isset($todo['error'])) {
            return $response::json([
                'error'   => true,
                'success' => false,
                'message' => $todo['error']
            ], 400);
        }

        return $response::json([
            'error'   => false,
            'success' => true,
            'data'    => $todo
        ]);
    }

    /**
     * 
     * @param Request  $request
     * @param Response $response
     * @param array    $param
     */
    public function remove(Request $request, Response $response, array $params)
    {
        $todo = TodoService::remove($params[0]);

        if (isset($todo['db_error'])) {
            return $response::json([
                'error'   => true,
                'success' => false,
                'message' => $todo['db_error']
            ], 400);
        }

        if (isset($todo['error'])) {
            return $response::json([
                'error'   => true,
                'success' => false,
                'message' => $todo['error']
            ], 400);
        }

        return $response::json([
            'error'   => false,
            'success' => true,
            'data'    => $todo
        ]);
    }
}