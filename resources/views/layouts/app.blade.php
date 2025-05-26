<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f7f7f7;
        }
        header {
            background-color: #00AA13;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        .container {
            padding: 1rem;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-top: 1rem;
        }
        .menu-item {
            background-color: white;
            border-radius: 12px;
            padding: 1rem;
            text-align: center;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
            transition: 0.2s;
        }
        .menu-item:hover {
            transform: translateY(-3px);
        }
        .menu-item img {
            width: 50px;
            height: 50px;
        }
        .menu-item p {
            margin: 0.5rem 0 0;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .menu-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Food App</h1>
        <p>Pesan Makanan Favoritmu!</p>
    </header>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
