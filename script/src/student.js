function NamaLengkap(){
    var x = document.getElementById("inputNama");
    if(x.readOnly === true){
        x.readOnly = false;
    }else{
        x.readOnly = true;
    }
}

function NamaPanggilan(){
    var x = document.getElementById("inputPanggilan");
    if(x.readOnly === true){
        x.readOnly = false;
    }else{
        x.readOnly = true;
    }
}

function Umur(){
    var x = document.getElementById("inputUsia");
    if(x.readOnly === true){
        x.readOnly = false;
    }else{
        x.readOnly = true;
    }
}

function Agama(){
    var x = document.getElementById("inputAgama");
    if(x.readOnly === true){
        x.readOnly = false;
    }else{
        x.readOnly = true;
    }
}

function Telephone(){
    var x = document.getElementById("inputTelephone");
    if(x.readOnly === true){
        x.readOnly = false;
    }else{
        x.readOnly = true;
    }
}


function uncheckAll(){
    NamaLengkap();
    NamaPanggilan();
    Umur();
    Agama();
    Telephone();
}