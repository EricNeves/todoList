<?php 

namespace App\Http\Interfaces;

interface IResponse 
{
    public static function json(array $data = [], int $status = 200, array $headers = []): void;
}