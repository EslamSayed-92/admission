<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentType;

class PaymentTypeController extends GenericController
{
    //
    public function __construct()
    {
        $this->create_url = "/PaymentType";
        $this->model = $this->model.'\PaymentType';
        $this->temp = new $this->model;
        $this->title = 'Payment Types';
        $this->model_title = 'PaymentType';
    }
}