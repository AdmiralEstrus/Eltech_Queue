<?php
/**
 * Created by PhpStorm.
 * User: kiran
 * Date: 04.07.2018
 * Time: 4:20
 */

class Controller
{
    public $view;

    function __construct()
    {
        $this->view = new View();
    }
}