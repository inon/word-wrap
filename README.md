A simple string helper that mimics PHP's `wordwrap()`

Install
-------

```
composer require inon/word-wrap
```

How to use
----------

```
use  Inon\Wrapper\WordWrap;

...


$wrapper = new WordWrap('lorem ipsum', 2);

echo $wrapper->handler()

```



Plans
----------
```
Make this as full blown PHP string helper, add more array_helpers and etc.
```
