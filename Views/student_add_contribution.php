<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/Layout/style3.css">
    <link rel="icon" href="Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Add Contribution</title>
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
					<h3 style="color: #009879;">Add Contribution</h3>
				</div>
			</div>

            <div class="table-data">
				<div class="order">
                    <h2 style="text-align:center; color: #333">Add New Contribution</h2>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="Con_Name">Contribution Name</label>
                            <input type="text" class="form-control" id="Con_Name" name="Con_Name" required>
                        </div>
                        <div class="form-group">
                        
                            <input type="Hidden" class="form-control" id="Con_Status" name="Con_Status" value="Pending" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="Stu_ID"> Description</label>
                            <textarea class="form-control" type="text"  name="Con_Description" cols="30" rows="5" required></textarea>
                            <script src="./ckeditor/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace("Con_Description");                              
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="Con_Doc">Document</label>
                            <input type="file"  id="Con_Doc" name="Con_Doc[]" required accept=".doc,.docx" multiple>
                        </div>
                        <div class="form-group">
                            <label for="Con_Doc">Image</label>
                            <input type="file"  id="Con_Doc" name="Con_Image"  accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="cars">Choose Topic:</label>
                            
                            <select class="form-control" name="Topic_ID" >
                                <?php foreach ($topic as $topics) : ?>
                                <option value="<?php echo $topics['Topic_ID'] ?>"> <?php echo $topics['Topic_Name'] ?> </option>
                                <?php endforeach ; ?>
                            </select>
                        </div>

                        <div style="display: flex; align-items: center;" class="form-group">
                            <input type="checkbox" name="" id="" required>
                            <label class="label" style="color:#333; font-size: 18px; font-weight: 100" for="">
                                <a style="color:#333; text-decoration:none" href="index.php?action=student_conditional">&nbsp;Agree to the terms and conditions</a>
                            </label>
                        </div>
                                
                    
                        <button type="submit" class="btn btn-success">Add Contribution</button>
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