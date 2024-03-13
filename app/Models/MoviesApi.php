<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoviesApi extends Model
{
    use HasFactory;

// [Title,Year,Runtime,Genre(s),Synopsis,Poster URL:,Director(s),Cast,Writer(s),Ratings,Trailer URL,
    // Release Date,Production Company,Awards,Streaming Availability]

    protected $table= 'movies_api';

    protected $fillable = [
        'title','year','runtime','genre','synopsis','poster_url','directors','casts',
        'writers','rating','trailer_url','release_date','production_company',    ];
    protected $casts = ['genre'=>'array'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
