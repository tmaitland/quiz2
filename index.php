<?php include "header.php"; ?>
    <section class="page home">
        <div class="page-wrapper">
            <h2 class="main-title">HOME</h2>
            <?php 
                if(isset($SESSION['u_id'])) {
                    echo "<p>Welcome, $usern </p>";
                }
            ?>
        </div>

    </section>
    <?php include "footer.php"; ?>    
