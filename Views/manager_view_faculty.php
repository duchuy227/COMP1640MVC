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
    <title>Faculty</title>
</head>
    <!-- <style>
        h1 {
            background-color: linear-gradient( to right,#fd986a ,#ffc9c9);
        }
    </style> -->
<body>
    <?php include 'Layout/manager_sidebar.php' ?>

	<section id="content">
		<?php include 'Layout/manager_navbar.php' ?>

		<main>
			<div class="data">
				<div class="content-data">
                    <h2 style="color: #009966; text-align:center; text-transform:uppercase;">Faculty: <?php echo $facultyName; ?></h2>
                    <br>
                    <h4 style="color: #009966; text-transform:uppercase">Coordinator</h4>
                    <table class="table table-bordered border-bold">
                        <thead class="thread-dark">
                            <tr class="table-bordered" style="background-color:#FF9999">
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">DOB</th>
                                <th scope="col">Image</th>
                                <th scope="col" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($coordinator as $admin): ?>
                                <tr class="table-bordered" style="background-color: #66CCCC;">
                                    <td scope="row"><?php echo $admin['Coor_Username']; ?></td>
                                    <td scope="row"><?php echo $admin['Coor_Email']; ?></td>
                                    <td scope="row"><?php echo $admin['Coor_FullName']; ?></td>
                                    <td scope="row"><?php echo $admin['Coor_DOB']; ?></td>
                                    <td scope="row">
                                    <?php  
                                    if($admin['Image'] != null)
                                        echo '<img width="100"  src="data:image/*;base64,' . base64_encode($admin['Image']) . '" />';
                                    ?>   
                                    </td>
                                    <td>
                                        <button class="btn btn-primary">
                                            <a style="text-decoration: none; color:#fff" 
                                            href="index.php?action=manager_update_coordinator&id=<?php echo $admin['Coor_ID']; ?>"><i class="bi bi-pencil-square"></i></a> 
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br>
                    <h4 style="color: #009966; text-transform:uppercase">List of Student</h4>
                    <table class="table table-bordered border-bold">
                        <thead class="thread-dark">
                            <tr class="table-bordered" style="background-color:#66CCCC">
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">FullName</th>
                                <th scope="col">Date Of Birth</th>
                                <th scope="col">Image</th>
                                <th col="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student): ?>
                            <tr class="table-bordered" style=" background-color: #FF9999">
                                <td scope="row"><?php echo $student['Stu_Username']; ?></td>
                                <td scope="row"><?php echo $student['Stu_Email']; ?></td>
                                <td scope="row"><?php echo $student['Stu_FullName']; ?></td>
                                <td scope="row"><?php echo $student['Stu_DOB']; ?></td>
                                <td scope="row">
                                    <?php  
                                        echo '<img width="100"  src="data:image/*;base64,' . base64_encode($student['Image']) . '" />';
                                    ?>
                                </td>
                                <td>
                                    <button class="btn btn-primary">
                                        <a style="text-decoration: none; color:#fff"  
                                        href="index.php?action=manager_edit_student&id=<?php echo $student['Stu_ID']; ?>"><i class="bi bi-pencil-square"></i></a> 
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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