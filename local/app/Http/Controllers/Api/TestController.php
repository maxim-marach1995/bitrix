<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use Bitrix\Main\Web\Json;

class TestController extends BaseController
{
    public function index(): Json
    {
        return $this->response(['test' => $this->request['test']]);
    }
}