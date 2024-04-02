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

        <h2>There are no movies for this genre</h2>

    </div>


    @livewireScripts

</body>

</html>
