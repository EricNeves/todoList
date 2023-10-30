<?php 

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

class HomeController 
{
    /**
     *
     * @param Request  $request
     * @param Response $response
     */
    public function index(Request $request, Response $response)
    {
        return $response::json([
            'error'   => false,
            'success' => true,
            'author'  => 'Eric Neves <github.com/ericneves>',
            'message' => 'Welcome to the API.',
        ], 200);
    }
}