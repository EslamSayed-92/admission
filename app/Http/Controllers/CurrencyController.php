<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends GenericController
{
    public function __construct()
    {
        $this->create_url = "/Currency";
        $this->model = $this->model.'\Currency';
        $this->temp = new $this->model;
        $this->title = 'Currencies';
        $this->model_title = 'Currency';
    }
}
