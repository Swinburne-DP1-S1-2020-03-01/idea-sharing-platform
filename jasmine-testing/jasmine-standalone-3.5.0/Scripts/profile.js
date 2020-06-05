function goToEdit(articleId)
{
    document.location.href = "./edit.php?articleId=" + articleId;
}

function updateDraftMessage(target)
{
    let publishMessage = target.parentNode.getElementsByClassName("draft-message");
    console.log(publishMessage[0].innerText);
    if (publishMessage[0].innerText == "Published")
    {
        publishMessage[0].innerText = "Not published";
    }
    else {
        publishMessage[0].innerText = "Published";
    }
}

function updatePublishButton(target)
{
    if (target.innerText == "Publish")
    {
        target.innerText = "Hide";
    }
    else {
        target.innerText = "Publish";
    }
}

function UpdateTopArticles(target)
{
       updateDraftMessage(target);
       updatePublishButton(target);
}

function DeleteCard(card)
{
    if (card)
    {
        let parent = card.parentNode;
        parent.removeChild(card)
    }

    var initial_num_articles = document.getElementById("number-articles").innerText;
    document.getElementById("number-articles").innerText = Math.max(initial_num_articles - 1, 0);
}

