<?php

namespace App\Livewire;

use Livewire\Livewire;
use Livewire\Component;

class FilterMovies extends Component
{
    public $movies =[];
    public $selectedGenre = null;

    public function render()
    {
        $this->listenToGenreSelected();
        $filteredMovies = $this->getFilteredMovies();

        return view('livewire.filter-movies',['fileredMovies' => $filteredMovies]);
    }

    public function mount()
    {
       $apiUrl="https://api.themoviedb.org/3/movie/top_rated?api_key=ab7f39ebffc89afadaeda215cfbc1fbe";
       $response = json_decode(file_get_contents($apiUrl));
       if(isset($response->results)){
        $this->movies = $response ->results;
       }else{
        $this->movies = [];
       }
    }

    // public function listenToGenreSelected()
    // {
    //     Livewire::on('genreSelected',function($genre){
    //         $this->selectedGenre = $genre;
    //     });
    // }
}
