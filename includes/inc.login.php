<?php 

session_start();
    if(isset($_POST['submit'])){
        include 'inc.dbh.php';

        $uid = mysqli_real_escape_string($conn, $_POST['userid']);
        $pwd = mysqli_real_escape_string($conn, $_POST['userpwd']);

        //Check for errors 

        if (empty($uid) || empty($pwd)) {
            header("Location: ../index.php?login=empty");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE userid='$uid' OR user_email='$uid'";
            $result = mysqli_query($conn, $sql);
            $result_check = mysqli_num_rows($result);
            if($result_check < 1) {
                header("Location: ../index.php?login=error");
                exit();
            } else {
                if ($row = msqli_fetch_assoc($result)) {
                    $hashed_pass_check = password_verify($pwd, $row['userpwd']);
                    if ($hashed_pass_check == false) {
                        header("Location: ../index.php?login=error");
                        exit();
                    } elseif ($hashed_pass_check == true) {
                        $_SESSION['u_id'] = $row['user_id'];
                        $_SESSION['u_first'] = $row['user_first'];
                        $_SESSION['u_last'] = $row['user_last'];
                        $_SESSION['u_email'] = $row['user_email'];
                        $_SESSION['u_name'] = $row['user_name'];
                        header("Location: ../index.php?login=success");
                        exit();
                    }
                }
            }
        }
    } else {
        header("Location: ../index.php?login=error");
            exit();
    }
