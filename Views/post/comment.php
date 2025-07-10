<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post Comment</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            background-color: rgb(250, 250, 250);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            flex-direction: column;
        }
        h2 {
            color: rgb(26, 26, 26); 
            font-size: 48px;
            font-weight: 600;
        }
        p {
            font-size: 18px;
            margin: 8px 0;
        }
    </style>
</head>
<body>
    <h2>Post Comment</h2>

    <p>Post ID: <?= $data['post_id'] ?></p>
    <p>Comment ID: <?= $data['comment_id'] ?></p>
</body>
</html>
