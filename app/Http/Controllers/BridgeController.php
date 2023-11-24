<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BridgeController extends Controller
{
    public function bridge(Request $request)
    {
        // Obtén la solicitud del frontend
        $method = $request->method();
        $url = 'https://youtube-v31.p.rapidapi.com/' . $request->path();
        $data = $request->all();

        // Incluye headers si es necesario
        $headers = [
            'X-RapidAPI-Host' => 'youtube-v31.p.rapidapi.com', // Puedes ajustar según tus necesidades
            'X-RapidAPI-Key' => 'bb3d2db295msh007efb523587c20p16b868jsne874e97ed7d3', // Ejemplo de Content-Type
        ];

        // Realiza la solicitud al servicio REST
        $response = Http::withHeaders($headers)->$method($url, $data);

        // Devuelve la respuesta al frontend
        return response($response->json(), $response->status());
    }
}
