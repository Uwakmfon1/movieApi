<?php

namespace App\Http\Controllers\API;
// require_once 'vendor/autoload.php';

use Faker\Factory;
use App\Models\MoviesApi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Rules\ValidateRating;

class MoviesApiController extends Controller
{

    public function index()
    {
        $moviesApi = MoviesApi::all();
        return response()->json(['movies'=>$moviesApi]);
        // if($moviesApi->count() > 0){
        //     return response()->json();
        // }else{
        //     return "page not found";
        // }
    }



    public function store(Request $request)
    {

        // $faker = Factory::create();
        // dd($request);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:191',
            'year' => 'required|integer',
            'runtime' => 'required|string|max:191',
            'genre' => 'required|string',
            'synopsis' => 'required|string|max:255',
            'poster_url' => 'nullable|url',
            'director' => 'required|string|max:255',
            'casts' => 'required|array',
            'writers' => 'required|array',
            'ratings' => 'required|numeric|between:0,5',
            'trailer_url' => 'nullable|url',
            'release_date' => 'nullable|date',
            "product_company"=>'required|string|max:191',
        ]);



        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            // return $request;
            $moviesApi = $request->all();
            // $moviesApi = MoviesApi::create([
            //     'title' => $request->title,
            //     'year' => $request->year,
            //     'runtime' => $request->runtime,
            //     'genre' => $request->genre,
            //     'synopsis' => $request->synopsis,
            //     'poster_url' => $request->poster_url,
            //     'director' => $request->director,
            //     'cast' => $request->cast,
            //     'writers' => $request->writers,
            //     'ratings' => $request->ratings,
            //     'trailer_url' => $request->trailer_url,
            //     'release_date' => $request->release_date,
            //     'product_company' => $request->product_company,
            // ]);

            if ($moviesApi) {
                return response()->json([
                    'status' => 200,
                    'message' => $moviesApi
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong'
                ], 500);
            }
        }
    }
}
