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
    <title>Topic</title>
</head>
    <style>
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
    </style>
<body>
    <?php include 'Layout/manager_sidebar.php' ?>

	<section id="content">
		<?php include 'Layout/manager_navbar.php' ?>

		<main>
			<div class="data">
				<div class="content-data">
                    <h4 style="color: #511F90; text-transform:uppercase; text-align:center; font-weight:bolder; font-size: 30px">All Topics</h4>
                    <br>
                    <table class="table table-bordered border-bold">
                            <thead class="thead-dark">
                                <tr style="text-align:center; background-color:#7388C1; font-weight:bold" class="table bordered">
                                    <td scope="col">Name</td>
                                    <td scope="col">Start Date</td>
                                    <td scope="col">Closure Date</td>
                                    <td scope="col">Final Date</td>
                                    <td scope="col">Faculty</td>
                                    <td scope="col"></td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($topic as $topic): ?>
                            <tr class="table bordered" style=" background-color: #A095C4; text-align:center">
                                <td scope="row"><?php echo $topic['Topic_Name'] ?></td>
                                <td scope="row"><?php echo $topic['Topic_StartDate'] ?></td>
                                <td scope="row"><?php echo $topic['Topic_ClosureDate'] ?></td>
                                <td scope="row"><?php echo $topic['Topic_FinalDate'] ?></td>
                                <td scope="row"><?php echo $topic['Fa_Name'] ?></td>
                                <td>
                                    <button class="btn btn-secondary">
                                        <a style="text-decoration: none; color:#fff"
                                        href="index.php?action=manager_topic_detail&id=<?php echo $topic['Topic_ID'] ?>"><i class="bi bi-files"></i></a>
                                    </button>
                                </td>                                
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                    </table>
                    <div class="pagination"></div>
                </div>
            </div>
        </main>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="./views/Layout/script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var perPage = 5; // Số lượng hàng trên mỗi trang
            var topics = document.querySelectorAll(".table tbody tr"); // Danh sách các hàng dữ liệu
            var totalPages = Math.ceil(topics.length / perPage); // Tính tổng số trang

            // Hiển thị trang đầu tiên khi trang được tải
            showPage(1);

            // Tạo nút phân trang
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

            // Hiển thị các hàng tương ứng với trang được chỉ định
            function showPage(page) {
                var start = (page - 1) * perPage;
                var end = start + perPage;

                // Ẩn tất cả các hàng
                topics.forEach(function(topic) {
                    topic.style.display = "none";
                });

                // Hiển thị các hàng cho trang hiện tại
                for (var i = start; i < end && i < topics.length; i++) {
                    topics[i].style.display = "table-row";
                }
            }
        });
    </script>

</body>
</html>