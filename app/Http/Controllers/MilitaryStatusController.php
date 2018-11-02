<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MilitaryStatus;

class MilitaryStatusController extends GenericController
{

    public function __construct()
    {
        $this->create_url = "/MilitaryStatus";
        $this->model = $this->model.'\MilitaryStatus';
        $this->temp = new $this->model;
        $this->title = 'Military Statuses';
        $this->model_title = 'Military Status';
    }
}
