<?php

if (!function_exists('sendError')) {
    function sendError($error, $status = 400) {
        return response()->json([
            'status' => 'error',
            'data' => $error
        ], $status);
    }
}

if (!function_exists('sendSuccess')) {
    function sendSuccess($results, $status = 200) {
        return response()->json([
            'status' => 'success',
           'data' => $results
        ], $status);
    }
}