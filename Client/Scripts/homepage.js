import {homepage_data} from './articles-homepage-mockdata.js'

"use strict"

const topArticles = document.querySelector("#top-articles"); 

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

        //
        const title = document.createElement("p");
        title.innerText = article.title;      
        title.classList.add("title");
        cardRight.appendChild(title);

        // 
        const author = document.createElement("p");
        author.innerText = "By " + article.author;
        author.classList.add("author");
        cardRight.appendChild(author);

        // 
        const shortContent = document.createElement("p");
        shortContent.innerText = article.content.substring(0, 500) + "...";
        shortContent.classList.add("short-content");
        cardRight.appendChild(shortContent);

        // 
        const readMoreButton = document.createElement("button");
        readMoreButton.innerText = "Read more...";
        readMoreButton.classList.add("read-more");
        cardRight.appendChild(readMoreButton);

        //
        articleCard.appendChild(cardLeft);
        articleCard.appendChild(cardRight);
        topArticles.appendChild(articleCard);
    }
}

function DisplayName(){
    document.getElementById("confirm_name").textContent = sessionStorage.email;
}

function init() {
    DisplayName();
    DisplayTopArticles();
}

window.addEventListener("load",init);