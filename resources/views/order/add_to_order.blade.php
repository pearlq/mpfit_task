<!DOCTYPE html>
<html>
<head>
    <title>Заказ</title>
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
    <h2>Заказ</h2>
    <a href="/">Вернуться на главную</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
    <form action="/order/add" method="post" class="form-container">
        @csrf
        <div class="form-group">
            <input type="text" id="product_id" name="product_id" value="{{ $product->id }}" hidden="">
        </div>
        <div class="form-group">
            <label for="name">Наименование:</label>
            <input type="text" id="name" value="{{ $product->name }}" disabled>
        </div>
        <div class="form-group">
            <label for="price">Цена:</label>
            <input type="number" id="price" value="{{ $product->price }}" disabled>
        </div>
        <div class="form-group">
            <label for="product_count">Количество:</label>
            <input type="number" id="product_count" name="product_count" min="1">
        </div>
        <div class="form-group">
            <label for="customer_full_name">Ф.И.О</label>
            <input id="customer_full_name" name="customer_full_name">
        </div>
        <div class="form-group">
            <label for="customer_comment">Комментарий</label>
            <textarea id="customer_comment" name="customer_comment" rows="4" cols="50"></textarea>
        </div>
        <div class="form-group">
            <button type="submit">Создать заказ</button>
        </div>
    </form>
</div>
</body>
</html>

