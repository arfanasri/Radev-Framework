<?php

namespace Arfanasri\RadevFramework\System;

class View
{
    public static function render($view, $model)
    {
        extract($model);
        require_once __DIR__ . '/../view/' . $view . '.php';
    }
}