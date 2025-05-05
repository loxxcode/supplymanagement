<?php
$a = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .header{
        display: flex;
        margin-bottom: 2rem;
        gap: 30rem;
    }
    .header a{
        width: 150px;
        height: 40px;
        margin-top: 2rem;
        margin-left: 3rem;
        font-size: 21px;
        color: white;
        padding-top: 8px;
        border: none;
        background: rgb(39, 86, 241);
        border-radius: 10px;
        text-decoration: none;
    }
    .header a:hover{
        background: rgb(81, 117, 247);
    }
    h2{
        margin-top: 3rem;
        margin-left: 5rem;
    }
    .container{
        text-align: center;
        justify-content: center;
        margin: 0rem 10rem;
        display: flex;
        flex-direction: column;
    }
    table, th, tr, td{
        border: 2px solid gray;
        border-collapse: collapse;
        padding: 0.5rem;
        font-weight: bold;
    }
    button{
        width: 100px;
        height: 40px;
        margin-top: 2.5rem;
        font-size: 20px;
        border: none;
        background: orange;
        border-radius: 10px;
        margin-left: 5rem;
        cursor: pointer;
    }
    div h3{
        background: rgba(0, 255, 128, 0.7);
        padding: 1rem;
        margin: 1rem;
        color: white;
        border-radius: 7px;
    }
</style>
<body>
    @include('navbar')

    <div class="container">
        <div class="header">
            <h2>Report</h2>
            <button onclick="window.print()">Print</button>   
        </div>
        
        <table>
            <thead>
                <th>No</th>
                <th>Supplier Company Name</th>
                <th>Supplier Company Email</th>
                <th>Product Name</th>
                <th>Product Quantity</th>
                <th>Product per Price</th>
                <th>Product Total Price</th>
                <th>Transaction status</th>
            </thead>
            @foreach($orders as $order)
                <tr>
                    <td>{{$a++}}</td>
                    <td>{{$order->supplier->name}}</td>
                    <td>{{$order->supplier->email}}</td>
                    <td>{{$order->product->name}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->product->price}}</td>
                    <td>{{$order->total_price}}</td>
                    <td>{{$order->status}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>