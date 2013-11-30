Urlify
=======

Urlify is a library for creating url-safe slugs from text.  It will also down-convert (Romanize) foreign ascii characters into plain ascii.

Installation:
-------------
Add this line to your composer.json "require" section:

### composer.json
```json
    "require": {
       ...
       "oodle/urlify": "*"
```

Usage:
------

```php
Urlify\Urlify::urlify($string, $separator = '-', $ampersand = null)
```

Examples:
---------
use Urlify\Urlify;

echo Urlify::urlify('blah blah blah');
// Should output "blah-blah-blah"

echo Urlify::urlify('This is a sentence.');
// Should output "This-is-a-sentence"

echo Urlify::urlify('kraüt');
// Should output "kraut"

echo Urlify::urlify('what ever', '.');
// Should output "what.ever"

echo Urlify::urlify('blah&blah');
// Should output "blah-blah"

echo Urlify::urlify('blah&blah', '-', 'and');
// Should output "blah-and-blah"
```

Notes:
------
Please note that the string should be in ascii or iso-8859-1 in order for Romanization to work
