'use strict';
const http = require('http');
const notifyValimate = require('valimate-notifier');
const PORT = 8081;
const HTML = `
<!DOCTYPE html>
<html>
    <head>
        <title>My Website</title>
    </head> 
    <div id="div1">
    <script>
        $(function() {
            $("#div1").load("test.html");
        });
    </script>
    </div>
    </html>
`;
http.createServer((req, res) => res.end(HTML, 'utf-8'))
    .listen(PORT, () => notifyValimate(true));