<?php

namespace Snub69\MVC;

abstract class AbstractSubject
{
    protected 
    $observer;
    
    protected function __construct()
    {
       $this->observer=[]; 
    }
    
    public function register (ObserverInterface $observer)
    {
        $this->observer[]=$observer;
    }
    public function unregister (ObserverInterface $observer)
    {
        $key=array_search($observer, $this->observer);
        if (is_int ($key)) {
            unset ($this->observer[$key]);
        }
    }
    public function notify ()
    {
            foreach ($this->observer as $observer) {
                $observer->update($this);
            }
    }
}
