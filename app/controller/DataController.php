<?php

namespace Arfanasri\RadevFramework\Controller;

use Arfanasri\RadevFramework\Model\DataModel;
use Arfanasri\RadevFramework\System\Controller;

class DataController extends Controller
{
    function index()
    {
        $dataModel = new DataModel();
        $data = [
            "data" => $dataModel->ambilSemuaData()
        ];
        $this->view("data/data", $data);
    }

    function formtambah()
    {
        $this->view("data/formtambah");
    }

    function formubah()
    {
        $this->view("data/formubah");
    }
}