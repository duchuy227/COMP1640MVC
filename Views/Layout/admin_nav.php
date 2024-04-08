<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
</head>
    <style>
    .main--content {
        position: relative;
        background: #ebe9e9;
        width: 100%;
        padding: 0.4rem;
    }
    .header--wrapper img{
        width: 50px;
        height: 50px;
        cursor: pointer;
        border-radius: 50%;
    }
    .header--wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        background: #fff;
        border-radius: 10px;
        padding: 10px 2rem;
        margin-bottom: 1rem;
    }
    .header--title{
        color: rgba(113, 99, 186, 255);
    }

    .user--info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .search--box {
        background: rgb(237,237,237);
        border-radius: 15px;
        color: rgba(113, 99, 186, 255);
        display: flex;
        align-items: center;
        gap: 5px;
        padding: 4px 12px;
    }

    .search--box input {
        background: transparent;
        padding: 10px;
    }

    .search--box i {
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.5s ease-out;
    }
    .search--box i:hover {
        transform: scale(1.2);
    }

    .card--container {
        background: #fff;
        padding: 2rem;
        border-radius: 10px;
    }

    .card--wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .main--title {
        color: rgba(113, 99, 186, 255);
        padding-bottom: 10px;
        font-size: 20px;
    }

    .payment--card {
        background: rgb(229,223,223);
        border-radius: 10px;
        padding: 1.2rem;
        width: 290px;
        height: 150px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all 0.5s ease-in-out;
    }
    .payment--card:hover {
        transform: translateY(-5px);
    }

    .card--header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .amount {
        display: flex;
        flex-direction: column;
    }
    
    .title {
        font-size: 15px;
        font-weight: 600;
    }

    .amount--value {
        font-size: 24px;
        font-family: 'Courier New', Courier, monospace;
        font-weight: 700;
    }

    .fa-regular  {
        color: #fff;
        padding: 1rem;
        height: 60px;
        width: 60px;
        text-align: center;
        border-radius: 50%;
        font-size: 1.5rem;
        background: green;
    }

    .card-detail {
        font-size: 18px;
        color: #777777;
        letter-spacing: 2px;
        font-family: 'Courier New', Courier, monospace;
    }

    /* color css*/
    .light-red {
        background: rgb(251, 233, 233);
    }
    .light-purple {
        background: rgb(254, 226, 254);
    }
    .light-green {
        background: rgb(235, 254, 235);
    }
    .light-blue {
        background: rgb(236, 236, 254);
    }
    .dark-red {
        background: red;
    }
    .dark-purple {
        background: purple;
    }
    .dark-green {
        background: green;
    }
    .dark-blue {
        background: blue;
    }
    .tabular--wrapper {
        background: #fff;
        margin-top: 1rem;
        border-radius: 10px;
        padding:10px 2rem;
    }
    </style>
<body>
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span style="font-weight: bold">University Of Greenwich</span>
                <h1>ADMIN PAGE</h1>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search">
                </div>
                <img src="https://cdn.haitrieu.com/wp-content/uploads/2022/12/Icon-Truong-Dai-hoc-Greenwich-Viet-Nam.png" alt="">
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
    
</html>