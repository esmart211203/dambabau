<?php
include_once('../Models/user_db.php');
$user_db = new User_Db();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    $user_db->deleteUserById($email);
    header("Location: ../Views/Admin/quanlynguoidung.php?msg3=insert");
}

