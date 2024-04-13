<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Add Topic</title>
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
        label {
            color: #4B0082;
            font-weight: 600; 
        }

        h3 {
            font-size: 50px;
            letter-spacing: 3px;
        }
        p {
            font-size: 25px;
        }

        .card-body a {
            position: relative;
            padding: 15px 20px;
            margin: 10px;
            background: #27022d;
            color: #fff;
            text-decoration: none;
            letter-spacing: 1px;
            border: 1px solid #000;
            overflow: hidden;
            
        }
        .card-body a:hover {
            background: #a41ee9;
            text-decoration: none;
            color: #ebe9e9;
        }        
</style>
<body>
    <?php include 'Layout/admin_sidebar.php'?>
    <div class="main--content">
        <?php include 'Layout/admin_navbar.php' ?>
        <div class="tabular--wrapper">
            <h2>Add new topic</h2>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Topic Name</label>
                        <input  type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                        <script src="./ckeditor/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace("description");                              
                        </script>
                    </div>
                        
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>

                    <div class="form-group">
                        <label for="closure_date">Colsure Date</label>
                        <input  type="date" class="form-control" id="closure_date" name="closure_date" required>
                    </div>

                    <div class="form-group">
                        <label for="final_date">Final Date</label>
                        <input type="date" class="form-control" id="final_date" name="final_date" required>
                    </div>

                    <div class="form-group">
                        <label for="fa_id">Faculty</label>
                        <select name="fa_id" class="form-control">
                        <?php
                            foreach($faculty as $fac)
                            {
                                echo "  <option value='".$fac['Fa_ID']."'>".$fac['Fa_Name'] ."</option>";
                            }
                        ?>
                    </select>
                    </div>
                        
                    <div class="form-group">
                        <label for="avatar">Image</label>
                        <input type="file" id="avatar" name="avatar" accept="image/*" >
                    </div>

                    <button type="submit" class="btn btn-success">Add Topic</button>
                </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>