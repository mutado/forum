<?php

class Exception{
    public $what;

    public function __construct($what){
        $this->what = $what;
    }
}