<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="./views/Layout/style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Faculty</title>
</head>

    <style>
        table {
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 10px 10px 20px rgba(0,0,0,0.15);
        }

        table thead tr {
            background-color: #53b8a3;
            color: #fff;
            text-align: left;
            font-weight: bold;
        }

        table td {
            padding: 15px 25px;
        }

        table tbody tr {
            border-bottom: 1px solid #ddd;
        }

        table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        table tbody tr td {
            font-size: 1rem;
        }

        .current-student {
            color: #53b8a3;
        }


    </style>
<body>
    <?php include 'Layout/student_sidebar.php' ?>

    <section id="content">
        <?php include 'Layout/student_navbar.php' ?>

        <main>
            <div class="head-title">
				<div class="left">
					<h3 style="color: #009879">Faculty: <?php echo $studentProfile['Fa_Name'] ?></h3>
				</div>
			</div>

            <div class="table-data">
				<div class="order">
                    <h4 style="color: #009879">Coordinator</h4>
                    <table>
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Email</td>
                                <td>Fullname</td>
                                <td>Date of Birth</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                <img width="100" class="img-small" src="<?php echo $data['coordinator']['Image'] != null ? 'data:image/*;base64,' . base64_encode($data['coordinator']['Image']) : 'placeholder_image_url.jpg'; ?>" alt="Profile Picture" >
                                </td>
                                <td><?php echo $data['coordinator']['Coor_Email']; ?></td>
                                <td><?php echo $data['coordinator']['Coor_FullName']; ?></td>
                                <td><?php echo $data['coordinator']['Coor_DOB']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <hr style="background-color:#009879; height:5px">

                    <h4 style="color: #009879">Students</h4>
                    <table>
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Username</td>
                                <td>Email</td>
                                <td>Date of Birth</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['students'] as $student): ?>
                            <tr <?php echo $student['Stu_Username'] == $_SESSION['username'] ? 'class="current-student"' : ''; ?>>
                                
                                    <td><img width="100"  src="<?php echo $student['Image'] != null ? 'data:image/*;base64,' . base64_encode($student['Image']) : 'placeholder_image_url.jpg'; ?>" alt="Profile Picture" ></td>
                                    <td><?php echo $student['Stu_Username'] . ($student['Stu_Username'] == $_SESSION['username'] ? '' : ''); ?></td>
                                    <td><?php echo $student['Stu_Email']; ?></td>
                                    <td><?php echo $student['Stu_DOB']; ?></td>
                                
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Hiển thị danh sách sinh viên -->
                
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