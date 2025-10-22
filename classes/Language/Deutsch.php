<?php
namespace Language;
class Deutsch
{
    public string $zero = 'null';
    
    public array $units = [['eins', 'zwei', 'drei', 'vier', 'fünf', 'sechs', 'sieben', 'acht', 'neun']];

    public array $teens = [10 => 'zehn', 11 => 'elf', 12 => 'zwölf', 13 => 'dreizehn', 14 => 'vierzehn', 15 => 'fünfzehn',
    16 => 'sechzehn', 17 => 'siebzehn', 18 => 'achtzehn', 19 => 'neunzehn'];

    public array $tens = [2 => 'zwanzig', 3 => 'dreißig', 4 => 'vierzig', 5 => 'fünfzig', 6 => 'sechzig', 7 => 'siebzig',
    8 => 'achtzig', 9 => 'neunzig'];

    public array $hundreds = [1 => 'einhundert', 2 => 'zweihundert', 3 => 'dreihundert', 4 => 'vierhundert',
    5 => 'fünfhundert', 6 => 'sechshundert', 7 => 'siebenhundert', 8 => 'achthundert', 9 => 'neunhundert'];

    public array $thousands = [['tausend'], ['million'], ['milliarde'], ['billion']];
}

?>