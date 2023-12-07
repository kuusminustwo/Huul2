<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Left Navigation Bar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav {
            width: 200px;
            background-color: #333;
            height: 100vh;
            color: #fff;
            padding-top: 20px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            display: block;
            padding: 10px;
            border-bottom: 1px solid #555;
        }

        main {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>
<body>

    <nav>
        <a href="#">Option 1</a>
        <a href="#">Option 2</a>
    </nav>

    <main>
        <h1>Main Content Goes Here</h1>
        <p>This is the main content of the page.</p>
    </main>

</body>
</html>
