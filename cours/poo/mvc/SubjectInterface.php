<?php

namespace Snub69\MVC;

interface SubjectInterface
{
    public function register (ObserverInterface $observer);
    public function unregister (ObserverInterface $observer);
    public function notify ();
}
