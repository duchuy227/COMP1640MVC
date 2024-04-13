<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Statistics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .select {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
            outline: none;
            box-shadow: none;
            border: 0!important;
            background-image: none;
            position: relative;
            display: flex;
            width: 15em;
            height: 2.5em;
            line-height: 2.5;
            background: #5c6664;
            overflow: hidden;
            border-radius: .25em;
            margin-left: 20px;
        }
        select ::-ms-expand {
            display: none;
        }

        select {
            flex: 1;
            padding: 0 .5em;
            background-color: #5c6664;
            color: #fff;
            cursor: pointer;
            font-size: 1.2em;
        }

        .select::after {
            content: '\25BC';
            position: absolute;
            top: 0;
            right: 0;
            padding: 0 1em;
            background: #2b2e2e;
            cursor: pointer;
            pointer-events: none;
            transition: .25s all ease;
            color: #fff;
        }
        .select:hover::after{
            color: #23b499;
        }

        *{
            margin: 0;
            padding: 0;
        }
        .sear {   
            display: flex;
        }
        .sear .box {
            height: 30px;
            display: flex;
            cursor: pointer;
            padding: 20px 10px;
            background: #778899;
            border-radius: 30px;
            align-items: center;
        }

        .sear .box:hover input {
            width: 200px;
        }

        .sear .box input {
            width: 0;
            outline: none;
            border: none;
            font-weight: 500;
            transition: 0.8s;
            background: transparent;
            color: #fff;
        }

        .sear .box input::placeholder {
            color: #fff;
        }

        .sear .box a i {
            color: #1daf;
            font-size: 1.5rem;
        }

        .faculty-contri {
            width: 800px;
            height: 600px;
            position: relative;
            overflow: hidden;
           
        }
        .falcuty-student {
            width: 400px;
            height: 600px;
            position: relative;
            overflow: hidden;
            margin-left: 350px;
            
        }
        .topic-contribution {
            width: 600px;
            height: 700px;
            position: relative;
            overflow: hidden;
            
        }
        .date-contribution{
            width: 1000px;
            height: 300px;
            position: relative;
            overflow: hidden;
            
        }

        h3 {
            text-align: center;
            color: #4B0082;
        }
</style>
<body>
    <?php 
        include 'Layout/admin_sidebar.php'
    ?>
    <div class="main--content">
        <?php include 'Layout/admin_navbar.php' ?>
        <div class="tabular--wrapper">
            <h2>Statistics</h2>
            <br>
            <hr style="background-color: #4B0082; height:5px">
            <h3>Faculty Contribution</h3>
            <br>
            <div class="faculty-contri">
                <canvas id="facultyChart"></canvas>
            </div>
            <hr style="background-color: #4B0082; height:5px">
            <!-- Student Count by Faculty Chart -->
            <h3>Student Count By Faculty</h3>
            <br>
            <div class="falcuty-student">
                <canvas id="studentChart"></canvas>
            </div>
            <hr style="background-color: #4B0082; height:5px">
            <!-- Topic Contribution Chart -->
            <h3>Topic Contribution</h3>
            <br>
            <div class="topic-contribution">
                <canvas id="topicChart"></canvas>
            </div>
            <hr style="background-color: #4B0082; height:5px">
            <h3>Contribution Count By Date</h3>
            <br>
            <div class="date-contribution">
                <canvas id="contributionChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <script>
        // Data for Faculty Contribution Chart
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

        // Data for Contribution Count by Date Chart
        var contributionData = <?php echo json_encode($ddata); ?>;
        var dates = [];
        var contributionCounts = [];

        for (var i = 0; i < contributionData.length; i++) {
            dates.push(contributionData[i].submission_date);
            contributionCounts.push(parseInt(contributionData[i].num_contributions)); // Convert to integer
        }

        var contributionCtx = document.getElementById('contributionChart').getContext('2d');
        var contributionChart = new Chart(contributionCtx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Contribution Count',
                    data: contributionCounts,
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        type: 'time',
                        time: {
                            unit: 'day'
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value, index, values) {
                                if (Math.floor(value) === value) {
                                    return value;
                                }
                            }
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>