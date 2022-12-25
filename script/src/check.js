function inputbarang(){
    var x = document.getElementById("inputbarang");
    if (x.readOnly === true) {
        x.readOnly = false;
    } else {
        x.readOnly = true;
    }
}

function inputharga(){
    var x = document.getElementById("inputharga");
    if (x.readOnly === true) {
        x.readOnly = false;
    } else {
        x.readOnly = true;
    }
}

function inputjumlah(){
    var x = document.getElementById("jumlah");
    if (x.readOnly === true) {
        x.readOnly = false;
    } else {
        x.readOnly = true;
    }
}

function uncheckAll(){
    inputbarang();
    inputharga();
    inputjumlah();
}