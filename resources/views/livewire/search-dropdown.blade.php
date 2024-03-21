<div class="relative mt-3 md:mt-0">
        <input type="text" wire:model.live.debounce.150ms="search"
            class="form-control bg-gray-800 text-white text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
            placeholder="search">

        <div class="absolute top-0 mt-0 mr-0">
              <svg class="fill-current w-6 h-6 text-gray-500 mt-2 ml-2 display:inline-block"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" id="search"><path
                d="M63.3 59.9c3.8-4.6 6.2-10.5 6.2-17 0-14.6-11.9-26.5-26.5-26.5S16.5 28.3 16.5 42.9 28.4 69.4 43 69.4c6.4 0 12.4-2.3 17-6.2l20.6 20.6c.5.5 1.1.7 1.7.7.6 0 1.2-.2 1.7-.7.9-.9.9-2.5 0-3.4L63.3 59.9zm-20.4 4.7c-12 0-21.7-9.7-21.7-21.7s9.7-21.7 21.7-21.7 21.7 9.7 21.7 21.7-9.7 21.7-21.7 21.7z"></path></svg>

            </div>

            <div class="absolute bg-gray-800 rounded w-64 mt-0.5">
                <ul>
                    @foreach ($searchResults as $result)
                    <li class="border-b border-gray-700">
                 <a href="{{ url('api/movies/show/'.$result['id']) }}" class="block text-white hover:bg-gray-700 px-3 py-3">{{ $result['title'] }}</a>
                    </li>
                    @endforeach


                </ul>
            </div>

        </div>



