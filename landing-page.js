function showLoginSignUp(block, none){
    document.getElementById(none).style.display = "none";
    document.getElementById(block).style.display = "block";
}

function validateInput(formName, inputName) {
    variable = []
    for(i = 0; i < inputName.length; i++){
        variable.push(document.forms[formName][inputName[i]].value);
    }

    for(i = 0; i < inputName.length; i++){
        if(variable[i] == "" || variable[i] == null){
            alert("Input must be filled out");
            return false;
        }
    }
}

function getOption() {
    var selectElement = document.querySelector('#nama_game');
    var output = selectElement.value;

    document.getElementById("score-form").style.display = "block";
    document.getElementById("submit").name = output;
}