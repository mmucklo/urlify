<?php

require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/../src/Urlify/Urlify.php');

use Urlify\Urlify;

class UrlifyTest extends PHPUnit_Framework_TestCase
{
    public function testUrlify()
    {
        $urltests = array("This Test's Apostrophe" => 'this-tests-apostrophe',
                          "@#$%@##^@ @#%@#$%@#$%@#$%@#$%" => '-',
                          "" => '-',
                          "_+0990-0&*(&*(*)(&&*)(&*)(32@#%" => '-0990-0-and-32-',
                          10000 => '10000',
                          'kra�t' => 'kraut',
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
                          "��������������������������������������������������������������" => strtolower("AAAAAAAECEEEEIIIIETHNOOOOOOUUUUYTHORNszaaaaaaaeceeeeiiiiethnoooooouuuuythorny")
			  );
	foreach ($urltests as $key => $value)
	{
            print "Testing $key urlifies to: $value\n";
            $this->assertEquals($value, Urlify::urlify($key, '-', 'and'));
            print "Testing $key urlifies with '+' to: " . str_replace('-', '+', $value) . "\n";
            $this->assertEquals(str_replace('-', '+', $value), Urlify::urlify($key, '+', 'and'));
	}

	print "\n";
    }
}