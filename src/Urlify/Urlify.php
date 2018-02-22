<?php

namespace Urlify;

class Urlify
{
    protected static $urlifyCache;

    /**
     * Creates a url-safe verison of the string
     * @param $string The string to transform
     * @param $separator The separator to use to transform non word characters into (default '-')
     * @param $ampersand Transform '&' to this (e.g. could set this to 'and') (default null)
     */
    public static function urlify($string, $separator = '-', $ampersand = null)
    {
        if (!is_string($string))
            $string = (string) $string;

        if (strlen($string) == 0)
            return $separator ?: '-';
        
        if (isset(static::$urlifyCache[$string][$separator][$ampersand]))
            return static::$urlifyCache[$string][$separator][$ampersand];

        $origString = $string;
        
        // Romanization of alphabet
        // $string = strtr(...)
        $pairs = array(
            "À" => 'A',
            "Á" => 'A',
            "Â" => 'A',
            "Ã" => 'A',
            "Ä" => 'A',
            "Å" => 'A',
            "Æ" => 'AE',
            "Ç" => 'C',
            "È" => 'E',
            "É" => 'E',
            "Ê" => 'E',
            "Ë" => 'E',
            "Ì" => 'I',
            "Í" => 'I',
            "Î" => 'I',
            "Ï" => 'I',
            "Ð" => 'ETH',
            "Ñ" => 'N',
            "Ò" => 'O',
            "Ó" => 'O',
            "Ô" => 'O',
            "Õ" => 'O',
            "Ö" => 'O',
            "Ø" => 'O',
            "Ù" => 'U',
            "Ú" => 'U',
            "Û" => 'U',
            "Ü" => 'U',
            "Ý" => 'Y',
            "Þ" => 'THORN',
            "ß" => 'sz',
            "à" => 'a',
            "á" => 'a',
            "â" => 'a',
            "ã" => 'a',
            "ä" => 'a',
            "å" => 'a',
            "æ" => 'ae',
            "ç" => 'c',
            "è" => 'e',
            "é" => 'e',
            "ê" => 'e',
            "ë" => 'e',
            "ì" => 'i',
            "í" => 'i',
            "î" => 'i',
            "ï" => 'i',
            "ð" => 'eth',
            "ñ" => 'n',
            "ò" => 'o',
            "ó" => 'o',
            "ô" => 'o',
            "õ" => 'o',
            "ö" => 'o',
            "ø" => 'o',
            "ù" => 'u',
            "ú" => 'u',
            "û" => 'u',
            "ü" => 'u',
            "ý" => 'y',
            "þ" => 'thorn',
            "ÿ" => 'y',
        );
        $string = strtr($string, $pairs);
        $string = trim($string);
        $string = strtolower($string);
        if ($ampersand)
        { 
            $and = $separator . $ampersand;
            $string = str_replace(array('\'', '&'), array('', $separator . $and . $separator), $string);
        }
        $string = preg_replace('/[^\w]+/', $separator, $string);
        $string = str_replace(array('_',$separator.$separator.$separator.$separator, $separator.$separator.$separator, $separator.$separator), $separator, $string);
        if ($ampersand)
        { 
            $string = str_replace(array($and.$and.$and.$and.$separator, $and.$and.$and.$separator, $and.$and.$separator, $and.$separator.$and.$separator), $and.$separator, $string); 
        }

        if (!$string)
            $string = $separator;

        static::$urlifyCache[$origString][$separator][$ampersand] = $string;
        return $string;
    }      
}

