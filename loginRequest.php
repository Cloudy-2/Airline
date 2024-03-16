<?php
session_start();
include('./config/database.php');
$errors = array();

if (isset($_POST['logindata'])) {
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($Email)) {
        $errors[] = "Email is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM logindata WHERE Email=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $Email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['Email'] = $Email;
                $_SESSION['success'] = "You are now logged in";
                header('location: mainmenu.php');
                exit();
            } else {
                $errors[] = "Wrong username/password combination";
            }
        } else {
            $errors[] = "User not found";
        }
    }
}
?>