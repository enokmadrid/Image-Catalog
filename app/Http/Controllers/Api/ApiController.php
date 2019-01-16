<?php

namespace App\Http\Controllers\API;
use Response;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    protected $statusCode;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function respondNotFound ($message = 'Not Found!')
    {
        return response()->json([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }
}
