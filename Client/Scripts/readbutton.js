// init function
function goToRead(id, row){
    window.location.href = "reading.php";
    document.cookie = "idCookie=" + id;
    document.cookie = "rowCookie=" + row;
} 

function readButton(value){
    window.location.href = value + ".php";
}

