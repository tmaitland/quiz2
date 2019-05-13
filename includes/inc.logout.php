<?php

if(isset($_POST['submit'])) {
    session_start();
    unset($_SESSION['u_id']);
    session_destroy();
    header("Location: index.php?error=You were logged out correctly");
    exit();
}



