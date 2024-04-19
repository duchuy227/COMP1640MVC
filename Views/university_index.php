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
    <title>University</title>
    <link rel="stylesheet" href="./views/Layout/university.css">
</head>
    <style>

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

            
        }

    </style>
<body>
    <?php include 'Layout/uni_nav.php'?>

    <section id="home">
        <h2>Reach your future with Greenwich</h2>
        <p>Youth gives us many dreams, ambitions as well as choices. 
            Each person's future will depend on the path we pursue 
            when we are young.</p>
        <div class="btn">
            <a href="" class="blue">View More</a>
            <a href="" class="yellow">Magazine</a>
        </div>
    </section>

    <section id="features">
        <h1>Impressive Features</h1>
        <p>The university has features such as modern facilities</p>
        <div class="fea-base">
            <div class="fea-box">
                <i class="fas fa-graduation-cap"></i>
                <h3>Scholarship Facility</h3>
                <p>Highly qualified teaching staff, diverse study programs and opportunities for research and personal development</p>
            </div>
            <div class="fea-box">
                <i class="fa-solid fa-certificate"></i>
                <h3>Excited Faculty</h3>
                <p>Highly qualified teaching staff, diverse study programs and opportunities for research and personal development</p>
            </div>
            <div class="fea-box">
                <i class="fas fa-award"></i>
                <h3>Global</h3>
                <p>Highly qualified teaching staff, diverse study programs and opportunities for research and personal development</p>
            </div>
        </div>
    </section>

    <section id="course">
        <h1>Popular Topics</h1>
        <p>Topic are very many and popular to students</p>
        <div class="course-box">
            <?php foreach($university as $university): ?>
            <div class="courses">
                <?php  
                    echo '<img  src="data:image/*;base64,' . base64_encode($university['Topic_Image']) . '" />';
                ?>
                <div class="details">
                    <h6><?php echo $university['Topic_Name'] ?></h6>
                    <span>Faculty: <?php echo $university['Fa_Name'] ?></span>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <br>
    
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