<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function handleResponse($result, $msg)
    {
        $res = [
            'success' => true,
            'data' => $result,
            'message' => $msg,
        ];
        return response()->json($res, 200);
    }
    public function handleError($error_message, $errors = [], $code = 404)
    {
        $res = [
            'success' => false,
            'message' => $error_message,
        ];
        if (!empty($errors)) {
            $res['data'] = $errors;
        }
        return response()->json($res, $code);
    }
}
