<?php

namespace App\Http\Controllers\API;

use App\Models\MoviesApi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MoviesApiController extends Controller
{

    public function index()
    {
        $moviesApi = MoviesApi::all();
        if($moviesApi){
            return response()->json();
        }
    }

    // [Title,Year,Runtime,Genre(s),Synopsis,Poster URL:,Director(s),Cast,Writer(s),Ratings,Trailer URL,
    // Release Date,Production Company,Awards,Streaming Availability]

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:191',
            'year' => 'required|string|max:191',
            'runtime' => 'required|numeric',
            'genre' => 'required|array',
            'synopsis' => 'required|string|max:255',
            'poster_url' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'casts' => 'required|array',
            'writers' => 'required|string|max:255',
            'ratings' => 'required|numeric|between:0,10',
            'trailer_url' => 'required|string|max:255',
            'release_date' => 'required|string|max:255',
            "product_company"=>'required|string|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $moviesApi = MoviesApi::create([
                'title' => $request->title,
                'year' => $request->year,
                'runtime' => $request->runtime,
                'genre' => $request->genre,
                'synopsis' => $request->synopsis,
                'poster_url' => $request->poster_url,
                'directors' => $request->directors,
                'cast' => $request->cast,
                'writers' => $request->writers,
                'ratings' => $request->ratings,
                'trailer_url' => $request->trailer_url,
                'release_date' => $request->release_date,
                'product_company' => $request->product_company,
            ]);

            if ($moviesApi) {
                return response()->json([
                    'status' => 200,
                    'message' => 'MovieApi data Created Successfully'
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
