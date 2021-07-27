<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Portfolio;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/blogs/{pagination_count}', function($pagination_count){
    return Blog::select('id','title', 'thumbnail_image', 'category', 'created_at')
                ->orderBy('id', 'desc')
                ->where('archive', 1)
                ->paginate($pagination_count)->withQueryString();
});
Route::get('/portfolios/{pagination_count}', function($pagination_count){
    return Portfolio::select('id','title', 'cover_pic', 'short_description')
                ->orderBy('id', 'desc')
                ->where('archive', 1)
                ->paginate($pagination_count)->withQueryString();
});


Route::get('/individual-blog/{id}', function($id){
    try {
        return [
            'status' => 200,
            'individual_blog' => Blog::select(
                'id','title','short_description', 'thumbnail_image', 'cover_pic', 'category', 'blog','created_at'

            )->where('archive', 1)->findorfail($id)
        ];
        
    } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return [
            'status' => 404,
            'error_message' => 'No blog Found',
            'individual_blog' => null
        ];
    }
});
Route::get('/individual-portfolio/{id}', function($id){
    try {
        return [
            'status' => 200,
            'individual_portfolio' => Portfolio::select(
                'id','title','link','cover_pic', 'short_description', 'long_description', 'created_at'

            )->where('archive', 1)->findorfail($id)
        ];
        
    } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return [
            'status' => 404,
            'error_message' => 'No Portfolio Found',
            'individual_portfolio' => null
        ];
    }
});







Route::post('/contact', function(Request $request){
    
    if($request->name == null){
        return [
            'status' => 400, 
            'error_message' => 'name cannot be empty'
        ];
    } else if($request->email == null){
        return [
            'status' => 400, 
            'error_message' => 'email cannot be empty'
        ];
    }else if($request->message == null){
        return [
            'status' => 400, 
            'error_message' => 'message cannot be empty'
        ];
    }else if(strlen($request->message) > 1500){
        return [
            'status' => 400,
            'error_message' => 'message is too long. Please send a message with less than 1500 characters'
        ];
    }
    
    $message = Contact::create([
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->message
    ]);
    return [
        'status' => 200,
        'message' => [
            'name' => $message->name,
            'email' => $message->email,
            'message' => $message->message
        ]
    ];
});