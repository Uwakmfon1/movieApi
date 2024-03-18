<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        list-style-type: none;
        box-sizing:border-box;

    }

    body{
        margin-top:1.5em;
        margin-left: 1em;
        margin-bottom:5em;
    }

    .movieItem{

        flex-direction: auto;
        height: auto 20%;
        background-color: gray;
        width:auto;
    }
    .container{
        display: flex;
        flex-wrap:wrap;
        gap: 20px;
    }
</style>
<body>
    <div class="flex justify-between items-center mb-6">
        <h1>welcome to page</h1>
        <input type="text" class="bg-gray-500 text-white rounded-full w-64 px-4 py-1 focus:outline-none focus:shadow-outline" placeholder="search">
    </div>
    <div class="container">
        @foreach ($newMoviesApi as $newMovieApi => $value)
        <div class="movieItem">

            <img src="{{ $apiImageUrlBase . $value['backdrop_path'] }}" alt="img">
            <h3>{{ $value['original_title'] }}</h3>
            <p>{{$newDate }}</p>
        </div>
    @endforeach
    </div>


</body>

</html>
