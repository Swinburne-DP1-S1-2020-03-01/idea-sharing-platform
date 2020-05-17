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
