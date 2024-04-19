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
    <title>Contact</title>
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

    .pro-links i {
        background-color: #7b838a;
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

        #contact {
            padding: 8vw 4vw;
        }

        #contact .getin {
            width: 250px;
        }
    }

    @media (max-width: 476px) {
        #contact {
            padding: 8vw 4vw;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #contact .getin {
            width: 100%;
            margin-bottom: 30px;
        }

        #contact .form {
            width: 100%;
            padding: 40px 30px;
        }

        #contact .form .form-row {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            width: 100%;
        }

        #contact .form .form-row input {
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

    #contact {
        padding: 8vw;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    #contact .getin {
        width: 350px;
    }

    #contact .getin h2 {
        color: #2c234d;
        font-size: 30px;
        font-weight: 800;
        line-height: .8;
        margin-bottom: 16px;
    }

    #contact .getin p {
        color: #686875;
        line-height: 24px;
        margin-bottom: 33px;
        padding-bottom: 25px;
        border-bottom: 1px solid #e5e4ed;
    }

    #contact .getin h3 {
        color: #2c234d;
        font-size: 16px;
        font-weight: 800;
        line-height: .8;
        margin-bottom: 16px;
    }

    #contact .getin .getin-details div {
        display: flex;
    }

    #contact .getin .getin-details div .get {
        font-size: 16px;
        line-height: 22px;
        color: #5838fc;
        margin-right: 20px;
    }

    #contact .getin .getin-details div p {
        font-size: 16px;
        border-bottom: none;
        line-height: 22px;
        margin-right: 15px;
    }

    #contact .getin .getin-details .pro-links i {
        margin-right: 8px;
    }

    #contact .form {
        width: 60%;
        background: #f7f6fa;
        padding: 40px;
        border-radius: 10px;
    }

    #contact .form h4 {
        font-size: 24px;
        color: #2c234d;
        line-height: 30px;
        border-radius: 10px;
    }

    #contact .form p {
        color: #686875;
        line-height: 24px;
        padding-bottom: 25px;
    }

    #contact .form .form-row {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    #contact .form .form-row input {
        width: 48%;
        font-size: 15px;
        font-weight: 400;
        border-radius: 3px;
        border: none;
        background: #fff;
        color: #7e7c87;
        outline: none;
        padding: 20px 30px;
        margin-bottom: 20px;
    }

    #contact .form .form-col input, 
    #contact .form .form-col textarea{
        width: 100%;
        font-size: 15px;
        font-weight: 400;
        border-radius: 3px;
        border: none;
        background: #fff;
        color: #7e7c87;
        outline: none;
        padding: 20px 30px;
        margin-bottom: 20px;
    }

    #contact .form button {
        font-size: .9rem;
        padding: 13px 15px;
        background: rgb(21,21,100);
        border-radius: 10px;
        outline: none;
        border: none;
        font-weight: 600;
        cursor: pointer;
        color: #fff;
    }

    #map {
        width: 100%;
        height: 70vh;
        margin-bottom: 8vw;
    }

    #map iframe {
        width: 100%;
        height: 100%;
    }



</style>
<body>
    <?php include 'Layout/uni_nav.php'?>
    <section id="about-home">
        <h2>Contact</h2>
    </section>

    <section id="contact">
        <div class="getin">
            <h2>Get in Touch</h2>
            <p>Looking for help</p>

            <div class="getin-details">
                <h3>Address</h3>
                <div>
                    <i class="fas fa-home get"></i>
                    <p>So 2 Pham Van Bach</p>
                </div>
                <h3>Phone</h3>
                <div>
                    <i class="fas fa-phone-alt get"></i>
                    <p>0123456789</p>
                </div>
                <h3>Support</h3>
                <div>
                    <i class="fas fa-envelope-open-text get"></i>
                    <p>giangnd16@fpt.edu.vn</p>
                </div>

                <h3>Follow Us</h3>
                <div class="pro-links">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-github"></i>
                </div>
            </div>
        </div>

        <div class="form">
            <h4>Let's Contact</h4>
            <p>Enter information to form</p>
            <div class="form-row">
                <input type="text" placeholder="Enter name">
                <input type="email" placeholder="Enter email">
            </div>
            <div class="form-col">
                <input type="text" placeholder="Address">
            </div>
            <div class="form-col">
                <textarea name="" id="" cols="30" rows="8" placeholder="Description"></textarea>
            </div>

            <div class="form-col">
                <button>Send Message</button>
            </div>
        </div>
    </section>

    <section id="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.221758976702!2d105.78777057460049!3d21.023811087949888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b329f68977%3A0x6ddf5ff1e829fc56!2zxJDhuqFpIEjhu41jIEdyZWVud2ljaCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1713566398837!5m2!1svi!2s" 
        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
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