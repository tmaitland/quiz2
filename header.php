<?php

$error = isset($_GET['error']) ? $_GET['error'] : "";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Pages</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="a.php">Page A</a></li>
                    <li><a href="b.php">Page B</a></li>
                </ul>
                <div class="login-form">
                    <?php 
                        if(isset($_SESSION["u_id"])) {
                            echo '<form action="includes/inc.logout.php" method="post">
                            <button type="submit" name="submit">Logout</button>
                        </form>';
                        } else {
                            echo '<form action="includes/inc.login.php" method="post">
                            <input type="text" name="userid" placeholder="username">
                            <input type="password" name="userpwd" placeholder="password">
                            <button type="submit" name="submit">Login</button> 
                        </form>
                        <a href="signup.php" class="sign-up">Sign Up</a>';
                        }
                    ?>
                    
                    
                </div>
            </div>
        </nav>
        <!-- show error if any -->
	<?php if ($error) { ?>
		<div class="error"><?= $error ?></div>
	<?php } ?>
    </header>