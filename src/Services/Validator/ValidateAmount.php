<?php

namespace Korzechowski\RestApi\Services\Validator;

class ValidateAmount
{
    public static function validate($amount)
    {
        $split = str_split($amount);

        if (preg_match("/[<>=]/", $split[0])) {
            return [
                "operator" => $split[0],
                "amount" => (int)$split[1]
            ];
        }

        return false;
    }
}