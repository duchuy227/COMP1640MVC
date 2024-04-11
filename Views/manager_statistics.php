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
    <title>Statistics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
    <style>
        .faculty-contri {
            width: 400px;
            height: 500px;
            position: relative;
            overflow: hidden;
        }
        .falcuty-student {
            width: 400px;
            height: 600px;
            position: relative;
            overflow: hidden;
        }
        .topic-contribution {
            width: 400px;
            height: 500px;
            position: relative;
            overflow: hidden;
        }
    </style>
<body>
    <?php include 'Layout/manager_sidebar.php' ?>

	<section id="content">
		<?php include 'Layout/manager_navbar.php' ?>

		<main>
			<div class="data">
				<div class="content-data">
                    <div class="faculty-contri">
                        <h4 style="color: #009966; text-transform:uppercase; text-align:center">Faculty Contribution Chart</h4>
                        <canvas id="facultyChart"></canvas>
                    </div>
                </div>
                <br>
                <div class="content-data">
                    <div class="falcuty-student">
                        <h4 style="color: #009966; text-transform:uppercase; text-align:center">Student Faculty Chart</h4>
                        <canvas id="studentChart"></canvas>
                    </div>
                </div>

                <div class="content-data">
                    <div class="topic-contribution">
                        <h4 style="color: #009966; text-transform:uppercase; text-align:center">Topic Contribution Chart</h4>
                        <canvas id="topicChart"></canvas>
                    </div>
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
        var facultyData = <?php echo json_encode($fdata); ?>;
        var facultyNames = [];
        var facultyContributionCounts = [];

        for (var i = 0; i < facultyData.length; i++) {
            facultyNames.push(facultyData[i].Fa_Name);
            facultyContributionCounts.push(parseInt(facultyData[i].contribution_count)); // Convert to integer
        }

        var facultyCtx = document.getElementById('facultyChart').getContext('2d');
        var facultyChart = new Chart(facultyCtx, {
            type: 'bar',
            data: {
                labels: facultyNames,
                datasets: [{
                    label: 'Contribution Count',
                    data: facultyContributionCounts,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Data for Student Count by Faculty Chart
        var studentData = <?php echo json_encode($sdata); ?>;
        var studentFacultyNames = [];
        var studentCounts = [];

        for (var i = 0; i < studentData.length; i++) {
            studentFacultyNames.push(studentData[i].Fa_Name);
            studentCounts.push(parseInt(studentData[i].student_count)); // Convert to integer
        }

        var studentCtx = document.getElementById('studentChart').getContext('2d');
        var studentChart = new Chart(studentCtx, {
            type: 'pie',
            data: {
                labels: studentFacultyNames,
                datasets: [{
                    label: 'Student Count',
                    data: studentCounts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                        // Add more colors if needed
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                        // Add more colors if needed
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Data for Topic Contribution Chart
        var topicData = <?php echo json_encode($tdata); ?>;
        var topicNames = [];
        var topicContributionCounts = [];

        for (var i = 0; i < topicData.length; i++) {
            topicNames.push(topicData[i].Topic_Name);
            topicContributionCounts.push(parseInt(topicData[i].contribution_count)); // Convert to integer
        }

        var topicCtx = document.getElementById('topicChart').getContext('2d');
        var topicChart = new Chart(topicCtx, {
            type: 'bar',
            data: {
                labels: topicNames,
                datasets: [{
                    label: 'Contribution Count',
                    data: topicContributionCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</body>
</html>