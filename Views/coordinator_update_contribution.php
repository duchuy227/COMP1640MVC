<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Image/img.png" type="image/x-icon">
    <link rel="stylesheet" href="./views/Layout/style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Update Status</title>
</head>
<body>
    <?php include 'Layout/coor_sidebar.php' ?>

    <section id="content">
        <?php include 'Layout/coor_navbar.php' ?>
        <main>
            <div class="head-title">
				<div class="left">
					<h3 style="color: #009879;">Contribution</h3>
				</div>
			</div>

            <div class="table-data">
				<div class="order">
                    <h4 style="text-align: center; color: #333">Change Status of Contribution</h4>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="hidden" class="form-control" id="" name="Con_ID" value="<?php echo $contribution['Con_ID'] ?>"required>
                            <input disabled type="text" class="form-control" id="" name="Con_Name" value="<?php echo $contribution['Con_Name'] ?>"required>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea disabled class="form-control" id="" name="Con_Description" required><?php echo $contribution['Con_Description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" name="status" id="status">
                                <option value="Pending" <?php if ($contribution['Con_Status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                                <option value="Approval" <?php if ($contribution['Con_Status'] == 'Approval') echo 'selected'; ?>>Approval</option>
                                <option value="Rejected" <?php if ($contribution['Con_Status'] == 'Rejected') echo 'selected'; ?>>Rejected</option>
                            </select>
                        </div>

                        <button style="margin-top: 20px" type="submit" class="btn btn-success">Change Status</button>
                    </form>
                </div>
            </div>
        </main>
    </section>
</body>
</html>