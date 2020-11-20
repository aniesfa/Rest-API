<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class TestController extends Controller
{
    public function searchData(Request $request){
        $client = new Client();
        $query = $request->keyword;
        $request = $client->get('http://newsapi.org/v2/top-headlines?country=id&category=business&apiKey=35ddab176dfd497b90b6ee9986700c82
        &q='.$query);
        $response = $request->getBody();
        $result = json_decode($response);
        return view('home',['artikel'=>$result->articles]);
       }
       
}