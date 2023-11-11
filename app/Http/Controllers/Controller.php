<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sendHttpRequest($endpoint, $requestType = 'GET', $params = [])
    {
        try {
            // Choose the appropriate HTTP method based on $requestType
            $httpMethod = strtoupper($requestType);

            // Make the HTTP request
            $response = Http::$httpMethod($endpoint, $params);

            // Get and return the response body as an array
            return $response->json();

        } catch (\Illuminate\Http\Client\RequestException $e) {
            // Handle request exceptions (e.g., connection errors, timeouts, etc.)
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
