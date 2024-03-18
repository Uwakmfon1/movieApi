<?php

namespace App\Http\Controllers\API;
// require_once 'vendor/autoload.php';

use Faker\Factory;
use App\Models\MoviesApi;
use Illuminate\Http\Request;
use App\Rules\ValidateRating;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class MoviesApiController extends Controller
{

    public function index()
    {

        $moviesApi = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular?api_key=ab7f39ebffc89afadaeda215cfbc1fbe')
            ->json();



        $newMoviesApi = $moviesApi['results'];

        foreach ($newMoviesApi as $key => $value) {
            $apiImageUrlBase = env('API_IMAGE_URL');
            $originalDate = $value['release_date'];
            $date = Carbon::parse($originalDate);
            $newDate = $date->format('d-m-Y');

            $getImage = $value['backdrop_path'];
            $getTitle = $value['title'];
        }

        return view('api', [
            'apiImageUrlBase'=>$apiImageUrlBase,
            'newMoviesApi' => $newMoviesApi,
            'value' => $value,
            'getImage' => $getImage,
            'getTitle' =>  $getTitle,
            'newDate' => $newDate
        ]);
    }



    public function store(Request $request)
    {
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
            "product_company" => 'required|string|max:191',
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
