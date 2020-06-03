function ShortenText(text, limit = 50)
{
    if (text.length > limit - 3) 
    {
        return text.slice(0, limit - 3) + "...";
    }
    else 
    {
        return text;
    }    
}

document.getElementById("search-button").addEventListener("click", function() 
{
    var search_Criteria = "";
    search_Criteria = document.getElementById("search-bar").value;
    //sessionStorage.search_Criteria = search_Criteria;

    alert("Searched: " + search_Criteria);
    search_query = {
        searchCriteria: search_Criteria,
    };
    
    //sessionStorage.setItem("searchItem", search_Criteria);
    $.post({
        url: "display-search-results.php", 
        data: search_query,
        success: function(searchContent){
            alert(searchContent);
            document.getElementById("search-message").innerHTML = "You searched for:";
            document.getElementById("search-content").innerHTML = ShortenText(search_Criteria);
            //sessionStorage.removeItem("searchItem");
            //window.location.href = './search.php';
            document.getElementById("search-results").innerHTML = searchContent;

        },
        error: function(){
            alert('An unexpected problem has occurrred. Please try again.');
            //sessionStorage.removeItem("searchItem");
        }} 
    )
    //add the rest of the search code here

});