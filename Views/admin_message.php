<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Message</title>
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

        .pagination {
        margin-top: 20px;
        }
        .pagination button {
            margin-right: 5px;
            cursor: pointer;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            padding: 5px 10px;
            border-radius: 3px;
        }
        .pagination button:hover {
            background-color: #e0e0e0;
        }

        .pagination1 {
        margin-top: 20px;
        }
        .pagination1 button {
            margin-right: 5px;
            cursor: pointer;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            padding: 5px 10px;
            border-radius: 3px;
        }
        .pagination1 button:hover {
            background-color: #e0e0e0;
        }
        
</style>
<body>
    <?php include 'Layout/admin_sidebar.php'?>
    <div class="main--content">
        <?php include 'Layout/admin_navbar.php' ?>
        <div class="tabular--wrapper">
            <h2>All Mail</h2>
            <div style="margin-bottom: 20px" class="row">
                
                <table class="table table-bordered border-bold">
                    <thead class="thead-dark">
                        <tr style="text-align:center; background-color:#7388C1; font-weight:bold" class="table bordered">
                            <td scope="col">Student</td>
                            <td scope="col">Coordinator</td>
                            <td scope="col">Mail Content</td>
                        </tr>
                    </thead>
                    <tbody class="he">
                        <?php foreach ($mess as $mess): ?>
                        <tr class="table bordered" style=" background-color: #A095C4; text-align:center">
                            <td scope="row"><?php echo $mess['Stu_FullName'] ?></td>
                            <td scope="row"><?php echo $mess['Coor_FullName'] ?></td>
                            <td scope="row">
                                <textarea readonly style="background: transparent;" name="" id="" cols="30"><?php echo $mess['Content'] ?></textarea>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="pagination"></div>
            </div>
        </div>

        <div class="tabular--wrapper">
            <h2>All Comments</h2>
            <div style="margin-bottom: 20px" class="row">
                
                <table class="table table-bordered border-bold">
                    <thead class="thead-dark">
                        <tr style="text-align:center; background-color:#7388C1; font-weight:bold" class="table bordered">
                            <td scope="col">Student</td>
                            <td scope="col">Coordinator</td>
                            <td scope="col">Comment Detail</td>
                        </tr>
                    </thead>
                    <tbody class="hello">
                        <?php foreach ($comment as $comment): ?>
                        <tr class="table bordered" style=" background-color: #A095C4; text-align:center">
                            <td scope="row"><?php echo $comment['Con_Name'] ?></td>
                            <td scope="row"><?php echo $comment['Coor_FullName'] ?></td>
                            <td scope="row">
                                <textarea readonly style="background: transparent;" name="" id="" cols="30"><?php echo $comment['Com_Detail'] ?></textarea>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="pagination1"></div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var perPage = 4;
            var topics = document.querySelectorAll(".table .he tr"); 
            var totalPages = Math.ceil(topics.length / perPage); 
            showPage(1);

            var pagination = document.querySelector(".pagination");
            for (var i = 1; i <= totalPages; i++) {
                var button = document.createElement("button");
                button.textContent = i;
                button.addEventListener("click", function() {
                    var page = parseInt(this.textContent);
                    showPage(page);
                });
                pagination.appendChild(button);
            }

            function showPage(page) {
                var start = (page - 1) * perPage;
                var end = start + perPage;

                topics.forEach(function(topic) {
                    topic.style.display = "none";
                });

                for (var i = start; i < end && i < topics.length; i++) {
                    topics[i].style.display = "table-row";
                }
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var perPage = 4; 
            var topics = document.querySelectorAll(".table .hello tr"); 
            var totalPages = Math.ceil(topics.length / perPage); 
            showPage(1);

            var pagination = document.querySelector(".pagination1");
            for (var i = 1; i <= totalPages; i++) {
                var button = document.createElement("button");
                button.textContent = i;
                button.addEventListener("click", function() {
                    var page = parseInt(this.textContent);
                    showPage(page);
                });
                pagination.appendChild(button);
            }

            function showPage(page) {
                var start = (page - 1) * perPage;
                var end = start + perPage;

                topics.forEach(function(topic) {
                    topic.style.display = "none";
                });

                for (var i = start; i < end && i < topics.length; i++) {
                    topics[i].style.display = "table-row";
                }
            }
        });
    </script>
</body>
</html>