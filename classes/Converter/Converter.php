<?php
namespace Converter;

use Language\Deutsch;
use Language\English;
use Language\Russian;


class Converter
{
    public $language;

    public function __construct(string $language)
    {
        switch($language)
        {
            case 'russian':
                $this->language = new Russian();
            break;
            case 'english':
                $this->language = new English();
            break;
            case 'deutsch':
                $this->language = new Deutsch();
            break;
            default:
                $this->language = new English();
        }
    }

    public function toTriad( $clean): array
    {
        $triads = [];
        while($clean > 0)
        {
            $triads[] = $clean % 1000;
            $clean = (int) ($clean / 1000);
        }

        return $triads;
    }

    public function convertTriad($num, $position): string
    {
        $words = [];
        $hundred = intdiv($num, 100);
        $tens = $num % 100;
        $ten = intdiv($tens, 10);
        $unit = $tens % 10;
        if($hundred > 0) 
        {
            $words[] = $this->language->hundreds[$hundred];
        }

        if($ten == 1) 
        {
            $words[] = $this->language->teens[$tens];
        } else{
            if($ten > 1) {
                $words[] = $this->language->tens[$ten];
            }
            
            if($unit > 0)
            {
                if(count($this->language->units) > 1)
                {
                    $gen = ($position == 1) ? 1 : 0;
                    $words[] = $this->language->units[$gen][$unit - 1];
                }  else 
                {  
                    $words[] = $this->language->units[0][$unit - 1];
                }
            }
        }

        if($position > 0 && $num > 0)
        {
            $forms = $this->language->thousands[$position - 1];
            $form = $this->getWord($tens, $forms);
            $words[] = $form;
        }

        return implode(' ', $words);
    }

    private function getWord($num, $forms): string
    {

        if(count($forms) === 1)
        {
            return $forms[0];
        }
        if($num % 100 >= 11 && $num % 100 <= 19)
        {
            return $forms[2];
        }

        switch($num % 10)
        {
            case 1:
                return $forms[0];
            case 2:
            case 3:
            case 4: 
                return $forms[1];
            default: return $forms[2];
        }
    }


    public function convertString($clean): string
    {
        if($clean === 0)
        {
            return $this->language->zero;
        }
        
        $triads = $this->toTriad($clean);
        $words = [];

        foreach($triads as $position => $num)
        {
            $words[] = $this->convertTriad($num, $position);
        }

        return trim(implode(' ', array_reverse($words)));
    }

    public function getLang()
    {
        return var_dump($this->language);
    }
}



