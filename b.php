<?php include "header.php"; 
// force users to be logged
if(empty($_SESSION)) {
	header("Location: index.php?error=You must be logged in to access that page");
	exit;
}

// get the user from the session
$user = $_SESSION['u_id'];
?>
    <section class="page home">
        <div class="page-wrapper">
            <h2 class="main-title">PAGE B</h2>
            <p></p>
        </div>

    </section>
    <?php include "footer.php"; ?>    
