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
    }

    public function stringDataProvider()
    {
        return array(
            array("This Test's Apostrophe", 'this-tests-apostrophe'),
            array("@#$%@##^@ @#%@#$%@#$%@#$%@#$%", '-'),
            array("", '-'),
            array("_+0990-0&*(&*(*)(&&*)(&*)(32@#%", '-0990-0-and-32-'),
            array(10000, '10000'),
            array('kraüt', 'kraut'),
            array("ò", 'o'),
            array("ó", 'o'),
            array("ô", 'o'),
            array("õ", 'o'),
            array("ö", 'o'),
            array("ø", 'o'),
            array("ù", 'u'),
            array("ú", 'u'),
            array("û", 'u'),
            array("ü", 'u'),
            array("ý", 'y'),
            array("ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ", strtolower("AAAAAAAECEEEEIIIIETHNOOOOOOUUUUYTHORNszaaaaaaaeceeeeiiiiethnoooooouuuuythorny"))
        );
    }
}
