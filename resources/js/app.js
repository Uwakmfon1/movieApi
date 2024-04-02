const API_URL = "https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=ab7f39ebffc89afadaeda215cfbc1fbe";

const genres = [
    { id: 28, name: "Action" },
    { id: 12, name: "Adventure" },
    { id: 16, name: "Animation" },
    { id: 35, name: "Comedy" },
    { id: 80, name: "Crime" },
    { id: 99, name: "Documentary" },
    { id: 18, name: "Drama" },
    { id: 10751, name: "Family" },
    { id: 14, name: "Fantasy" },
    { id: 36, name: "History" },
    { id: 27, name: "Horror" },
    { id: 10402, name: "Music" },
    { id: 9648, name: "Mystery" },
    { id: 10749, name: "Romance" },
    { id: 878, name: "Science Fiction" },
    { id: 10770, name: " TV Movie" },
    { id: 53, name: "Thriller" },
    { id: 10752, name: "War" },
    { id: 37, name: "Western" },
];

const tagsElement = document.getElementById("tags");

const selectedGenre = [];
setGenre();
function setGenre() {
    tagsElement.innerHTML = "";
    genres.forEach((genre) => {
        const t = document.createElement("a");
        t.classList.add("tag");
        t.id = genre.id;
        t.innerText = genre.name;
        t.href = location.pathname + '?genre=' + genre.name + '&genreId=' + genre.id;





        // t.addEventListener("click", () => {

            // if (selectedGenre.length == 0) {
            //     selectedGenre.push(genre.id);
            // } else {
            //     if (selectedGenre.includes(genre.id)) {
            //         selectedGenre.forEach((id, index) => {
            //             if (id == genre.id) {
            //                 selectedGenre.splice(index, 1);
            //             }
            //         });
            //     } else {
            //         selectedGenre.push(genre.id);
            //     }
            // }
        //     console.log(selectedGenre);
        //     getmovies(
        //         API_URL + "&with_genres=" + encodeURI(selectedGenre.join(","))
        //     );
        //     highlightSelection();
        // });
        tagsElement.append(t);
    });
}

function highlightSelection() {
    const tags = document.querySelectorAll(".tag");
    tags.forEach((tag) => {
        tag.classList.remove("highlight");
    });
    if (selectedGenre.length != 0) {
        selectedGenre.forEach((id) => {
            const highlightedTag = document.getElementById(id);
            highlightedTag.classList.add("highlight");
        });
    }
}
getmovies(API_URL);

function getmovies(url) {
    fetch(url)
        .then((res) => res.json())
        .then((data) => {
            console.log(data.results);
            showMovies(data.results);
        });
}


genres.forEach(genre=>{
    const button = document.createElement('button');
    button.textContent = genre;
    button.addEventListener('click',()=>{
        Livewire.emit('genreSelected',genre);
    });
    document.getElementById('buttons-container').appendChild(button)
})
.for
