<?php

namespace Arfanasri\RadevFramework\Controller;

use Arfanasri\RadevFramework\System\Controller;

class HomeController extends Controller
{
    function index(): void
    {
        $this->view("data/index", ["test" => "test"]);
    }
}