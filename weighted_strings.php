<?php
// using php 7.3 or newest

function validateString($string, $queries = []) : array
{
    $chars = [];
    $alphabets = range('a', 'z');
    for ($i=0; $i < strlen($string); $i++) { 
        $char = $string[$i];
        $charScore = array_search($char, $alphabets) + 1;
        if (!$i) {
            $chars[$char] = $charScore;
            continue;
        }
  
        $lastIndexedChar = array_key_last($chars);
        $char = strpos($lastIndexedChar, $char) !== false ? $lastIndexedChar . $char : $char;
        $chars[$char] = $charScore * strlen($char);
    }
    
    return array_map(function ($query) use ($chars) {
        return in_array($query, $chars) ? 'Yes' : 'No';
    }, $queries);
}


$string = 'abbcccd';
$queries = [1, 3, 9, 8];

var_dump(validateString($string, $queries));
