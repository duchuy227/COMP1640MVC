<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="./views/Layout/style3.css">
	<link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php include 'Layout/coor_sidebar.php' ?>

    <section id="content">
        <?php include 'Layout/coor_navbar.php' ?>

        <main>
            <div class="head-title">
				<div class="left">
					<h3 style="color: #FF6347;">Contribution of <?php echo $coorInfo['Fa_Name'] ?></h3>
				</div>
			</div>
            <div class="table-data">
				<div class="order">
                <h4 style="color: #009879; text-align:center; text-transform:uppercase; margin-bottom: 20px">List of Contribution</h4>
                    <table class="table table-bordered border-bold">
                            <thead class="thead-dark">
                                <tr style="text-align:center; background-color:#fec163" class="table bordered">
                                    <td scope="col">Name</td>
                                    <td scope="col">Description</td>
                                    <td scope="col">Student Name</td>
                                    <td scope="col">Status</td>
                                    
                                    <td col="2">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($contribution as $contribution): ?>
                            <tr class="table bordered" style=" background-color: #d7ede2; text-align:center">
                                    <td scope="row"><?php echo $contribution['Con_Name'] ?></td>
                                    <td scope="row">
                                        <textarea style="border:none; background: transparent" cols="30"><?php echo $contribution['Con_Description'] ?></textarea>
                                    </td>
                                    <td scope="row"><?php echo $contribution['Stu_FullName'] ?></td>
                                    <td scope="row"><?php echo $contribution['Con_Status'] ?></td>
                                    
                                    <td >
                                        <button class="btn btn-success">
                                            <a style="text-decoration: none; color:#fff"  
                                            href="#"><i class="bi bi-pencil-square"></i></a> 
                                        </button>

                                        <button class="btn btn-danger">
                                            <a style="text-decoration: none; color:#fff" 
                                            href="#" onclick="return confirm('Do you want to delete this contribution')"><i class="bi bi-trash"></i></a>
                                        </button>

                                        <button class="btn btn-success">
                                            <a style="text-decoration: none; color:#fff"  
                                            href="#"><i class="bi bi-chat-left"></i></a> 
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
    <script src="./views/Layout/script2.js"></script>
</body>
</html>