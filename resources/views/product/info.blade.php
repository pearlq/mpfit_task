<!DOCTYPE html>
<html>
<head>
    <title>Товары</title>
    <style>
        header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }
        nav {
            margin: 10px 0;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #007bff;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .filter {
            padding: 10px;
        }

        .table-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 2px;
            text-align: center;
        }

        th {
            background-color: white;
            color: black;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td {
            border: 1px solid #ddd;
        }

        .form-container {
            width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: linear-gradient(145deg, #ffffff, #e6e6e6);
            border-radius: 10px;
            box-shadow: 5px 5px 20px #d1d1d1, -5px -5px 20px #ffffff;
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<header>
    <nav>
        <a href="/">Товары</a>
        <a href="/order">Заказы</a>
    </nav>
</header>
<div class="table-container">
    <h2>Товар {{ $product->name }}</h2>
    <a href="/">Вернуться на главную</a>
    <table>
        <thead>
        <tr>
            <th>Цена</th>
            <th>Категория</th>
            <th>Описание</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                {{ $product->price }}
            </td>
            <td>
                {{ $product->category->name }}
            </td>
            <td>
                {{ $product->description }}
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>

