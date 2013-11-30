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
                       "�" => 'A',
                       "�" => 'A',
                       "�" => 'A',
                       "�" => 'A',
                       "�" => 'A',
                       "�" => 'A',
                       "�" => 'AE',
                       "�" => 'C',
                       "�" => 'E',
                       "�" => 'E',
                       "�" => 'E',
                       "�" => 'E',
                       "�" => 'I',
                       "�" => 'I',
                       "�" => 'I',
                       "�" => 'I',
                       "�" => 'ETH',
                       "�" => 'N',
                       "�" => 'O',
                       "�" => 'O',
                       "�" => 'O',
                       "�" => 'O',
                       "�" => 'O',
                       "�" => 'O',
                       "�" => 'U',
                       "�" => 'U',
                       "�" => 'U',
                       "�" => 'U',
                       "�" => 'Y',
                       "�" => 'THORN',
                       "�" => 'sz',
                       "�" => 'a',
                       "�" => 'a',
                       "�" => 'a',
                       "�" => 'a',
                       "�" => 'a',
                       "�" => 'a',
                       "�" => 'ae',
                       "�" => 'c',
                       "�" => 'e',
                       "�" => 'e',
                       "�" => 'e',
                       "�" => 'e',
                       "�" => 'i',
                       "�" => 'i',
                       "�" => 'i',
                       "�" => 'i',
                       "�" => 'eth',
                       "�" => 'n',
                       "�" => 'o',
                       "�" => 'o',
                       "�" => 'o',
                       "�" => 'o',
                       "�" => 'o',
                       "�" => 'o',
                       "�" => 'u',
                       "�" => 'u',
                       "�" => 'u',
                       "�" => 'u',
                       "�" => 'y',
                       "�" => 'thorn',
                       "�" => 'y',
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

