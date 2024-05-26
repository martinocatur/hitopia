<?php

function isBalancedBracket($string) {
	$brackets = [
        '(' => ')',
        '[' => ']',
        '{' => '}'
    ];

    $openingBrackets = [];
    for ($i=0; $i < strlen($string); $i++) {
        $char = $string[$i];
        $isOpeningBracket = array_key_exists($char, $brackets);
        $isClosingBracket = in_array($char, $brackets);
        if (!$isOpeningBracket && !$isClosingBracket) {
            continue;
        }

        if ($isOpeningBracket) {
            $openingBrackets[] = $char;
            continue;
        }

        $lastOpeningBracket = array_pop($openingBrackets);
        $expectedClosingBracket = $brackets[$lastOpeningBracket] ?? NULL;
        if ($char !== $expectedClosingBracket) {
            return false;
        }
    }

    return empty($openingBrackets);
}

echo isBalancedBracket('{{{{[()()]}}}}') ? 'Yes' : 'No';
