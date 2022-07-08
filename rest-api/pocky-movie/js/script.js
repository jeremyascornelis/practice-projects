function searchMovie() {
    //hilangkan dulu
    $('#movie-list').html('');

    //baru request
    $.ajax({
        url: 'http://omdbapi.com',
        type: 'get',
        dataType: 'json', //data kembalian berupa JSON
        data: {
            'apikey' : '20f0220c',
            's' : $('#search-input').val()
        },
        success: function(result) {
            // console.log(result);
            if(result.Response == "True") {
                //tampilkan data
                let movies = result.Search; //supaya langsung array of object
                
                $.each(movies, function(i, data) {
                    $('#movie-list').append(`
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <img src="`+ data.Poster +`" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">`+ data.Title +`</h5>
                                <h6 class="card-subtitle mb-2 text-muted">`+ data.Year +`</h6>
                                <a href="#" class="card-link see-detail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="`+ data.imdbID +`">See Detail</a>
                            </div>
                        </div>
                    </div>
                    `);
                });

                $('#search-input').val('');

            } else {
                $('#movie-list').html(`
                    <div class="col">
                        <h1 class="text-center">` + result.Error +`</h1>
                    </div>
                `);
            }
        } //ajax nya dikirim
    });
}

$('#search-button').on('click', function() {
    searchMovie();
});

//keyup -> tombol dilepas
$('#search-input').on('keyup', function(e) {
    //key code enter = 13
    //keycode or which
    //https://keycode.info
    if(e.keyCode === 13) {
        searchMovie();
    }
});

//when see detail on click
// $('.see-detail').on('click', function() {
//     //problem: event bubbling
//     //console.log($(this).data('id'));

// });

//carikan elemen movie-list, lalu ketika klik elemen yang kelasnya see-detail
//baik yg muncul awal atau nanti, tetap jalankan function ini
$('#movie-list').on('click', '.see-detail', function() {
    // console.log($(this).data('id'));

    $.ajax({
        url: 'http://omdbapi.com',
        type: 'get',
        dataType: 'json', //data kembalian berupa JSON
        data: {
            'apikey' : '20f0220c',
            'i' : $(this).data('id')
        },
        success: function(movie) {
            if(movie.Response == "True") {
                // console.log(movie.Poster);
                //replace modal content
                $('.modal-body').html(`
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="`+ movie.Poster +`" class="img-fluid">
                            </div>

                            <div class="col-md-8">
                                <ul class="list-group">
                                    <li class="list-group-item"><h3>`+ movie.Title +`</h3></li>
                                    <li class="list-group-item">Released: `+ movie.Released +`</li>
                                    <li class="list-group-item">Genre: `+ movie.Genre +`</li>
                                    <li class="list-group-item">Director: `+ movie.Director +`</li>
                                    <li class="list-group-item">Actors: `+ movie.Actors +`</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                `);

            }
        }
    });

});