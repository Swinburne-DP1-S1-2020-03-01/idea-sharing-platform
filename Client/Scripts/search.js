document.getElementById("search-button").addEventListener("click", function() 
{
    var search_Criteria = "";
    search_Criteria = document.getElementById("search-bar").value;
    //sessionStorage.search_Criteria = search_Criteria;

    alert("Searched: " + search_Criteria);
    search_query = {
        searchCriteria: search_Criteria,
    };
    
    $.post({
        url: "search.php", 
        data: search_query,
        success: function(d){
            window.location.href = './search.php';
            },
        error: function(){
            alert('An unexpected problem has occurrred. Please try again.');
            }} 
    )
    //add the rest of the search code here
});