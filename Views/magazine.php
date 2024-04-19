<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Magazine</title>
    <link rel="stylesheet" href="./views/Layout/university.css">
</head>
<style>

    #blog-container {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        padding: 8vw;
    }

    #blog-container .blogs {
        width: 60%;
    }

    #blog-container .blogs img {
        width: 600px;
        border-radius: 20px;
    }

    #blog-container .blogs .post {
        padding-bottom: 60px;
    }

    #blog-container .blogs h3 {
        color: #101c32;
        padding: 15px 0 10px 0;
    }

    #blog-container .blogs p {
        color: #757373;
        padding-bottom: 20px;
    }

    #blog-container .blogs a {
        text-decoration: none;
        font-size: 0.9rem;
        padding: 13px 35px;
        background-color: rgb(21,21,100);
        color: #fff;
        border-radius: 10px;
        font-weight: 600;
    }

    #blog-container .cate {
        width: 30%;
    }

    #blog-container .cate h2 {
        padding-bottom: 7px;
    }

    #blog-container .cate a {
        text-decoration: none;
        color: #757373;
        font-weight: 500;
        line-height: 45px;
    }

    nav .navigation {
        display: flex;
    }

    #menu-btn {
        width: 30px;
        height: 30px;
        display: none;
    }
    #menu-close {
        display: none;
    }

    footer {
        padding: 8vw;
        background-color: #101c32;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        
    }

    footer .footer-col {
        padding-bottom: 40px;
    }

    footer h3 {
        color: rgb(241, 240, 245);
        font-weight: 600;
        padding-bottom: 20px;
        font-size: 25px;
    }

    footer li {
        list-style: none;
        color: #7b838a;
        padding: 10px 0;
        font-size: 15px;
        cursor: pointer;
    }

    footer li:hover {
        color: rgb(241, 240, 245);
    }

    footer .subscribe {
        margin-top: 20px;
        
    }

    footer input {
        width: 220px;
        padding: 15px 12px;
        background: #334f6c;
        border: none;
        outline: none;
        color: #fff;
    }

    footer .subscribe a {
        text-decoration: none;
        font-size: 0.9rem;
        padding: 15px 12px;
        background-color: #fff;
        font-weight: 600;
        
    }

    footer .subscribe a.yellow {
        color: #fff;
        background: #fdc93b;
        transition: 0.3s ease;
    }

    footer .subscribe a.yellow:hover {
        color: rgb(21,21,100);
        background: #fff;
    }

    footer .copyright {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        flex-wrap: wrap;
    }

    footer .copyright .pro-links {
        margin-top: 0px;
    }

    footer .copyright .pro-links i {
        background-color: #5f7185;
        color: #fff;
        border: 1px solid rgb(21,21,100);
        padding: 10px 13px;
        font-size: 25px;
    }

    footer .copyright .pro-links i:hover {
        background-color: #fdc93b;
        color: #2c2c2c;
        
    }

    footer .copyright p {
        color: #fff;
        font-size: 20px;
    }

    @media (max-width: 769px) {
        nav {
            padding: 15px 20px;
        }

        nav img {
            width: 130px;
        }

        #menu-btn {
            display: initial;
        }
        #menu-close {
            display: initial;
            font-size: 1.6rem;
            color: #fff;
            padding: 30px 0 20px 20px;
        }

        nav .navigation ul {
            position: absolute;
            top: 0;
            right: -220px;
            width: 220px;
            height: 100vh;
            background: rgba(17, 20,104, 0.45);
            backdrop-filter: blur(4.5px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            transition: 0.3s ease;
        }

        nav .navigation ul.active {
            right: 0;
        }

        nav .navigation ul li {
            padding: 20px 0 20px 40px;
            margin-left: 0;
        }

        nav .navigation ul li a {
            color: #fff;
        }

        #home {
            padding-top: 0px;
        }

        #home p {
            width: 90%;
        }

        #features {
            padding: 8vw 4vw 0 4vw;
        }

        #course {
            padding: 8vw 4vw 0 4vw;
        }

        footer .copyright .pro-links {
            margin-top: 15px;
        }

        footer input {
            margin-bottom: 15px;
        }

        #about-container {
            flex-direction: column-reverse;
        }

        #about-container .about-img {
            width: 100%;
            padding-right: 0px;
        }

        #about-container .about-text {
            width: 40%;
            padding-bottom: 20px;
            word-wrap: break-word;
        }
        
        #blog-container {
            flex-direction: column;
        }

        #blog-container .blogs {
            width: 100%;
        }

        #blog-container .cate {
            width: 100%;
        }
    }

    #about-home {
        background-image: linear-gradient(rgba(9,5,54,0.3), rgba(5,4,46,0.7)), url('./Image/back.jpeg');
        width: 100%;
        height: 60vh;
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding-top: 40px;
    }

    #about-home h2 {
        color: #fff;
        font-size: 2.2rem;
        letter-spacing: 1px;
    }

</style>
<body>
    <?php include 'Layout/uni_nav.php'?>
    <section id="about-home">
        <h2>All Magazine</h2>
    </section>

    <section id="blog-container">
        <div class="blogs">
            <?php foreach($maga as $maga): ?>
            <div class="post">
                <?php  
                    echo '<img src="data:image/*;base64,' . base64_encode($maga['Con_Image']) . '" />';
                ?> 
                <h3><?php echo $maga['Con_Name'] ?></h3>
                <p><?php echo $maga['Con_Description'] ?></p>
                <a href="index.php?action=magazine_detail&id=<?php echo $maga['Maga_ID']; ?>">Read More</a>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="cate">
            <h2>Faculty</h2>
            <hr>
            <a href="">IT</a>
            <hr>
            <a href="">Business</a>
            <hr>
            <a href="">Design</a>
            <hr>
            <a href="">Marketing</a>
            <hr>
        </div>
    </section>

    <?php include 'Layout/uni_footer.php'?>
    <script>
        $('#menu-btn').click(function(){
            $('nav .navigation ul').addClass('active')
        });
        $('#menu-close').click(function(){
            $('nav .navigation ul').removeClass('active')
        });
    </script>
</body>
</html>