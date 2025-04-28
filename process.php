<?php

session_start();

#$mysqli = new mysqli('sql210.infinityfree.com', 'if0_38852474', 'crudActBGN', 'if0_38852474_crud') or die(mysqli_error($mysqli)); 
$mysqli = new mysqli('localhost', 'root', '', 'db_pms') or die(mysqli_error($mysqli));

$name = '';
$address = '';
$update = false;
$id = 0;

if (isset($_POST['save']))
{
    $name = $_POST['name'];
    $address = $_POST['address'];

    $mysqli->query("INSERT INTO tbl_patient(name, address) VALUES('$name', '$address')") or die($mysqli->error);

    $_SESSION['message'] = "A New Record Has Been Added!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}

if (isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM tbl_patient WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "A Record Has Been Deleted!";
    $_SESSION["msg_type"] = "danger";

    header("location: index.php");
}

if (isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM tbl_patient WHERE id=$id") or die($mysqli->error);
    if ($result->num_rows == 1)
    {
        $row = $result->fetch_array();
        $name = $row['name'];
        $address = $row['address'];
    }
}

if (isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];

    $mysqli->query("UPDATE tbl_patient set name = '$name', address = '$address' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "The Record Has Been Successfully Updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
}

if (isset($_POST['cancel']))
{
    header('location: index.php');
}
