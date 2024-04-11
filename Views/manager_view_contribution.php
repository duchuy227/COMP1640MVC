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

<body>
    <?php include 'Layout/manager_sidebar.php' ?>

	<section id="content">
		<?php include 'Layout/manager_navbar.php' ?>

		<main>
			<div class="data">
				<div class="content-data">
                    <h4 style="color: #009966; text-transform:uppercase">Contribution</h4>
                        <table class="table table-bordered border-bold">
                            <thead class="thead-dark">
                                <tr style="text-align:center; background-color:#fec163" class="table bordered">
                                    <td scope="col">Name</td>
                                    <td scope="col">Description</td>
                                    <td scope="col">Subbmission Time</td>
                                    <td scope="col"> Image</td>
                                    <td scope="col"> Doc</td>
                                    <td scope="col">Status</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($contribution as $contribution): ?>
                            <tr class="table bordered" style=" background-color: #d7ede2; text-align:center">
                                <td scope="row"><?php echo $contribution['Con_Name'] ?></td>
                                <td scope="row">
                                    <textarea style="border:none; background: transparent" cols="30"><?php echo $contribution['Con_Description'] ?></textarea>
                                </td>
                                <td scope="row"><?php echo $contribution['Con_SubmissionTime'] ?></td>
                                <td scope="row"><?php echo  '<img width="100" style="margin-bottom: 20px"  src="data:image/*;base64,' . base64_encode($contribution['Con_Image']) . '"  />'; ?></td>
                                <td scope="row">
                                    <button class="btn btn-secondary">
                                        <a style="text-decoration: none; color:#fff" href="index.php?action=download_zip&id=<?php echo $contribution['Con_ID'] ?>">Download</a>
                                    </button>
                                </td>
                                <td scope="row"><?php echo $contribution['Con_Status'] ?></td>
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