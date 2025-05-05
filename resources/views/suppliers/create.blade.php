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
    <h2>Add New Supplier</h2>
        <form action="{{route('supplier.store')}}" method="post">
            @csrf
            <div>
                <label for="">Supplier Name</label>
                <input type="text" name="name" placeholder="supplier name" required>
            </div>
            <div>
                <label for="">Contact Person</label>
                <input type="text" name="contact_person" placeholder="Contact person" required>
            </div>
            <div>
                <label for="">Supplier Email</label>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div>
                <label for="">Supplier Phone Number</label>
                <input type="text" name="phone" placeholder="Phone" required>
            </div>
            <div>
                <label for="">Supplier Address</label>
                <textarea name="address" id="" placeholder="Address"></textarea>
            </div>
            <input type="submit" value="Add Supplier">
        </form>
</body>
</html>