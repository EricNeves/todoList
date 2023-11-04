<?php

/**
| ------------------------------------------------------
|
| Todo List API
|
| Author: Eric Neves <github.com/ericneves>  
|
| ------------------------------------------------------
*/

/**
 * 
 * Set errors
 */
error_reporting(0);

/**
 * 
 * Set headers
 * Allow CORS - Cross-Origin Resource Sharing
 */
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Type");
    http_response_code(200); 
    return;
  }
  
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: OPTIONS, GET, POST, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type");

/**
 * 
 * Autoload - PSR-4
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * 
 * Variables Environment
 */
Dotenv\Dotenv::createImmutable(__DIR__)->load();


/**
 * 
 * Load routes 
 */
require_once __DIR__ . '/src/routes/api.php';

/**
 * 
 * Set timezone
 */
date_default_timezone_set('America/Sao_Paulo');
