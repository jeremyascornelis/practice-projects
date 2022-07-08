//with JQuery

//run AJAX to get JSON
//if success, run the function below with param data
//and the result is in Object form 
//sudah di parsing oleh JQuery
$.getJSON('coba.json', function(data) {
    console.log(data);
});