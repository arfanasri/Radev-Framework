<?php

namespace Arfanasri\RadevFramework\System;

class Controller
{
    protected function view(string $view, array $data = [])
    {
        View::render($view, $data);
    }
}