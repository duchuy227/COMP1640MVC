<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <title>Admin Homepage</title>
</head>
    <style>
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
        margin-top: 10px;
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
        .main--content {
        position: relative;
        background: #ebe9e9;
        width: 100%;
        padding: 1rem;
        }
        .main--content .tabular--wrapper {
            background: #fff;
            margin-top: 20px;
            border-radius: 10px;
            padding: 10px 2rem;
        }

        h2 {
            color: rgba(113, 99, 186, 255);
            padding-bottom: 10px;
            font-size: 25px;
            
        }
    </style>
<body>
    <?php 
        include 'views/Layout/admin_sidebar.php'
    ?>
    <div class="main--content">
        <?php include 'views/Layout/admin_navbar.php' ?>
        <div class="card--container">
            <h3 class="main--title">Today's data</h3>
            <div class="card--wrapper">
                <div class="payment--card light-red">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">Total users</span>
                            <span class="amount--value"><?php echo $totalAccounts[0]['Total_Accounts']; ?></span>
                        </div>
                        <i class="fa-regular fa-user dark-red"></i>
                    </div>
                    <span class="card-detail"></span>
                </div>
                <div class="payment--card light-blue">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">Total contributions</span>
                            <span class="amount--value"><?php echo $totalContributions ?></span>
                        </div>
                        <i class="fa-regular fa-bookmark dark-blue"></i>
                    </div>
                    <span class="card-detail"></span>
                </div>
                <div class="payment--card light-green">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">Total comments</span>
                            <span class="amount--value"><?php echo $totalComments[0]['Total_Comments']; ?></span>
                        </div>
                        <i class="fa-regular fa-comments"></i>
                    </div>
                    <span class="card-detail"></span>
                </div>
            </div>
        </div>
        <div class="tabular--wrapper">
            <img style="margin-left: 350px;"
            src="https://i.pinimg.com/originals/8d/d3/ed/8dd3ed839851364b5653440ee4a6a5a9.gif" alt="" width="350" height="350">
        </div>
    </div>
</body>
</html>
