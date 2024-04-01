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
        /**
         *
         * store the genres in an array
         * use the buttons such that when a genre is clicked, it returns
         * if clicked on a button, select the movies where the clicked genre = movie genre
         * if clicked on multiple buttons, select only movies where genre = genre(s)
         */

        $storedGenres = [];
        $genres =  Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list?api_key=ab7f39ebffc89afadaeda215cfbc1fbe')
            ->json()['genres'];



        $moviesApi = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/top_rated?api_key=ab7f39ebffc89afadaeda215cfbc1fbe')
            ->json()['results'];



        if ($request->exists('genre')) {
            $allGenre = [];
            $particularGenre = [];
            $genreName = $request->get('genre');
            $genreId = $request->get('genreId');


            // This fetches the movies by genre
            for ($i = 0; $i < count($moviesApi); $i++) {
                if (in_array($genreId, $moviesApi[$i]['genre_ids'])) {

                    $particularGenre[] = $moviesApi[$i];


                    $fParticularGenre = end($particularGenre);
                    // dump($fParticularGenre);

                    return view('apiGenre',compact('fParticularGenre'));
                }

            }

        }

// die();
        $newMoviesApi = $moviesApi;
        foreach ($newMoviesApi as $key => $value) {
            $apiImageUrlBase = env('API_IMAGE_URL');

            $getImage = $value['backdrop_path'];
            $getTitle = $value['title'];
            $id = $value['id'];
        }

        return view('api', [
            'id' => $id,
            'apiImageUrlBase' => $apiImageUrlBase,
            'newMoviesApi' => $newMoviesApi,
            'value' => $value,
            'getImage' => $getImage,
            'getTitle' =>  $getTitle,
            // 'fParticularGenre' => $fParticularGenre,
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
        // fetching the data from the tmdb api
        $searchResults = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/' . $id . '?api_key=ab7f39ebffc89afadaeda215cfbc1fbe')
            ->json();
        // filtering the json result by genres
        $allgenres = $searchResults['genres'];
        // dd($allgenres);

        foreach ($searchResults as $results => $value) {
            $compiledGenre = [];
            foreach ($allgenres as $genre => $value) {

                $compiledGenre[] = $value['name'];
            }


            $apiImageUrlBase = env('API_IMAGE_URL1');
        }
        $isFirst = true;

        return view('show-movie', [
            'isFirst' => $isFirst,
            'searchResults' => $searchResults,
            'apiImageUrlBase' => $apiImageUrlBase,
            'allgenres' => $allgenres,
            'genre' => $genre,
            'value' => $value,
            'compiledGenre' => $compiledGenre,
            // 'genres' => $genres,

            // Stopped here, at last index. To continue from making all the genres be displayed.
        ]);
    }


    public function getCasts()
    {
        $allCasts = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/550/credits?api_key=ab7f39ebffc89afadaeda215cfbc1fbe')
            ->json();
    }

    public function genres()
    {
        $storedGenres = [];
        $genres =  Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list?api_key=ab7f39ebffc89afadaeda215cfbc1fbe')
            ->json()['genres'];

        $storedGenres[] = $genres;
        return view('genres', [
            'genres' => $genres
        ]);
    }

    public function adventures()
    {
        $adventures = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/top_rated?api_key=ab7f39ebffc89afadaeda215cfbc1fbe')
            ->json();

        dd($adventures);
    }
}
