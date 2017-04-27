<?php

namespace Snub69\MVC;

class View implements ObserverInterface
{
    public $template;
    public function __construct()
    {
        $this->template="";
    }
    public function update (SubjectInterface $subject)
    {
        $this->template="<h1>" . $subject->title . "</h1>";
    }
    public function render()
    {
        return $this->template;
    }
}
