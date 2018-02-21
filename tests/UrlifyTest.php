<?php

use Urlify\Urlify;
use PHPUnit\Framework\TestCase;

class UrlifyTest extends TestCase
{
    /**
     * @dataProvider stringDataProvider
     */
    public function testUrlify($result, $expect)
    {
        $this->assertEquals($expect, Urlify::urlify($result, '-', 'and'));
        //$this->assertEquals(str_replace('-', '+', $result), Urlify::urlify($expect, '+', 'and'));
    }

    public function stringDataProvider()
    {
        return array(
            array("This Test's Apostrophe", 'this-tests-apostrophe'),
            array("@#$%@##^@ @#%@#$%@#$%@#$%@#$%", '-'),
            array("", '-'),
            array("_+0990-0&*(&*(*)(&&*)(&*)(32@#%", '-0990-0-and-32-'),
            array(10000, '10000'),
            array('kra�t', 'krai-t'),
            array("�", 'i-'),
            array("�", 'i-'),
            array("�", 'i-'),
            array("�", 'i-'),
            array("�", 'i-'),
            array("�", 'i-'),
            array("�", 'i-'),
            array("�", 'i-'),
            array("�", 'i-'),
            array("�", 'i-'),
            array("�", 'i-'),
            array("��������������������������������������������������������������", strtolower("i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-i-"))
        );
    }
}
