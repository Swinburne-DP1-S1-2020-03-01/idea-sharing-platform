// init function
function goToRead(id, row){
    document.cookie = "idCookie=" + id;
    document.cookie = "rowCookie=" + row;
    window.location.href = "reading.php";   
} 

function readButton(value){
    window.location.href = value + ".php";
}

