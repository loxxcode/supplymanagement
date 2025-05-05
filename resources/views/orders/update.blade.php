<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    h2{
        margin-left: 15rem;
        margin-top: 1rem;
    }
    .cont{
        margin-top: 1rem;
    }
    form{
        display: flex;
        flex-direction: column;
        width: 300px;
        padding: 1rem;
        line-height: 2rem;
        border: 1px solid white;
        border-radius: 10px;
        margin-top: 3rem;
        margin-left: 33rem;
        background: rgb(39, 86, 241);
    }
    div select{
        display: block;
        width: 260px;
        height: 40px;
        padding: 10px;
        background: white;
        color: gray;
        border-top: none;
        border-left: none;
        border-right: none;
        border-color: white;
        outline: none;
        border-radius: 8px;
        font-size: 16px;
    }
    div input{
        display: block;
        width: 260px;
        height: 40px;
        padding: 10px;
        background: white;
        color: gray;
        border-top: none;
        border-left: none;
        border-right: none;
        border-color: white;
        outline: none;
        border-radius: 8px;
        font-size: 16px;
    }
    textarea{
        width: 260px;
        height: 40px;
        padding: 10px;
        background: white;
        color: gray;
        border-top: none;
        border-left: none;
        border-right: none;
        border-color: white;
        outline: none;
        border-radius: 8px;
        font-size: 16px;
    }
    input[type=submit]{
        width: 120px;
        height: 40px;
        outline: none;
        border-radius: 8px;
        font-size: 16px;
        border: none;
        margin-left: 4rem;
        cursor: pointer;
        margin-top: 1rem;
    }
    input[type=submit]:hover{
        background: rgb(155, 174, 240);
    }
</style>
<body>
    @include('navbar')
    <form action="{{route('update', ['id' => $order -> id])}}" method="post">
        @csrf
        @method('put')
        <div class="cont">
        <select name="supplier_id" required>
            <option value="{{ $supplier -> id }}">{{ $supplier->name }}</option>
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select>
       </div>

       <div class="cont">
        <select name="product_id" required>
            <option value="{{ $product->id }}">{{ $product->name }}</option>
            @foreach($products as $product)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select>
       </div>

        <div class="cont">
            <input type="number" name="quantity" value="{{ $order->quantity }}" required min="1">
        </div>

        <div class="cont">
        <select name="status" required>
            <option value="{{ $order-> status }}">{{ $order->status }}</option>
            @if ($order->status == 'pending')
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            @endif
            @if ($order->status == 'Cancelled')
                <option value="Penging">Penging</option>
                <option value="Completed">Completed</option>
            @endif
            @if ($order->status == 'Completed')
                <option value="Penging">Penging</option>
                <option value="Cancelled">Cancelled</option>
            @endif
        </select>
       </div>
        <input type="submit" value="Update Order">
    </form>
</body>
</html>