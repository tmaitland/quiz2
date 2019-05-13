<?php include "header.php"; ?>
    <section class="page signup">
        <div class="page-wrapper">
            <h2 class="main-title">SIGN UP</h2>
            <form action="includes/inc.signup.php" method="post" class="signup-form">
                <input type="text" name="firstname" placeholder="firstname" id="">
                <input type="text" name="lastname" placeholder="lastname" id="">
                <input type="text" name="email" placeholder="email" id="">
                <input type="text" name="username" placeholder="username" id="">
                <input type="password" name="password" placeholder="password" id="">
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>

    </section>
    <?php include "footer.php"; ?>    
