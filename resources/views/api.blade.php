<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    html{
        margin-left: 1em;
        
    }

    .movieItem{
        height: auto 10%;
        background-color: gray;
        width:10%;

    }

</style>
<body>

    <h1>welcome to page</h1>
    {{-- <img src="{{'https:/'. $newMoviesApi[1]['backdrop_path'] }}" alt="img"> --}}

    @foreach ($newMoviesApi as $newMovieApi => $value)
        <div class="movieItem">
            <img src="{{ $value['backdrop_path'] }}" alt="img">
            <h3>{{ $value['original_title'] }}</h3>
            <p>{{ $value['release_date'] }}</p>
        </div>
    @endforeach

</body>

</html>
