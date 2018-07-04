<?php

class View
{
    function generate($contentView, $data = null)
    {

        if (is_array($data)) {
            extract($data);
        }

        require __DIR__ . $contentView;
    }
}