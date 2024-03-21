<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @livewireStyles
    @vite('resources/css/app.css')
</head>
<style>
    img {
        height: 70vh;
        width: 30vw;
    }
</style>

<body class=" bg-gray-700">
    <nav class="h-20 ">
        <h2 class="text-black font-bold">This is for Header</h2>
    </nav>
    <hr>
    <div class="flex ml-10 mt-5 mb-5 space-x-10">
        <img src="{{ $apiImageUrlBase . $searchResults['backdrop_path'] }}" alt="">

        <div>
            <?php use Carbon\Carbon; ?>
            <h1 class="font-bold text-xxl text-white">{{ $searchResults['title'] }}</h1>
            <span class="flex mr-3 text-white"> <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg> <p class="text-white">{{ round($searchResults['vote_average'], 1) }}</p>   <p class="ml-2 text-white">|</p>   @if (isset($searchResults['release_date'])) <h2 class="text-white ml-2">{{ Carbon::parse($searchResults['release_date'])->format('M d, Y') }}</h2> <p class="ml-2 text-white">|</p>  <p>{{ $value['name'] }}</p>
            @else
            @endif

            </span>
            @foreach ($compiledGenre as $genres )
            <p>
                {{ $genres . ',' }}  {{--  . rtrim($lastIndex,',') --}}
            </p>
            @endforeach

        </div>
    </div>
    <hr>
    @livewireScripts
</body>

</html>
