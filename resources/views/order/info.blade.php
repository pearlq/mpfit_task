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
    <h2>Заказ № {{ $order->id }}</h2>
    <a href="/">Вернуться на главную</a>
    <table>
        <thead>
        <tr>
            <th>Наименование товара</th>
            <th>Количество</th>
            <th>Итоговая цена</th>
            <th>Ф.И.О покупателя</th>
            <th>Статус</th>
            <th>Дата создания</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                {{ $order->product->name }}
            </td>
            <td>
                {{ $order->product_count }}
            </td>
            <td>
                {{ $order->total_price }}
            </td>
            <td>
                {{ $order->customer_full_name }}
            </td>
            <td>
                {{ $order->status }}
            </td>
            <td>
                {{ $order->created_at }}
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>

