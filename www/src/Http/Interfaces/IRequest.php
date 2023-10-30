<?php 

namespace App\Http\Interfaces;

interface IRequest
{
    public static function getMethod(): string;
    public static function body(): array;
}