<?php

class View
{
    function generate($contentView, $data = null)
    {

        if (is_array($data)) {
            extract($data);
        }

        include __DIR__ . $contentView;
    }
}