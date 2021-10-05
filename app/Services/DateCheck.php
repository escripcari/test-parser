<?php
namespace App\Services;

use Nette\Utils\DateTime;

class DateCheck
{
    public function isValid (string $strDate, string $strFormat = "d/m/Y", $str_timezone = false)
    {
        $date = DateTime::createFromFormat($strFormat, $strDate);

        if ($date && $date->format('Y') < 1900)
        {
            return false;
        }
        return $date && DateTime::getLastErrors()['warning_count'] == 0;
    }
}
