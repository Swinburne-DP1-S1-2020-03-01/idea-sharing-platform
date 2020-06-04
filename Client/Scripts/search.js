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

function Search(search_Criteria)
{
    search_query = {
        searchCriteria: search_Criteria,
    };
    
    $.post({
        url: "display-search-results.php", 
        data: search_query,
        success: function(searchContent){
            document.getElementById("search-message").innerHTML = "You searched for:";
            document.getElementById("search-content").innerHTML = ShortenText(search_Criteria);
            document.getElementById("search-results").innerHTML = searchContent;

        },
        error: function(){
            alert('An unexpected problem has occurrred. Please try again.');
        }} 
    )
}

document.getElementById("search-button").addEventListener("click", function() 
{
    var search_Criteria = document.getElementById("search-bar").value;
    Search(search_Criteria);
});

function InitSearchPage()
{
    // checking if there is any searchItem transferred to the page.
    if (sessionStorage.getItem("searchItem") != null)
    {
        var searchCriteria = sessionStorage.getItem("searchItem");
        Search(searchCriteria);
        sessionStorage.removeItem("searchItem");
    }
}

window.onload = InitSearchPage;
