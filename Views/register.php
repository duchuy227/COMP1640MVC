<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./views/Layout/register.css">
</head>
<body>
    <div class="container">
        <div class="image">
            <form method="POST">
                <h2>Register Form</h2>
                <div class="form-group" style="margin-bottom: 20px;">
                    <div class="col-md-12">
                        <input style="color: white;" name="username"type="text" class="form-control" id="inputEmail4" 
                        required placeholder="Username" value="<?php echo isset($_POST['username']) ? $_POST['username'] :''; ?>" >
                        <?php 
                            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($err['username'])) : ?>
                                <p style="color: red; margin-left: 20px"><?php echo $err['username'] ?><p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="form-group" style="margin-bottom: 20px;">
                    <div class="col-md-12">
                        <input type="Password" name="password" class="form-control" id="inputEmail4" placeholder="Password">
                        <?php 
                            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($err['password'])) : ?>
                                <p style="color: red; margin-left: 20px"><?php echo $err['password'] ?></ơ>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <div class="col-md-12">
                        <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" 
                        required value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
                        <?php 
                            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($err['email'])) : ?>
                                <p style="color: red; margin-left: 20px"><?php echo $err['email'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="form-group" style="margin-bottom: 20px;">
                    <div class="col-md-12">
                        <input type="text" name="fullname" class="form-control" id="inputEmail4" placeholder="Fullname" 
                        required value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : '' ?>">
                        <?php 
                            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($err['fullname'])) : ?>
                                <p style="color: red; margin-left: 20px"><?php echo $err['fullname'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="form-group" style="margin-bottom: 20px;">
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="dob" id="inputEmail4" placeholder="Date of Birth" required>
                    </div>
                </div>
                
                <div class="form-group" style="margin-bottom: 0px;">
                    <div class="col-md-12">
                        
                        <select name="fa_id" style="background-color: #05091c; border:none; outline:none;
                        border-radius:40px; color:white; font-size: 17px" id="inputState" class="form-control" required>
                            <option hidden require>Choose Faculty</option>
                            <?php
                            foreach($faculty as $fac)
                            {
                                echo "  <option value='".$fac['Fa_ID']."'>".$fac['Fa_Name'] ."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
    
</body>
</html>
