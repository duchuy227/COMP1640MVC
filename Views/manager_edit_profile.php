<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="./views/Layout/style.css">
	<link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Contribution</title>
</head>
    <style>
        label {
            color: #4B0082;
            font-weight: 600;
            font-size: 20px;
        }

        h2 {
            color: #333;
            padding-bottom: 10px;
            font-size: 25px;
        }
    </style>
<body>
    <?php include 'Layout/manager_sidebar.php' ?>

	<section id="content">
		<?php include 'Layout/manager_navbar.php' ?>

		<main>
			<div class="data">
				<div class="content-data">
                    <h4 style="color: #009966; text-transform:uppercase; text-align:center">Edit Profile</h4>
                    <form  method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="hidden" name="id" value="<?php echo $ManagerProfile['Ma_ID']; ?>">
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $ManagerProfile['Ma_Username']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input  type="hidden" class="form-control" id="password" name="password" value="<?php echo $ManagerProfile['Ma_Password']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $ManagerProfile['Ma_Email']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $ManagerProfile['Ma_DOB']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="role_id" name="role_id" value="<?php echo $ManagerProfile['Role_ID']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="role_id">Image</label>
                            <br>
                            <?php  
                                echo '<img width="100" style="margin-bottom: 20px"  src="data:image/*;base64,' . base64_encode($ManagerProfile['Image']) . '"  />';
                            ?>
                            <br>
                            <input type="hidden" name="avatar" id="avatar" value="<?= base64_encode($ManagerProfile['Image'])?>">
                            <input type="file" id="new-avatar" name="new_avatar" accept="Image/*" >
                        </div>
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </form>
                </div>
            </div>
        </main>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="./views/Layout/script.js"></script>


</body>
</html>