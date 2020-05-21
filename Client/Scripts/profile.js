import {homepage_data} from './articles-homepage-mockdata.js'

const topArticles = document.querySelector("#top-articles"); 

document.addEventListener("DOMContentLoaded", DisplayTopArticles);

//Function

function DisplayTopArticles(event)
{
    for (var i = 0; i < homepage_data.top_articles.length; ++i)
    {
        // 
        var article = homepage_data.top_articles[i];

        const articleCard = document.createElement('div');
        articleCard.classList.add("article-card");

        // 
        const cardLeft = document.createElement('div');
        cardLeft.classList.add("card-left");

        //  
        const thumbnail = document.createElement("img");
        thumbnail.classList.add("article-thumbnail");
        thumbnail.src = "./Resources/Images/lavender.jpeg";
        cardLeft.appendChild(thumbnail);

        // 
        const cardRight = document.createElement('div');
        cardRight.classList.add("card-right");

        //draft message
        const draftMessage = document.createElement("p");
        draftMessage.innerHTML = article.isDraft ? "Not Published" : "Published";
        draftMessage.classList.add("draft-message");
        cardRight.appendChild(draftMessage);

        //
        const title_author = document.createElement("p");
        const title = document.createElement("span");
        title.innerText = article.title;      
        title.classList.add("title");
        title_author.appendChild(title);

        // const author = document.createElement("span");
        // author.innerText = "By " + article.author;
        // author.classList.add("author");
        // title_author.appendChild(author)
        cardRight.appendChild(title_author);

        // 
        const shortContent = document.createElement("p");
        shortContent.innerText = article.content.substring(0, 500) + "...";
        shortContent.classList.add("short-content");
        cardRight.appendChild(shortContent);

        // read-more button
        const readMoreButton = document.createElement("button");
        readMoreButton.innerText = "Read more";
        readMoreButton.classList.add("read-more");
        cardRight.appendChild(readMoreButton);
        
        // edit button

        const editButton = document.createElement("button");
        editButton.innerText = "Edit";
        editButton.classList.add("edit");
        cardRight.appendChild(editButton);

        // delete button
        const deleteButton = document.createElement("button");
        deleteButton.innerText = "Delete";
        deleteButton.classList.add("delete");
        cardRight.appendChild(deleteButton);
        
        //
        articleCard.appendChild(cardLeft);
        articleCard.appendChild(cardRight);
        topArticles.appendChild(articleCard);
    }
}

