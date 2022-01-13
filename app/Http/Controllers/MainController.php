<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function authenticate()
    {
        $response = Http::post('technical_test.client.cosmicdevelopment.com/api/token/', [
            "grant_type"  => "password",
            "client_id" => "6779ef20e75817b79601",
            "client_secret" => "3e0f85f44b9ffbc87e90acf40d482601",
            "username" => "hiring",
            "password" => "cosmicdev"
        ]);

        return json_decode($response);
    }
    
    public function list()
    {
        $authResponse  = $this->authenticate();
        $accessToken = $authResponse->data->access_token;

        $employeesListResponse = Http::withHeaders([
            'Access-Token' => $accessToken,
        ])->get('http://technical_test.client.cosmicdevelopment.com/api/employee/list/');

        $employeesList = json_decode($employeesListResponse)->data;
        return view('welcome')->with('employeesList',  $employeesList);
    }
}
