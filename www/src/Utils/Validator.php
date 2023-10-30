<?php 

namespace App\Utils;

class Validator
{
    /**
     * 
     * @param array $fields
     */
    public static function validate(array $fields)
    {
        foreach ($fields as $key => $field) {
            if (empty(trim($field))) {
                throw new \Exception("The field $key is required.");
            }
        }

        return $fields;
    }
}