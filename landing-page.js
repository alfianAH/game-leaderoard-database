function showLoginSignUp(block, none){
    document.getElementById(none).style.display = "none";
    document.getElementById(block).style.display = "block";
}

function validateLogin() {
    var email = document.forms["login"]["email"].value;
    var password = document.forms["login"]["password"].value;
    if (email == "" || email == null ||
        password == "" || password == null) {
        alert("Input must be filled out");
        return false;
    }
}

function validateSignUp() {
    var nama_depan = document.forms["signup"]["nama_depan"].value;
    var nama_belakang = document.forms["signup"]["nama_belakang"].value;
    var email = document.forms["signup"]["email"].value;
    var password = document.forms["signup"]["password"].value;

    if (nama_depan == "" || nama_depan == null ||
        nama_belakang == "" || nama_belakang == null ||
        email == "" || email == null ||
        password == "" || password == null) {
        alert("Input must be filled out");
        return false;
    }
}