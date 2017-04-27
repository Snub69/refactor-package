<?php

namespace Snub69\MVC;

class Model extends AbstractSubject implements SubjectInterface
{
    public $title;
    
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->title="hello";
        $this->notify();
    }
}
