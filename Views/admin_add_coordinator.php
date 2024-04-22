
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Coordinator Account</title>
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<style>
        .main--content {
        position: relative;
        background: #ebe9e9;
        width: 100%;
        padding: 1rem;
        }
        .main--content .tabular--wrapper {
            background: #fff;
            margin-top: 1rem;
            border-radius: 10px;
            padding: 10px 2rem;
        }

        h2 {
            color: rgba(113, 99, 186, 255);
            padding-bottom: 10px;
            font-size: 25px;
            
        }
        label {
            color: #4B0082;
            font-weight: 600; 
        }
</style>
<body>
    <?php 
        include 'Layout/admin_sidebar.php'
    ?>
    <div class="main--content">
        <?php include 'Layout/admin_navbar.php' ?>
        <div class="tabular--wrapper">
            <h2>Add coordinator Account</h2>
            <form  method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>">
                    <?php 
                    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($err['username'])) : ?>
                        <div class="text-danger"><?php echo $err['username'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" required>

                    <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-eye" id="togglePassword"></i>
                            </span>
                        </div>

                    <?php 
                    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($err['password'])) : ?>
                        <div class="text-danger"><?php echo $err['password'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
                    <?php 
                    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($err['email'])) : ?>
                        <div class="text-danger"><?php echo $err['email'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="email">Fullname</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" required value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : '' ?>">
                    <?php 
                    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($err['fullname'])) : ?>
                        <div class="text-danger"><?php echo $err['fullname'] ?></div>
                <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" required value="<?php echo isset($_POST['dob']) ? $_POST['dob'] : '' ?>">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="role_id" value="4" name="role_id" required>
                </div>
                <div class="form-group">
                <label for="fa_id">Choose faculty</label>

                    <select name="fa_id" class="form-control">
                        <?php
                        foreach($faculty as $fac)
                        {
                            echo "  <option value='".$fac['Fa_ID']."'>".$fac['Fa_Name'] ."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar:</label>
                    <input type="file" id="avatar" name="avatar" accept="image/*" required value="<?php echo isset($_POST['avatar']) ? $_POST['avatar'] : '' ?>">
                    <?php 
                    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($err['imageData'])) : ?>
                        <div class="text-danger"><?php echo $err['imageData'] ?></div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-success">Add Account</button>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($err['faculty_has_coordinator'])) : ?>
                    <div class="text-danger"><?php echo $err['faculty_has_coordinator']; ?></div>
                <?php endif; ?>
                <?php 

                ?>
            </form>
        </div>
    </div>
        

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordInput = document.getElementById('password');
            var icon = document.getElementById('togglePassword');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>
