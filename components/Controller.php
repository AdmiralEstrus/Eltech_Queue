<?php

include_once __DIR__ . "View.php";

class Controller
{
    public $view;

    function __construct()
    {
        $this->view = new View();
    }
}