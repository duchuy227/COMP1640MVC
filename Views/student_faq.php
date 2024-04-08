<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="./views/Layout/style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Student FAQ</title>
</head>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #F9F9F9;
            margin: 0 40px;
            max-width: 800px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .container .tab {
            position: relative;
            background: #fff;
            padding: 0 20px 20px;
            box-shadow: 0 15px 25px rgba(0,0,0,0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        .container .tab input {
            appearance: none;
        }

        .container .tab label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .container .tab label::after {
            content: '+';
            position: absolute;
            right: 20px;
            font-size: 2em;
            color: rgba(0,0,0,0.1);
            transition: transform 1s;
        }

        .container .tab:hover label::after {
            color: #333;
        }

        .container .tab input:checked ~ label::after{
            transform: rotate(135deg);
            color: #fff;
        }

        .container .tab:nth-child(2) label h2{
            background: linear-gradient(135deg, #70f570, #49c628);
        }

        .container .tab:nth-child(3) label h2{
            background: linear-gradient(135deg, #3c8ce7, #00eaff);
        }

        .container .tab:nth-child(4) label h2{
            background: linear-gradient(135deg, #ff96f9, #c32bac);
        }

        .container .tab:nth-child(5) label h2{
            background: linear-gradient(135deg, #fd6e6a, #ffc600);
        }

        .container .tab:nth-child(6) label h2{
            background: linear-gradient(135deg, #c6ffdd, #fbd786, #f7797d);
        }

        .container .tab label h2 {
            width: 40px;
            height: 40px;
            background: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 1.25em;
            border-radius: 10px;
            margin-right: 10px;
        }

        .container .tab input:checked ~ label h2 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            color: rgba(255,255,255,0.2);
            font-size: 8em;
            justify-content: flex-end;
            padding: 20px;
        }

        .container .tab input:checked ~ label h5 {
            background: #fff;
            padding: 2px 10px;
            color: #333;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .container .tab label h5 {
            position: relative;
            font-weight: 500;
            color: #333;
            z-index: 10;
        }

        .container .tab .contents {
            max-height: 0;
            transition: 1s;
            overflow: hidden;
        }

        .container .tab input:checked ~ .contents {
            max-height: 100vh;
        }

        .container .tab .contents p {
            position: relative;
            padding: 10px 0;
            color: #333;
            z-index: 10;
        }

        .container .tab input:checked ~ .contents p {
            color: #fff;
        }

        


    </style>
<body>
    <?php include 'Layout/student_sidebar.php' ?>

    <section id="content">
        <?php include 'Layout/student_navbar.php' ?>

        <main>
            <div class="head-title">
				<div class="left">
					<h3 style="color: #009879;">Student FAQ</h3>
				</div>
			</div>

            <div class="table-data">
				<div class="order">
                    <div class="container">
                        <h4 style="text-align: center; color: #333">Frequently Asked Questions For Student</h4>
                        <div class="tab">
                            <input type="radio" name="acc" id="acc1">
                            <label for="acc1">
                                <h2>01</h2>
                                <h5>How can I submit the contribution ?</h5>
                            </label>
                            <div class="contents">
                                <p>Normally, you will only need to contribute with the 
                                    image and file through the online system managed by the person 
                                    in charge of each department of the magazine. Specific information 
                                    on how to submit the lesson will be provided on the magazine website 
                                    or through the school's notifications.</p>
                            </div>
                        </div>
                        <div class="tab">
                            <input type="radio" name="acc" id="acc2">
                            <label for="acc2">
                                <h2>02</h2>
                                <h5>What rules do I need to comply with ?</h5>
                            </label>
                            <div class="contents">
                                <p>This may vary depending on the requirements of the magazine. 
                                    Usually, you will need to comply with the regulations on length, format, 
                                    writing style and other regulations. Make sure to read the instructions 
                                    carefully before sending.</p>
                            </div>
                        </div>
                        <div class="tab">
                            <input type="radio" name="acc" id="acc3">
                            <label for="acc3">
                                <h2>03</h2>
                                <h5>How will my contribution be accepted or rejected ?</h5>
                            </label>
                            <div class="contents">
                                <p>The person in charge of your department will evaluate 
                                    your post based on many factors, including the basis, 
                                    creativity, presentation and writing style. They may require 
                                    editing or will refuse cards if it does not meet the necessary standards.</p>
                            </div>
                        </div>
                        <div class="tab">
                            <input type="radio" name="acc" id="acc4">
                            <label for="acc4">
                                <h2>04</h2>
                                <h5>What is the university magazine and the purpose ?</h5>
                            </label>
                            <div class="contents">
                                <p>University magazine is a foundation for students and the community in the university 
                                    to share ideas, research, and artwork. The purpose of the magazine is to create 
                                    a space for creativity and knowledge exchange.</p>
                            </div>
                        </div>
                        <div class="tab">
                            <input type="radio" name="acc" id="acc5">
                            <label for="acc5">
                                <h2>05</h2>
                                <h5>Do I need any experience to contribute ?</h5>
                            </label>
                            <div class="contents">
                                <p>No, the magazine often welcomes all contributions from students, 
                                    not important in terms of qualifications or experience. It is important 
                                    that the idea and effort in expressing it.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="./views/Layout/script2.js"></script>
</body>
</html>