<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Utils\RenderView;

class HomeController
{
    /**
     *
     * @param Request  $request
     * @param Response $response
     */
    public function index(Request $request, Response $response)
    {
        $response::setHeaders([
            'Content-Type' => 'text/html',
        ]);

        try {
            RenderView::render('home', ['title' => 'Home Page']);
        } catch (\Exception $err) {
            echo $err->getMessage();
        }
    }
}