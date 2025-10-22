<?php
namespace Language;
class English
{
    public string $zero = 'zero';
    
    public array $units = [['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine']];

    public array $teens = [10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
    16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen', 19 => 'nineteen'];

    public array $tens = [2 => 'twenty', 3 => 'thirty', 4 => 'forty', 5 => 'fifty', 6 => 'sixty', 7 => 'seventy',
    8 => 'eighty', 9 => 'ninety'];

    public array $hundreds = [1 => 'one hundred', 2 => 'two hundred', 3 => 'three hundred', 4 => 'four hundred',
    5 => 'five hundred', 6 => 'six hundred', 7 => 'seven hundred', 8 => 'eight hundred',
    9 => 'nine hundred'];

    public array $thousands = [['thousand'], ['million'], ['billion'], ['trillion']];
}

?>