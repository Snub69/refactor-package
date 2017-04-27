<?php

namespace Snub69\PageView;

class PageView
{
    public function __construct()
    {
        echo "PageView";
    }
    
    public function foo(bool $arg)
    {
        var_dump($arg);
    }
}