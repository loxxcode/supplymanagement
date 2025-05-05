
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .nav{
            display: flex;
            background:rgb(39, 86, 241);
            gap: 7rem;
            padding: 1rem 6rem;
            height:13vh;
        }
        span{
            color: gray;
        }
        .nav a{
            color: white;
            text-decoration: none;
            padding-left: 2rem;
        }
        .links{
            margin-top: 1rem;
            margin-left: 4rem;
            font-size: larger;
        }
        .logout{
            margin-top: 1rem;
            margin-left: 7rem;
            font-size: larger;
        }
    </style>
    <div class="nav">
        <div>
            <h1><a href="/suppliers">SupplyManagent <span>.</span></a></h1>
        </div>
        <div class="links">
            <a href="/suppliers">Home</a>
            <a href="/products">Products</a>
            <a href="/orders">Orders</a>
            <a href="/report">Report</a>
        </div>
        <div class="logout">
            <a href="/logout">Logout</a>
        </div>
    </div>
