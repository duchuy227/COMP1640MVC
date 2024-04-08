
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='./views/Layout/userlogin.css'>
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' >
    <title>Login Page</title>
</head>
<style>
    
</style>
<body>
    <div class="wrapper">
        <form method="POST">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" id="txtusername" name="username" >
                <i class='bx bxs-user'></i>
                <?php if(isset($_SESSION['error_message']) && !empty($_SESSION['error_message'])): ?>
                    <p style="margin-left:20px" class="error"><?php echo $_SESSION['error_message']; ?></p>
                    <?php unset($_SESSION['error_message']); ?>
                <?php endif; ?>
            </div>

            <div class="input-box">
                <input type="password" id="txtpassword" placeholder="Password" name="password" >
                <i class='bx bxs-lock-alt'></i>
                
            </div>
            
            <div style="margin-bottom: -15px;" class="input-box">
                <select style="background: transparent; border: none; outline:none; color: white; font-size: 16px" name="role_id">
                    
                    <option value=1>Admin</option>
                    <option selected value=2 >Student</option>
                    <option value=3>Manager</option>       
                    <option value=4>Coordinator</option>             
                </select>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot password?</a>
            </div>
            <br>
            <button type="submit" name="submit" value="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Student doesn't have account?
                    <a href="index.php?action=register">Register</a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>
