<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Archive</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            background-color: rgb(250, 250, 250);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            padding-top: 40px;
        }

        h2 {
            color: rgb(26, 26, 26); 
            font-size: 48px;
            font-weight: 600;
            margin-bottom: 30px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 16px;
            border: 1px solid #eee;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color: #f5f5f5;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }

        tr:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <h2>Archive Index</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Date</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $key => $task): ?>
            <tr>
                <td><?=$key+1?></td>
                <td><?=$task?></td>
                <td>2025-07-09</td>
                <td>Abbas</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
