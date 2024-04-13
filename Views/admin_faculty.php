<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Faculty</title>
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
            <h2>All Faculties</h2>
            <div style="margin-bottom: 20px" class="row">
                
                <table class="table table-bordered border-bold">
                    <thead class="thead-dark">
                        <tr style="text-align:center; background-color:#7388C1; font-weight:bold" class="table bordered">
                            <td scope="col">ID</td>
                            <td scope="col">Faculty Name</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($faculty as $fa): ?>
                        <tr class="table bordered" style=" background-color: #A095C4; text-align:center">
                            <td scope="row"><?php echo $fa['Fa_ID'] ?></td>
                            <td scope="row"><?php echo $fa['Fa_Name'] ?></td>
                            <td>
                                <button class="btn btn-success">
                                    <a style="text-decoration: none; color:#fff" 
                                    href="index.php?action=admin_edit_faculty&id=<?php echo $fa['Fa_ID']; ?>"><i class="bi bi-pencil-square"></i></a> 
                                </button>

                                <button class="btn btn-danger">
                                    <a style="text-decoration: none; color:#fff"  
                                    href="index.php?action=admin_delete_faculty&id=<?php echo $fa['Fa_ID']; ?>" onclick="return confirm('Do you want to delete this account')"><i class="bi bi-trash"></i></a>
                                </button>
                            </td>                                
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>