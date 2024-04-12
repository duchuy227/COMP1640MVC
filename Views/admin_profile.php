
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
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
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        label {
            color: #4B0082;
            font-weight: 600; 
        }

        h3 {
            font-size: 50px;
            letter-spacing: 3px;
        }
        p {
            font-size: 25px;
        }

        .card-body a {
            position: relative;
            padding: 15px 20px;
            margin: 10px;
            background: #27022d;
            color: #fff;
            text-decoration: none;
            letter-spacing: 1px;
            border: 1px solid #000;
            overflow: hidden;
            
        }
        .card-body a:hover {
            background: #a41ee9;
            text-decoration: none;
            color: #ebe9e9;
        }

        .img-small {
            height: auto;
            cursor: pointer; 
            image-rendering: -webkit-optimize-contrast;
        }

        /* CSS để hiển thị ảnh phóng to */
        .img-fullscreen {
            width: 100%;
            height: 100%;
            object-fit: contain; 
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.9);
            cursor: pointer;
            display: none; /* Ẩn ảnh full màn hình ban đầu */
            image-rendering: -webkit-optimize-contrast;
        }

        
</style>
<body>
    <?php 
        include 'Layout/admin_sidebar.php'
    ?>
    <div class="main--content">
    <?php  $search = true; include 'Layout/admin_navbar.php' ?>
        <div class="tabular--wrapper">
            <h2>Admin Profile</h2>
            <?php foreach ($admin as $admin): ?>
            
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img class="img-small" width="370" src="<?php echo ($admin['Image'] != null) ? 'data:image/*;base64,' . base64_encode($admin['Image']) : 'placeholder_image_url.jpg'; ?>" alt="Profile Picture" class="img-fluid">
                        <img class="img-fullscreen" src="<?php echo ($admin['Image'] != null) ? 'data:image/*;base64,' . base64_encode($admin['Image']) : 'placeholder_image_url.jpg'; ?>" alt="Profile Picture" class="img-fluid">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h3 style="color: #4B0082; text-align:center" class="card-title"><i class="fa-solid fa-face-flushed"></i> INFORMATION <i class="fa-solid fa-face-flushed"></i></h3>
                            <hr style="background-color: #4B0082; height:5px">
                            <br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p style="color: #4B0082;">Username: </p>
                                </div>
                                <p style="color: #990099;"><?php echo $admin['Ad_Username'] ; ?></p>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p style="color: #4B0082;">Email: </p>
                                </div>
                                <p style="color: #990099;"><?php echo $admin['Ad_Email'] ; ?></p>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p style="color: #4B0082;">Date of Birth: </p>
                                </div>
                                <p style="color: #990099;"><?php echo $admin['Ad_DOB'] ; ?></p>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p style="color: #4B0082;">Role: </p>
                                </div>
                                <p style="color: #990099;">Admin</p>
                            </div>
                            <br>
                            <a href="index.php?action=update_admin&id=<?php echo $admin['Ad_ID']; ?>">Edit Profile</a>
                        </div>
                    </div>
                </div>
            
            
        </div>
        <?php endforeach ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var fullscreenImage = document.querySelector('.img-fullscreen');

        // Lắng nghe sự kiện click trên ảnh nhỏ
        document.querySelector('.img-small').addEventListener('click', function() {
            // Hiển thị ảnh full màn hình khi nhấp vào ảnh nhỏ
            fullscreenImage.style.display = 'block';
            document.body.style.overflow = 'hidden'; // Ngăn cuộn trang web khi ảnh full màn hình được hiển thị
        });

        // Lắng nghe sự kiện click trên ảnh full màn hình
        fullscreenImage.addEventListener('click', function() {
            // Ẩn ảnh full màn hình khi nhấp vào ảnh đó
            fullscreenImage.style.display = 'none';
            document.body.style.overflow = 'auto'; // Cho phép cuộn trang web trở lại khi ảnh full màn hình bị ẩn
        });
        });
</script>
</body>
</html>