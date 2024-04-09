<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <title>Term and conditional</title>
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
            box-shadow: 10px 10px rgba(0,0,0,0.1);
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

        h2 {
            text-transform: uppercase;
            text-align: center;
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
            padding: 0 20px;
            justify-content: space-between;
        }


        .btn {
            height: 50px;
            width: calc(50% - 6px);
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

        .btn:hover {
            opacity: 0;
        }

    </style>
<body>
    <div class="terms-box">
    <h2>Term And Condition</h2>
        <div class="term-text">
            <p>Dear Student, </p>
            <h3 style="color: #00BFFF; font-weight:bold">1. Acceptance of Terms</h3>
            <p>By submitting any contribution (including but not limited to text, images, audio, or video content) 
                to Student Website, you agree to comply with and be bound by the following terms and conditions. 
                If you do not agree to these terms, please do not submit any contribution.
            </p>
            <h3 style="color: #00BFFF; font-weight:bold">2. Ownership and Copyright</h3>
            <p>You retain ownership and copyright of any contribution you submit to Student Website. 
                However, by submitting your contribution, you grant Student Website a worldwide, non-exclusive, 
                royalty-free license to use, reproduce, modify, adapt, publish, translate, distribute,
                and display your contribution for the purposes of operating and promoting the Student Website.
            </p>
            <h3 style="color: #00BFFF; font-weight:bold"> 3. Privacy</h3>
            <p>We are committed to protecting your privacy. Any personal information you provide when 
                submitting a contribution will be handled in accordance with our Privacy Policy.
            </p>
            <h3 style="color: #00BFFF; font-weight:bold">4. Legal Responsibility</h3>
            <p>You are solely responsible for the content you submit to Student Website. 
                You agree to indemnify and hold harmless Student Website and its affiliates, 
                partners, and employees from any claims, damages, or liabilities arising out 
                of your contributions.
            </p>
            <h3 style="color: #00BFFF; font-weight:bold">5. Rights and Responsibilities of Users</h3>
            <p>
                By submitting a contribution, you acknowledge that you have the legal right to do
                so and that your contribution does not violate any third-party rights. You agree 
                to use Student Website in compliance with these terms and all applicable laws and 
                regulations.
            </p>
            <h4>I Agree to the <span>Terms and Condition </span> and I read the Privacy.</h4>
            <div class="button">
                <button class="btn red-btn"><a style="color: #fff; text-decoration:none" href="index.php?action=student_add_contribution">Accept</a></button>
                <button class="btn gray-btn"><a style="color: #fff; text-decoration:none" href="index.php?action=student_add_contribution">Decline</a></button>
            </div>
        </div>
    </div>
</body>
</html>