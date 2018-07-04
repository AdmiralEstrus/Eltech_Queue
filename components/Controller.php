<?php

require_once __DIR__ . "View.php";

class Controller
{
    public $view;

    function __construct()
    {
        var_dump("Heheh");
        $this->view = new View();
    }
}