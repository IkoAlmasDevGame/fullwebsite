function myFunctPassword() {
    var x = document.getElementById("inputPass");
    if (x.type === "password" && x.readOnly === true) {
        x.type = "text";
        x.readOnly = false;
    } else {
        x.type = "password";
        x.readOnly = true;
    }
}

function myFunctNama() {
    var x = document.getElementById("inputnama");
    if (x.readOnly === true) {
        x.readOnly = false;
    } else {
        x.readOnly = true;
    }
}

function myFunctEmail() {
    var x = document.getElementById("inputEmail");
    if (x.readOnly === true) {
        x.readOnly = false;
    } else {
        x.readOnly = true;
    }
}