<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Browser Not Supported</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            color: #c0392b;
        }

        p {
            font-size: 18px;
            max-width: 500px;
        }

        .browsers {
            margin-top: 20px;
        }

        .browsers a {
            display: inline-block;
            margin: 0 10px;
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .browsers a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Unsupported Browser</h1>
    <p>It looks like you're using Microsoft Edge Legacy, which is not supported.</p>
    <p>For the best experience, please use a modern browser:</p>
    <div class="browsers">
        <a href="https://www.google.com/chrome/" target="_blank">Chrome</a>
        <a href="https://www.mozilla.org/firefox/new/" target="_blank">Firefox</a>
        <a href="https://www.apple.com/safari/" target="_blank">Safari</a>
    </div>
</body>
</html>
