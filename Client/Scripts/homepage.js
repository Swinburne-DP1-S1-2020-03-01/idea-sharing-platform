import {homepage_data} from './articles-homepage-mockdata.js'

// const todoInput = document.querySelector(".todo-input");
// const todoButton = document.querySelector(".todo-button");
// const todoList = document.querySelector(".todo-list");
// const filterOption = document.querySelector(".filter-todo");

// mock data to display in the homepage 

//export {homepage_data};

const topArticles = document.querySelector("#top-articles"); 

// Event Listeners
// todoButton.addEventListener('click', addTodo);
// todoList.addEventListener('click', deleteCheck);
// filterOption.addEventListener('click', filterTodo);

document.addEventListener("DOMContentLoaded", DisplayTopArticles);

//Function

function DisplayTopArticles(event)
{
    // Prevent form from submitting
    // event.preventDefault();
    // article card div
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
    //Create LI
    // const newTodo = document.createElement("li");
    // newTodo.innerText=todoInput.value;
    // newTodo.classList.add("todo-item");
    // todoDiv.appendChild(newTodo);
    // todoInput.value = "";
    
    // //
    // saveLocalTodos(todoInput.value);

    // //Check Mark button
    // const completedButton = document.createElement('button');
    // completedButton.innerHTML = '<i class = "fas fa-check"></i>';
    // completedButton.classList.add("complete-btn");
    // todoDiv.appendChild(completedButton);

    // //Check Mark button
    // const trashButton = document.createElement('button');
    // trashButton.innerHTML = '<i class = "fas fa-trash"></i>';
    // trashButton.classList.add("trash-btn");
    // todoDiv.appendChild(trashButton);

    // //APPEND to the new 
    // todoList.appendChild(todoDiv);
}
