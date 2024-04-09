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
    <title>Contribution Detail</title>
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

        input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
            height: 20px;
            width: 20px;
            background-color: #d5d5d5;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            outline: none;
        }

        input[type="checkbox"]::after {
            content: "\f00c";
            font-weight: 900;
            font-family: 'Font Awesome 5 Free';
            color: white;
            display: none;
            font-size: 20px;
        }

        input[type="checkbox"]:hover {
            background-color: #a5a5a5;

        }

        input[type="checkbox"]:checked {
            background-color: #5bcd3e;
        }

        input[type="checkbox"]:checked::after {
            display: block;
            
        }
    </style>
<body>
    <?php include 'Layout/student_sidebar.php' ?>

    <section id="content">
        <?php include 'Layout/student_navbar.php' ?>
        <main>
            <div class="head-title">
				<div class="left">
					<h3 style="color: #009879;">Contribution</h3>
				</div>
			</div>

            <div class="table-data">
				<div class="order">
                    <h4 style="text-align: center; color: #333">Contribution Detail</h4>
                    <form action="" method="post"  >
                    <input type="hidden" class="form-control" id="" name="Con_ID" value="<?php echo $studentContri['Con_ID'] ?>"required>
                        <div class="form-group">
                            <label for="Con_Name">Name</label>
                            <input disabled  type="text" class="form-control" id="" name="Con_Name" value='<?php echo $studentContri['Con_Name'] ?>'required>
                        </div>
                        <div class="form-group">
                            <label for="Con_Description">Description</label>
                            <textarea readonly class="form-control" id="" name="Con_Description" required><?php echo $studentContri['Con_Description']; ?></textarea> 
                        </div>
                        
                        <div class="form-group">
                            <label for="Con_Status">Status</label>
                            <input disabled type="text" class="form-control" id="" name="Con_Status" value='<?php echo $studentContri['Con_Status'] ?>'>
                        </div>
                        <div class="form-group">
                            <label for="">Document</label>
                            <button class="btn btn-secondary">
                                <a style="text-decoration: none; color:#fff" href="index.php?action=viewdoc&id=<?php echo $id ?>">View Document</a>
                            </button>
                        </div>
                        <div class="form-group">
                            <label for="Con_Image">Image</label>
                            <?php  
                                if($studentContri['Con_Image'] != null)
                                echo '<img width="100"  src="data:image/*;base64,' . base64_encode($studentContri['Con_Image']) . '" />';
                            ?> 
                        </div>

                        <div class="form-group">
                            <label for="">Topic</label>
                            <input disabled type="text" class="form-control" name="Topic_ID" value='<?php echo $studentContri['Topic_ID'] ?>'>
                        </div>

                        <div class="form-group">
                            <label for="">Comment</label>
                            <input disabled type="text" class="form-control" name="Com_Detail" value='<?php echo $studentContri['Com_Detail'] ?>'>
                        </div>

                        <button style="margin-top: 20px" class="btn btn-success"><a style="color:#fff; text-decoration:none"
                        href="index.php?action=student_contribution">My List Contribution</a></button>
                    </form>
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