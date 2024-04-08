<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="./views/Layout/style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Student Profile</title>
</head>
    <style>
        .img-small {
            margin-top: 30px;
            height: 400px;
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

        .button {
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

        .button:hover {
            background: #a41ee9;
            text-decoration: none;
            color: #ebe9e9;
        }


    </style>
<body>
    <?php include 'Layout/student_sidebar.php' ?>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<?php include 'Layout/student_navbar.php' ?>

		<main>
            <div class="head-title">
				<div class="left">
					<h1 style="text-align: center;">Profile</h1>
				</div>
			</div>

            <div class="table-data">
				<div class="order">
                    <div class="card mb-3" style="max-width: 1100px; margin-top: 30px; border:none; background: #f9f9f9">
                        <div class="row no-gutters">
                            <div class="col-md-5">
                                <img class="img-small" width="370" src="<?php echo ($currentStudent['Image'] != null) ? 'data:image/*;base64,' . base64_encode($currentStudent['Image']) : 'placeholder_image_url.jpg'; ?>" alt="Profile Picture" class="img-fluid">
                                <img class="img-fullscreen" src="<?php echo ($currentStudent['Image'] != null) ? 'data:image/*;base64,' . base64_encode($currentStudent['Image']) : 'placeholder_image_url.jpg'; ?>" alt="Profile Picture" class="img-fluid">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h3 style="color: #303030; text-align:center;" class="card-title"> INFORMATION</h3>
                                    <hr style="background-color: #303030; height:5px">
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p style="color: #303030; font-size: 20px; font-weight:bold">Username: </p>
                                        </div>
                                        <p style="color: #303030; font-size: 20px;"><?php echo $currentStudent['Stu_Username'] ; ?></p>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p style="color: #303030; font-size: 20px; font-weight:bold">Email: </p>
                                        </div>
                                        <p style="color: #303030; font-size: 20px;"><?php echo $currentStudent['Stu_Email'] ; ?></p>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p style="color: #303030; font-size: 20px; font-weight:bold">Full Name: </p>
                                        </div>
                                        <p style="color: #303030; font-size: 20px;"><?php echo $currentStudent['Stu_FullName'] ; ?></p>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p style="color: #303030; font-size: 20px; font-weight:bold">Date of Birth: </p>
                                        </div>
                                        <p style="color: #303030; font-size: 20px;"><?php echo $currentStudent['Stu_DOB'] ; ?></p>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p style="color: #303030; font-size: 20px; font-weight:bold">Faculty: </p>
                                        </div>
                                        <p style="color: #303030; font-size: 20px;"><?php echo $currentStudent['Fa_Name'] ; ?></p>
                                    </div>
                                    <br>
                                    <a class="button" href="index.php?action=student_edit_profile">Edit Profile</a>
                                </div>
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