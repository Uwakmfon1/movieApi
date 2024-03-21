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

    public function index(Request $request)
    {

        $moviesApi = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular?api_key=ab7f39ebffc89afadaeda215cfbc1fbe')
            ->json();



        $newMoviesApi = $moviesApi['results'];



        foreach ($newMoviesApi as $key => $value) {
            $apiImageUrlBase = env('API_IMAGE_URL');

            $getImage = $value['backdrop_path'];
            $getTitle = $value['title'];
        }

        return view('api', [
            'apiImageUrlBase'=>$apiImageUrlBase,
            'newMoviesApi' => $newMoviesApi,
            'value' => $value,
            'getImage' => $getImage,
            'getTitle' =>  $getTitle,

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

            $moviesApi = $request->all();

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

    public function show(Request $request)
    {
        $id = $request->route('id');


        $searchResults = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'. $id .'?api_key=ab7f39ebffc89afadaeda215cfbc1fbe')
        ->json();

        $allgenres = $searchResults['genres'];
// dd($searchResults);
        foreach($searchResults as $results => $value)
        {
            $compiledGenre =[];
           foreach($allgenres as $genre => $value){

               $compiledGenre[] = $value['name'];
            //    $lastIndex = count($compiledGenre) - 1;
           }


            $apiImageUrlBase = env('API_IMAGE_URL1');

        }
        // $lastIndex = count($compiledGenre) - 1;

        return view('show-movie',[
            'searchResults' => $searchResults,
            'apiImageUrlBase'=>$apiImageUrlBase,
            'allgenres' => $allgenres,
            'genre'=>$genre,
            'value'=>$value,
            'compiledGenre'=>$compiledGenre,
            // 'lastIndex'=>$lastIndex,

            // Stopped here, at last index. To continue from making all the genres be displayed.
        ]);
    }


    public function getCasts()
    {
        $allCasts = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/550/credits?api_key=ab7f39ebffc89afadaeda215cfbc1fbe')
        ->json();

    }
}
