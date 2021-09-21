<?php

namespace App\Http\Controllers;

use Bitrix\Main\ArgumentException;
use Bitrix\Main\Engine\Response\Json as JsonResponse;
use Bitrix\Main\Application;
use Bitrix\Main\Web\Json;

class BaseController
{
    protected $request;

    /**
     * @throws ArgumentException
     */
    public function __construct()
    {
        $this->request = Application::getInstance()->getContext()->getRequest();
        try {
            $this->request = Json::decode($this->request->getInput());
        } catch (Exception $e) {

            return $this->response($e->getMessage());
        }
    }

    /**
     * @param null $data
     * @return JsonResponse
     */
    protected function response($data = null): JsonResponse
    {
        return (new JsonResponse($data))->send();
    }
}