<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sendHttpRequest($endpoint, $access_token = "", $requestType = 'GET', $params = [])
    {
        try {
            // Choose the appropriate HTTP method based on $requestType
            $httpMethod = strtoupper($requestType);
            $headers = $headers = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ];

            if ($access_token != "") {
                $headers['Authorization'] = 'Bearer ' . $access_token;
            }

            // Make the HTTP request
            $response = Http::withHeaders($headers)->$httpMethod($endpoint, $params);

            // Get and return the response body as an array
            return $response->json();

        } catch (\Illuminate\Http\Client\RequestException $e) {
            // Handle request exceptions (e.g., connection errors, timeouts, etc.)
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
