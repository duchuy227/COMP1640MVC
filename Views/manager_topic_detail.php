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
    <title>Topic Detail</title>
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
                    <h4 style="color: #511F90; text-transform:uppercase; text-align:center; font-weight:bolder; font-size: 30px">Topic Detail</h4>
                    <br>
                    <form action="" method="post"  >
                        <input type="hidden" class="form-control" id="" name="" value="<?php echo $topics['Topic_ID'] ?>"required>
                        <div class="form-group">
                            <label for="">Topic Name</label>
                            <input disabled  type="text" class="form-control" id="" name="" value='<?php echo $topics['Topic_Name'] ?>'required>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea disabled class="form-control" id="" name="" required><?php echo $topics['Topic_Description']; ?></textarea> 
                        </div>
                        
                        <div class="form-group">
                            <label for="">Start Date</label>
                            <input disabled type="text" class="form-control" id="" name="" value='<?php echo $topics['Topic_StartDate'] ?>'>
                        </div>

                        <div class="form-group">
                            <label for="">Colsure Date</label>
                            <input disabled type="text" class="form-control" id="" name="" value='<?php echo $topics['Topic_ClosureDate'] ?>'>
                        </div>

                        <div class="form-group">
                            <label for="">Final Date</label>
                            <input disabled type="text" class="form-control" id="" name="" value='<?php echo $topics['Topic_FinalDate'] ?>'>
                        </div>

                        <div class="form-group">
                            <label for="">Faculty</label>
                            <input disabled type="text" class="form-control" id="" name="" value='<?php echo $topics['Fa_Name'] ?>'>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Image</label>
                            <br>
                            <?php  
                                if($topics['Topic_Image'] != null)
                                echo '<img width="200"  src="data:image/*;base64,' . base64_encode($topics['Topic_Image']) . '" />';
                            ?> 
                        </div>

                        <button style="margin-top: 20px" class="btn btn-success"><a style="color:#fff; text-decoration:none"
                        href="index.php?action=manager_topic">Back to Topic</a></button>
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