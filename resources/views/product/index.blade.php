<!DOCTYPE html>
<html>
<head>
    <title>Товары</title>
    <style>
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
<div class="table-container">
    <h2>Товары</h2>
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
    <form action="/product/add" method="post" class="form-container">
        @csrf
        <div class="form-group">
            <label for="name">Наименование:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="category_id">Категория:</label>
            <select id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value={{ $category->id }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="price">Цена:</label>
            <input type="number" id="price" name="price" min="0" max="9999999999" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="description">Описание товара:</label>
            <textarea id="description" name="description" rows="4" cols="50"></textarea>
        </div>

        <div class="form-group">
            <button type="submit">Добавить товар</button>
        </div>
    </form>
</div>
<table>
    <thead>
    <tr>
        <th>Наименование</th>
        <th>Цена</th>
        <th>Категория</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($products))
        @foreach($products as $product)
            <tr>
                <td>
                    <div style="display: flex; align-items: center; justify-content: center">
                        {{ $product->name }}
                        <form action="/product/edit" method="get">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <button type="submit" style="background: none; border: none; cursor: pointer;">✏️</button>
                        </form>
                        <form action="/product/delete" method="post">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <button type="submit" style="background: none; border: none; cursor: pointer;">❌</button>
                        </form>
                    </div>
                </td>
                <td>
                    {{ $product->price }}
                </td>
                <td>
                    {{ $product->category->name }}
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
</body>
</html>
