
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Manager</title>
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
            text-align: center;
            text-transform: uppercase;
        }
        *{
            margin: 0;
            padding: 0;
        }
        .sear {   
            display: flex;
        }
        .sear .box {
            height: 30px;
            display: flex;
            cursor: pointer;
            padding: 20px 10px;
            background: #778899;
            border-radius: 30px;
            align-items: center;
        }

        .sear .box:hover input {
            width: 200px;
        }

        .sear .box input {
            width: 0;
            outline: none;
            border: none;
            font-weight: 500;
            transition: 0.8s;
            background: transparent;
            color: #fff;
        }

        .sear .box input::placeholder {
            color: #fff;
        }

        .sear .box a i {
            color: #1daf;
            font-size: 1.5rem;
        }
    </style>
<body>
    <?php 
        include 'Layout/admin_sidebar.php'
    ?>
    <div class="main--content">
        <?php include 'Layout/admin_navbar.php' ?>
        <div class="tabular--wrapper">
            <h2>List of Manager</h2>

            <div style="margin-bottom: 20px" class="row">
                <div class="col-md-4">
                    <button style="margin-bottom: 10px" class="btn btn-primary">
                        <a style="text-decoration: none; color:#fff" 
                        href="index.php?action=insert_manager"><i class="bi bi-plus-square"></i> Add Manager</a>
                    </button>
                </div>

                <div class="col-md-5"></div>

                <div class="col-md-3">
                    <form method="post">
                        <div class="sear">
                            <div class="box">
                                <input name="username" type="text" placeholder="Search...">
                                <a href="">
                                    <i type = "submit" class="bi bi-search-heart"></i>
                                </a>
                                </div>
                        </div>
                    </form>
                </div>
            </div>

            
            
            


            <table class="table table-bordered border-bold">
                <thead class="thread-dark">
                    <tr class="table-primary table-bordered border-info-bold">
                        
                        <th>Username</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Image</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admin as $admin): ?>
                        <tr class="table-secondary">
                            <!-- <td><?php echo $admin['Ma_ID']; ?></td> -->
                            <td><?php echo $admin['Ma_Username']; ?></td>
                            <td><?php echo $admin['Ma_Email']; ?></td>
                            <td><?php echo $admin['Ma_DOB']; ?></td>
                            <td>
                            <?php  
                                echo '<img width="100"  src="data:image/*;base64,' . base64_encode($admin['Image']) . '" />';

                            ?>  

                            </td>
                            <td>
                                <button class="btn btn-success">
                                    <a style="text-decoration: none; color:#fff" 
                                    href="index.php?action=update_manager&id=<?php echo $admin['Ma_ID']; ?>"><i class="bi bi-pencil-square"></i></a>
                                </button>

                                <button type="button" class="btn btn-danger">
                                <a style="text-decoration: none; color:#fff"
                                href="index.php?action=delete_manager&id=<?php echo $admin['Ma_ID']; ?>" onclick="return confirm('Do you want to delete this account')"><i class="bi bi-trash"></i></a>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- <a href="index.php?action=add_manager">Add new manager</a>
            <a href="index.php?action=add_student">Add new student</a>
            <a href="index.php?action=add_coordinator">Add new coordinator</a> -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>