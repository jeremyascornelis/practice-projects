function tampilkanSemuaMenu() {
    //method untuk menyingkat $.ajax
    $.getJSON('data/pizza.json', function(data) {
        // console.log(data);
        //menghilangkan key menu
        let menu = data.menu; //array
        
        //method for loop for object
        //each element in menu give this function
        //i = index
        $.each(menu, function(i, data) {    
            //jquery please search for me, id: daftar menu
            //looping 14 times
            $('#daftar-menu').append('<div class="col-md-4"><div class="card mb-4"><img src="img/menu/'+ data.gambar +' ?>" class="card-img-top"><div class="card-body"><h5 class="card-title">'+ data.nama +'</h5><p class="card-text">'+ data.deskripsi +'</p><h5 class="card-title">Rp. '+ data.harga +'</h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>');
        });

    });
}

tampilkanSemuaMenu(); //default


$('.nav-link').on('click', function() {
    $('.nav-link').removeClass('active');
    $(this).addClass('active');

    let kategori = $(this).html(); //get html
    console.log(kategori);
    $('h1').html(kategori);

    //AJAX
    $.getJSON('data/pizza.json', function(data) {
        //concetinate html string
        let menu = data.menu;
        let content = '';

        if(kategori == 'All Menu') {
            tampilkanSemuaMenu();
            $('#daftar-menu').html(''); //agar tidak duplicate
            return;
        }

        $.each(menu, function(i, data) {
            if(data.kategori == kategori.toLowerCase()) {
                content += '<div class="col-md-4"><div class="card mb-4"><img src="img/menu/'+ data.gambar +' ?>" class="card-img-top"><div class="card-body"><h5 class="card-title">'+ data.nama +'</h5><p class="card-text">'+ data.deskripsi +'</p><h5 class="card-title">Rp. '+ data.harga +'</h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>';
            }
        });

        $('#daftar-menu').html(content);

    });

});