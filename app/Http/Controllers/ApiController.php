<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getReferenceNo(Request $request)
    {
        // URL API
        $url = "https://pay.saebo.id/test-dau/api/v1/transactions";

        // Data Parameter
        $product = Product::find($request->product_id);
        
        $data = [
            "quantity" => $request->quantity,
            "price" => $product->price,
            "payment_amount" => $request->quantity * $product->price,
        ];

        // Melakukan request POST ke API
        $response = Http::withHeaders([
            "x-api-key" => "DATAUTAMA"
        ])->post($url, $data);

        // Mendapatkan respons JSON
        $responseData = json_decode($response->getBody(), true);

        // Periksa status kode respons
        if ($response->getStatusCode() == 200) {
            return [
                "status" => "success",
                "data" => $responseData['data'],
            ];
        } else {
            return [
                "status" => "error",
                "message" => $responseData['message'],
            ];
        }
    }
}
