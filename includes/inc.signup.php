<?php

if (isset($_POST['submit'])) {
    include 'inc.dbh.php';
    $first = mysqli_real_escape_string($conn, $_POST['firstname']);
    $last = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $usern = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    //check for errors 

    if (empty($first) || empty($last) || empty($email) || empty($usern) || empty($pass)) {
        header("Location: ../signup.php?signup=whyempty");
        exit();
    } else {
        //validity of input
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            header("Location: ../signup.php?signup=invalid");
            exit();
        } else {
            // validity of email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php?signup=invalidemail");
                exit();
            } else {
                $sql = "SELECT * FROM users WHERE user_name = '$usern'";
                $result = mysqli_query($conn, $sql);
                $result_check = mysqli_num_rows($result);

                if ($result_check > 0) {
                    header("Location: ../signup.php?signup=usernameinuse");
                    exit();
                } else {
                    //Hasing the password
                    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
                    //insert into the database
                    $sql = "INSERT INTO users (user_first, user_last, user_email, user_name, user_pass) VALUES ('$first', '$last', '$email', '$usern', '$pass', ' $hashed_pass');";
                    mysqli_query($conn, $sql);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../signup.php");
    exit();
}
