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
            <h3>{{ $apiImageUrlBase  }}</h3>
            <img src="{{ $apiImageUrlBase . $value['backdrop_path'] }}" alt="img">
            <h3>{{ $value['original_title'] }}</h3>
            <p>{{$newDate }}</p>
        </div>
    @endforeach

</body>

</html>
