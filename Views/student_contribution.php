<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/Layout/style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <title>Contribution</title>
</head>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }


    </style>
<body>
    <?php include 'Layout/student_sidebar.php' ?>

    <section id="content">
        <?php include 'Layout/student_navbar.php' ?>
        <main>
            <div class="head-title">
				<div class="left">
					<h3 style="color: #009879;"> My Contribution</h3>
				</div>
			</div>

            <div class="table-data">
				<div class="order">
                    <h4 style="text-align: center; color: #333">List of my contribution</h4>
                    <div class="col-md-4">
                        <button style="margin-bottom: 10px" class="btn btn-primary">
                        <a style="text-decoration: none; color:#fff"
                        href="index.php?action=student_add_contribution"><i class="bi bi-plus-square"></i> Add Contribution</a>
                        </button>
                    </div>
                        <table class="table table-hover">
                            <thead >
                                <tr style="text-align:center" class="table-primary">
                                    <td style="margin-left: 20px; border:none">Name</td>
                                    <td scope="col">Description</td>
                                    <td scope="col">Comment</td>
                                    <td scope="col">Status</td>
                                    <td col="2">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php  foreach($studentContri as $student): ?>
                                <tr class="table-bordered" style="text-align:center">
                            
                                    <td style="border:none; margin-left: 20px" scope="row"><?php echo $student['Con_Name'] ?></td>
                                    <td scope="row">
                                        <textarea style="border:none; outline:none; background:transparent" cols="30"><?php echo $student['Con_Description'] ?></textarea>
                                    </td>
                                    <td scope="row"><?php echo $student['Com_Detail'] ?></td>
                                    <td scope="row"><?php echo $student['Con_Status'] ?></td>
                                
                                    <td>
                                        <button class="btn btn-success">
                                            <a style="text-decoration: none; color:#fff"  
                                            href="index.php?action=student_update_contribution&id=<?php echo $student['Con_ID'] ?>"><i class="bi bi-pencil-square"></i></a> 
                                        </button>

                                        <button class="btn btn-danger">
                                            <a style="text-decoration: none; color:#fff" 
                                            href="index.php?action=student_delete_contribution&id=<?php echo $student['Con_ID'] ?>" onclick="return confirm('Do you want to delete this contribution')" onclick="return confirm('Do you want to delete this contribution')"><i class="bi bi-trash"></i></a>
                                        </button>
                                        
                                        <button class="btn btn-primary">
                                            <a style="text-decoration: none; color:#fff"
                                            href="index.php?action=student_contribution_detail&id=<?php echo $student['Con_ID'] ?>"><i class="bi bi-files"></i></a>
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach    ; ?>
                            </tbody>
                        </table>
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