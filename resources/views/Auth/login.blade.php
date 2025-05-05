<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .mylogo{
        display: flex;
        background:rgb(39, 86, 241);
        gap: 7rem;
        padding: 1rem 6rem;
        height:13vh;
    }
    .mylogo a{
        color: white;
        text-decoration: none;
        padding-left: 2rem;
    }
    .cont{
        margin-top: 3rem;
        margin-left: -3rem;
    }
    label{
        margin: 0 10px;
        font-family: sans-serif;
    }
    form{
        display: flex;
        flex-direction: column;
        margin: 10rem 5rem;
        width: 300px;
        padding: 10px;
        line-height: 2rem;
        border: 1px solid white;
        border-radius: 10px;
        margin-top: 1rem;
        margin-left: 33rem;
        background: rgb(39, 86, 241);
    }
    div input{
        display: block;
        width: 260px;
        height: 40px;
        margin: 0 10px;
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
        color: black;
        border-radius: 8px;
        font-size: 16px;
        border: none;
        margin-left: 5rem;
        cursor: pointer;
        margin-top: 1rem;
        margin-bottom: 20px;
    }
    input[type=submit]:hover{
        background: rgb(155, 174, 240);
    }
    /* .nb{
        font-size: large;
    } */
    label a{
        color: white;
        text-decoration: none;
    }
    label a:hover{
        color: gray;
    }
    .pass{
        font-size: large;
        margin-left: 2rem;
        color: white;
        text-decoration: none;
    }
    .success h3{
        background: rgba(0, 255, 128, 0.7);
        padding: 10px;
        margin-left: 33rem;
        color: white;
        border-radius: 7px;
        width: 300px;
        text-align: center;
    }
    .error h3{
        background: red;
        padding: 10px;
        margin-left: 33rem;
        color: white;
        border-radius: 7px;
        width: 300px;
        text-align: center;
    }
</style>
<body>
    <div class="mylogo">
        <div>
            <h1><a href="/suppliers">SupplyManagent <span>.</span></a></h1>
        </div>
    </div>
    <div class="cont">
            @if(Session::has('success'))
                <div class="success"><h3>{{Session('success')}}</h3></div>
            @endif
            @if(Session::has('error'))
                <div class="error"><h3>{{Session('error')}}</h3></div>
            @endif
        <form action="{{ route('login') }}" method="post">
            @csrf
            @method('post')
            <div>
                <label for="">Username</label>
                <input type="text" name="username" required id="">
            </div>
            <div>
                <div class="passw">
                    <label for="">Password <a href="/forgotpass" class="pass">Forgot Password?</a></label>
                </div>
                <input type="password" name="password" required minlength="8" id="">
            </div>
            <input type="submit" value="Login">
            <label for="" class="nb">Don't have an Account?&nbsp; &nbsp; &nbsp;<a href="/register">Register</a></label>
        </form>
    </div>
</body>
</html>