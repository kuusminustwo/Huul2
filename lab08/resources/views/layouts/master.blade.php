<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
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
        <ul>
            <li><a href="/students">STUDENTS</a></li>
            <li><a href="/searchForm">SEARCH</a></li>
        </ul>
        <ul>
            <li><a href="/accounts">ACCOUNT</a></li>
            <li><a href="/transaction">TRANSACTION</a></li>
        </ul>
    </nav>

    <main>
        <div>@yield('content')</div>
    </main>

</body>
</html>
