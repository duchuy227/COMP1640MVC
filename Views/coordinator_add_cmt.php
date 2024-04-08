<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="./views/Layout/style3.css">
	<link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Comment</title>
</head>
<body>
    <?php include 'Layout/coor_sidebar.php' ?>

    <section id="content">
        <?php include 'Layout/coor_navbar.php' ?>

        <main>
            <div class="head-title">
                <div class="left">
                    <h3 style="color: #FF6347;">Comment</h3>
                </div>
            </div>
            <div class="table-data">
                <div class="order">
                    <h4 style="color: #009879; text-align:center; text-transform:uppercase; margin-bottom: 20px">Comment Contribution</h4>
                    <form method="post">
                        <div class="form-group">
                            <label for="Con_Name">Name</label>
                            <input type="hidden" name="Con_ID" id="Con_Name" value="<?php echo $contribution['Con_ID']; ?>" >
                            <input readonly type="text" class="form-control" name="Con_Name" id="Con_Name" value="<?php echo $contribution['Con_Name']; ?>" >
                        </div>

                        <div class="form-group">
                            <label for="Con_SubmissionTime">Submission Time</label>
                            <input type="text" class="form-control" name="Con_SubmissionTime" id="Con_SubmissionTime" value="<?php echo $contribution['Con_SubmissionTime']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="Con_Status">Status</label>
                            <input type="text" class="form-control" name="Con_Status" id="Con_Status" value="<?php echo $contribution['Con_Status']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="Com_ID">Comment</label>
                            <textarea class="form-control" type="text" name="Com_Detail" id="Com_ID"  required></textarea>
                        </div>

                        <input class="btn btn-success" type="submit" value="Lưu">
                    </form>
                </div>
            </div>
        </main>
    </section>
</body>
</html>