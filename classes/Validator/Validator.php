<?php
namespace Validator;

class Validator
{
    public function validate($input, $language)
    {
        $string = str_replace([' ', ','], '', trim($input));

        $clean = preg_replace('#\D+#', '', $string);

        if($clean === '')
        {
            switch($language)
            {
                case 'english':
                    return "You not entered a number";
                break;
                case 'russian':
                    return "Вы не ввели число";
                break;
                case 'deutsch':
                    return "Sie haben keine nummer eingegeben";
                break;
                default:
                    return "You not entered a number";
            }
        }

        if(strlen((string)$clean) > 15)
        {
            switch($language)
            {
                case 'english':
                    return "The number is too large. Maximum supported is 999 trillion.";
                break;
                case 'russian':
                    return "Слишком большое число. Максимум — 999 триллионов.";
                break;
                case 'deutsch':
                    return "Die Zahl ist zu groß. Maximalwert — 999 Billionen.";
                break;
                default:
                    return "The number is too large. Maximum supported is 999 trillion.";
            }
        }

        return (int) $clean;
    }
}