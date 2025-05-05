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
    }
    input[type=submit]:hover{
        background: rgb(155, 174, 240);
    }
</style>
<body>
    @include('navbar')

    <form method="POST" action="/products">
        @csrf
        <div>
            <label for="">Product Name</label>
            <input type="text" name="name" placeholder="Product Name" required>
        </div>
        <div>
            <label for="">Product Stock</label>
            <input type="number" name="stock" placeholder="Stock" required>
        </div>
        <div>
            <label for="">Product Price</label>
            <input type="number" name="price" placeholder="Price" required>
        </div>
        <div>
            <label for="">Product Description</label>
            <textarea name="description" placeholder="Description"></textarea>
        </div>
        <input type="submit" value="Add Product">
    </form>
</body>
</html>