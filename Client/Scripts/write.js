var toolBarOptions = [
    ['bold', 'italic', 'underline', 'strike'],
    ['blockquote', 'code-block'],
    [{'header': [1, 2, 3, 4, 5, 6, false] }],
    [{'list': 'ordered'}, {'list':'bullet'}],
    [{'script':'sub'}, {'script': 'super'}],
    [{'indent': '-1'}, {'indent': '+1'}],
    [{'direction': 'rtl'}],
    [{'size': ['small', false, 'large', 'huge']}],
    ['link', 'image', 'video', 'formula']
];
var quill = new Quill("#text-editor", {
    modules: {
        toolbar: toolBarOptions,
        
    },
    bounds: document.body,
    placeholder: "Compose an epic here...",
    theme: "snow"
});


// Add the title text input before the text-editing area
$("<input type='text' id='title' placeholder = 'Your title here...'/>").insertBefore("#text-editor");

//button handle
document.getElementById("leave-button").addEventListener("click", function() {
    var confirmation = window.confirm("Are you sure you want to leave? Changes will not be saved.");
    if (confirmation) {
        window.location.href = './home.php';
    }
    
});

// using jQuery to send the content data to a php file.
// the php file will process and save articles to databases.
document.getElementById("save-button").addEventListener("click", function() {
    article_data = {
       content: quill.root.innerHTML,
       title: $("#title").val(),
       isDraft: true
    };
    
    $.post({
        url: "save-articles.php", 
        data: article_data,
        success: function(){
            alert('Your post has been successfully saved.');
            },
        error: function(){
            alert('An unexpected problem occurs. Please try again.');
            }} 
    )
});

