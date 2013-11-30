<?php

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/src/Urlify/Urlify.php');

use Urlify\Urlify;

echo Urlify::urlify('blah blah blah');
echo "\n";
// Should output "blah-blah-blah"
echo Urlify::urlify('This is a sentence.');
echo "\n";
// Should output "This-is-a-sentence"
echo Urlify::urlify(utf8_decode("kraüt"));
echo "\n";
   
// Should output "kraut"                                                                                                                                                                       
echo Urlify::urlify('what ever', '.');                                                                                                                                                      echo "\n";
   
// Should output "what.ever"                                                                                                                                                       
echo Urlify::urlify('blah&blah');                                                                                                                                                           echo "\n";
   
// Should output "blah-blah"                                                                                                                                                                   
echo Urlify::urlify('blah&blah', '-', 'and');                                                                                                                                               echo "\n";
   
// Should output "blah-and-blah"

