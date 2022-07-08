//object to JSON

// let mahasiswa = {
//     "nama" : "Jeremyas Cornelis",
//     "nim"  : "A11202012415",
//     "email" : "jeremyas@gmail.com"
// }

// console.log(JSON.stringify(mahasiswa));

//JSON to Object

//with AJAX

//call AJAX Object (vanilla javascript)
let xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
    //when AJAX is ready
    if(xhr.readyState == 4 && xhr.status == 200) {
        //whatever AJAX response 
        //and change to object from JSON
        let mahasiswa = JSON.parse(this.responseText); 
        console.log(mahasiswa);
    }
}

//to run AJAX
xhr.open('GET', 'coba.json', true);
//true for run AJAX via asynchronous (AJAX is asynchronous)
xhr.send();