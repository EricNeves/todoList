<?php 

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

class NotFoundController 
{
    /**
     *
     * @param Request  $request
     * @param Response $response
     */
    public function index(Request $request, Response $response)
    {
        return $response::json([
            'error'   => true,
            'success' => false,
            'message' => 'Sorry, endpoint not found.'
        ], 404);
    }
}