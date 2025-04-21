<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RestApiController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('q', '');
        $page = (int) $request->query('page', 1);
        $limit = 6;
        $skip = ($page - 1) * $limit;

        $url = $query
            ? "https://dummyjson.com/products/search?q=$query&limit=$limit&skip=$skip"
            : "https://dummyjson.com/products?limit=$limit&skip=$skip";

        $response = Http::get($url);
        $data = $response->json();

        return view('api.rest.index', [
            'productos' => $data['products'] ?? [],
            'total' => $data['total'] ?? 0,
            'query' => $query,
            'page' => $page,
            'limit' => $limit
        ]);
    }

    public function show($id)
    {
        $producto = Http::get("https://dummyjson.com/products/$id")->json();
        return view('api.rest.show', compact('producto'));
    }

    public function create()
    {
        return view('api.rest.create');
    }

    public function store(Request $request)
    {
        $data = [
            "title" => $request->input('title'),
            "price" => (float) $request->input('price'),
            "description" => $request->input('description'),
        ];

        $ch = curl_init("https://dummyjson.com/products/add");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        $response = json_decode($response, true);

        return redirect()->route('api.rest.index')->with('mensaje', $response['title'] ?? 'Producto creado');
    }
}
