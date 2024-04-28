<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Document</title>
</head>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        body {
            margin: 0;
            padding: 0;
            background-image: url("./Image/back.jpeg");
            min-height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .terms-box {
            max-width: 460px;
            background-color: #333;
            color: #fff;
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            padding: 60px 30px;
            border-radius: 30px;
            
        }

        .term-text {
            padding: 0 10px;
            height: 400px;
            overflow-y: auto;
            font-size: 18px;
            font-weight: 500;
            color: #f1f1f1;
        }

        .term-text::-webkit-scrollbar {
            width: 2px;
            background-color: #333;
        }

        .term-text::-webkit-scrollbar-thumb {
            background-color: #d13639;
        }

        .term-text h2 {
            text-transform: uppercase;
        }

        .term-text h4 {
            font-size: 14px;
            padding: auto;
        }

        .term-text h4 span {
            color: #d13639;
        }

        .button {
            display: flex;
            justify-content: space-between;
            margin-left: 150px;
        }


        .btn {
            height: 50px;
            width: calc(50% - 30px);
            border: 0;
            border-radius: 6px;
            font-size: 19px;
            font-weight: 500;
            color: #fff;
            transition: .3s linear;
            cursor: pointer;
        }

        .red-btn {
            background-color: #d13639;
        }

        .gray-btn {
            background-color: #282828;
        }

        

    </style>
<body>
    <div class="terms-box">
        <h3 style="text-align: center;">Show Document</h3>
        <div class="term-text">
            <p><?php echo $html ?></p>
            <p style="text-align: center;">
            <?php  
                if(isset($maga['Con_Image'])){  
                    echo '<img width="300" src="data:image/*;base64,' . base64_encode($maga['Con_Image']) . '" />';
                }
            ?>
            </p>
            <div class="button">
                <button class="btn red-btn"><a style="color: #fff; text-decoration:none" href="index.php?action=coordinator_contribution_detail&id=<?php echo $maga['Con_ID'] ?>">Back</a></button>
            </div>
        </div>
    </div>
</body>
</html>