<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ asset('vendor/livewire/livewire.js') }}">
    @livewireStyles
    @vite('resources/css/app.css')
    @vite(['resources/js/app.js'])
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        list-style-type: none;
        box-sizing: border-box;

    }

    body {
        margin-top: 1.5em;
        margin-left: 1em;
        margin-bottom: 5em;
    }

    .movieItem {
        border-radius: 8px;
        width: 20%;
        height: 45vh;
        flex-direction: auto;
        background-color: #fff;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    img {
        border-radius: 8px 8px 0 0;
    }

    .container {
        margin-left: 5em;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    #tags {
        width: 80%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        margin: 10px auto;
    }

    .tag{
        color: white;
        padding:10px 20px;
        background-color: orange;
        border-radius: 50px;
        margin: 5px;
        display: inline-block;
        cursor: pointer;
    }

    .tag.highlight{
        background-color: red;
    }

</style>

<body>


    <div class="flex justify-between ">
        <a href="{{ url('api/movies') }}" class="text-black mb-2">Home Page</h1>
        <livewire:search-dropdown>
    </div>

    <div id="tags">

    </div>

    <div class="container">
        <?php use Carbon\Carbon; ?>

 @foreach ($moviesWithGenreId as $matchingMovie)
        <a class="movieItem" href="{{ url('api/movies/show/' . $matchingMovie['id']) }}">
            <div>
                <img src="{{ $apiImageUrlBase . $matchingMovie['backdrop_path'] }}" alt="img">
                    <div class="ml-4">
                        <p class="flex"> <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg> <span class="space-x-3.5">{{ round($matchingMovie['vote_average'], 1) }}</span></p>
                        <h2 class="text-black font-bold"> {{ $matchingMovie['title'] }}</h2>

                        @if (isset($matchingMovie['release_date']))
                            {{ Carbon::parse($matchingMovie['release_date'])->format('M d, Y') }}
                        @else
                        @endif
                    </div>
            </div>
        </a>
        @endforeach

    </div>


    @livewireScripts

</body>

</html>
