var count = 1;
var countEl = document.getElementById("jumlah");
	
function plus(){
	count+=1;
	countEl.value = count;
}

function minus(){
    if (count > 1) {
	    count-=1;
	    countEl.value = count;
	}  
}