<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Magazine Detail</title>
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
            letter-spacing: 2px;
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
            <h2>Magazine Detail</h2>
            <form action="" method="post"  >
                        <input type="hidden" class="form-control" id="" name="Maga_ID" value="<?php echo $maga['Maga_ID'] ?>"required>
                        <div class="form-group">
                            <label for="Con_Name">Author</label>
                            <input disabled  type="text" class="form-control" id="" name="Con_Name" value='<?php echo $maga['Stu_FullName'] ?>'required>
                        </div>
                        <div class="form-group">
                            <label for="Con_Name">Title</label>
                            <input disabled  type="text" class="form-control" id="" name="Con_Name" value='<?php echo $maga['Con_Name'] ?>'required>
                        </div>
                        <div class="form-group">
                            <label for="Con_Description">Description</label>
                            <textarea readonly class="form-control" id="" name="Con_Description" required><?php echo $maga['Con_Description']; ?></textarea> 
                        </div>
                        
                        <div class="form-group">
                            <label for="Con_Status">Create Time</label>
                            <input disabled type="text" class="form-control" id="" name="Con_Status" value='<?php echo $maga['Maga_CreateTime'] ?>'>
                        </div>

                        <div class="form-group">
                            <label for="Con_Status">Status</label>
                            <input disabled type="text" class="form-control" id="" name="Con_Status" value='<?php echo $maga['Maga_Status'] ?>'>
                        </div>

                        <div class="form-group">
                            <label for="">Document</label>
                            <button class="btn btn-secondary">
                                <a style="text-decoration: none; color:#fff" href="index.php?action=viewdocc&id=<?php echo $id ?>">View Document</a>
                            </button>
                        </div>
                        <div class="form-group">
                            <label for="Con_Image">Image</label>
                            <?php  
                                if($maga['Con_Image'] != null)
                                echo '<img width="100"  src="data:image/*;base64,' . base64_encode($maga['Con_Image']) . '" />';
                            ?> 
                        </div>

                        <div class="form-group">
                            <label for="">Topic</label>
                            <input disabled type="text" class="form-control" name="Topic_ID" value='<?php echo $maga['Topic_Name'] ?>'>
                        </div>

                        <div class="form-group">
                            <label for="">Faculty</label>
                            <input disabled type="text" class="form-control" name="Com_Detail" value='<?php echo $maga['Fa_Name'] ?>'>
                        </div>

                        <button style="margin-top: 20px" class="btn btn-success"><a style="color:#fff; text-decoration:none"
                        href="index.php?action=admin_magazine"> List Magzine</a></button>
                    </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>