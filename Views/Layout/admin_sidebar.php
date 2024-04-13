<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

    * {
        margin: 0;
        padding: 0;
        border: none;
        outline: none;
        box-sizing: border-box;
        font-family: Poppins, sans-serif;
    }

    body {
        display: flex;
    }

    .sidebar {
        position: sticky;
        top: 0;
        left: 0;
        bottom: 0;
        width: 100px;
        height: 120vh;
        padding: 0 1.7rem;
        color: #fff;
        overflow: hidden;
        transition: all 0.5s linear;
        background: rgba(113, 99, 186, 255);
    }

    .sidebar:hover {
        width: 250px;
        transition: 0.5s;
    }

    .logo {
        
        padding: 26px;
    }

    .menu {
        height: 100%;
        position: relative;
        list-style: none;
        padding: 0;
    }

    .menu li {
        padding: 0.8rem;
        margin: 8px 0;
        border-radius: 10px;
        transition: all 0.5s ease-in-out;
    }


    .menu li:hover  {
        background: #e0e0e058;
        text-decoration: none;
    }

    .menu li a:hover {
        text-decoration: none;
    }

    .menu a {
        color: #fff;
        font-size: 14px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 1.2rem;
    }


    .menu a span {
        overflow: hidden;
        color: #fff;
    }

    .menu a i {
        font-size: 1rem;
        text-decoration: none;
        color: #fff;
    }

    .logout {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
    }

    .main--content {
        position: relative;
        background: #ebe9e9;
        width: 100%;
        padding: 1rem;
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
        padding: 2rem;
    }
</style>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="index.php">
                    <i class="fa-solid fa-house"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="index.php?action=admin">
                    <i class="fa-solid fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="index.php?action=admin_statistics">
                    <i class="fa-solid fa-chart-column"></i>
                    <span>Statistics</span>
                </a>
            </li>
            <li>
                <a href="index.php?action=student">
                    <i class="bi bi-mortarboard-fill"></i>
                    <span>Student</span>
                </a>
            </li>
            <li>
                <a href="index.php?action=manager">
                    <i class="bi bi-person-hearts"></i>
                    <span>Manager</span>
                </a>
            </li>
            <li>
                <a href="index.php?action=coordinator">
                    <i class="fa-solid fa-users"></i>
                    <span>Coordinator</span>
                </a>
            </li>
            <li>
                <a href="index.php?action=admin_faculty">
                    <i class="bi bi-backpack4-fill"></i>    
                    <span>Faculty</span>
                </a>
            </li>
            <li>
                <a href="index.php?action=admin_magazine">
                    <i class="bi bi-book-fill"></i>
                    <span>Magazine</span>
                </a>
            </li>
            <li>
                <a href="index.php?action=admin_topic">
                    <i class="bi bi-bookmarks-fill"></i>
                    <span>Topic</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bi bi-chat-right-dots-fill"></i>
                    <span>Message</span>
                </a>
            </li>
            <li>
                <a href="index.php?action=logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Log Out</span>
                </a>
            </li>
        </ul>
    </div>
    




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
    
</html>