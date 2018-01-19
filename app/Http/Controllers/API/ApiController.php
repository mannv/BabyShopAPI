<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;

class ApiController extends Controller
{
    use Helpers;

    public function returnEmpty()
    {
        return $this->response->array(['data' => []]);
    }
}
