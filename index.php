<!DOCTYPE html>
<html>
<head>
    <title>CRUD ACTIVITY</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container text-center mt-4 mb-4">
        <h1 class="font-weight-bold">Patient Records</h1>
    </div>

    <?php require_once 'process.php'; ?>

    <?php
    if (isset($_SESSION['message'])): 
        ?>
          <div class="alert alert-<?= $_SESSION['msg_type'] ?> alert-dismissible fade show custom-alert" role="alert">
            <?= $_SESSION['message']; unset($_SESSION['message']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

    <div class="container">
    <?php
        #$mysqli = new mysqli('sql210.infinityfree.com', 'if0_38852474', 'crudActBGN', 'if0_38852474_crud') or die(mysqli_error($mysqli));
        $mysqli = new mysqli('b916f86elluegscojytf-mysql.services.clever-cloud.com', 'utcrmjxgjmjdudmm', 'keDuenC1dFF6DD3rNqc7', 'b916f86elluegscojytf') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM tbl_patient") or die($mysqli->error);
        ?>

        <div class="row justify-content-center mt-5">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
        <?php 
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['address']?></td>
                 <td>
                        <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                        <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>     
            <?php endwhile; ?>
            </table>

        </div>

        <?php
        function pre_r($array) {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
    ?>
    
    <div class="row justify-content-center mt-5">
    <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-row align-items-center">
                <div class="form-group col-md-4">
                    <label for="name" class="font-weight-bold">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo $name ?>" placeholder="Enter Name">
                </div>
                <div class="form-group col-md-4">
                    <label for="address" class="font-weight-bold">Address</label>
                    <input type="text" id="address" name="address" class="form-control" value="<?php echo $address ?>" placeholder="Enter Address">
                </div>
            </div>
            <div class="form-group text-center">
                <?php if ($update == true): ?>
                    <button type="submit" class="btn btn-info" name="update">Update</button>
                    <button type="submit" class="btn btn-info" name="cancel">Cancel</button>
                <?php else: ?>
                    <button type="submit" class="btn btn-primary" name="save">Add</button>
                <?php endif; ?>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
