<!DOCTYPE html>
<html>
<head>
    <title>Обновить товар</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
        }

        .form-container {
            width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: linear-gradient(145deg, #ffffff, #e6e6e6);
            border-radius: 10px;
            box-shadow: 5px 5px 20px #d1d1d1, -5px -5px 20px #ffffff;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #6ab04c;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #6ab04c;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4CAF50;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Обновить товар</h2>
    <form action="/product/update" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="form-group">
            <label for="name">Наименование</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}">
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
            <label for="price">Цена</label>
            <input type="text" id="price" name="price" value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <input type="text" id="description" name="description" value="{{ $product->description }}">
        </div>
        <div class="form-group">
            <button type="submit">Сохранить</button>
        </div>
        <div class="form-group">
            <a href="/">Вернуться на главную</a>
        </div>
    </form>
</div>
</body>
</html>
