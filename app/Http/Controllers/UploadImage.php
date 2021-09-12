<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UploadImage extends Controller
{
    public static function uploadPictureToImgur($file): string
    {
        $file_path = $file->getPathName();
        $client = new Client();
        $response = $client->request('POST', 'https://api.imgur.com/3/image', [
            'headers' => [
                'Authorization' => "Client-ID 188d8dd42673a9d",
                'content-type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'image' => base64_encode(file_get_contents($file->path($file_path)))
            ],
        ]);
        return data_get(response()->json(json_decode(($response->getBody()->getContents())))->getData(), 'data.link');
    }
}
