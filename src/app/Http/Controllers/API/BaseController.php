<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($data = null, $message = null, $status_code = 200)
    {
        return response()->json([
            'status_code' => is_array($status_code) ? $status_code[1] : $status_code,
            'data' => $data,
            'message' => $message ?: __('Success'),
        ], is_array($status_code) ? $status_code[0] : $status_code);
    }

    public function sendError($message = null, $status_code = 400)
    {
        return response()->json([
            'status_code' => is_array($status_code) ? $status_code[1] : $status_code,
            'message' => $message ?: __('Bad request'),
        ], is_array($status_code) ? $status_code[0] : $status_code);
    }
}
