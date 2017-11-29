<?php 

    include './php/includes/header.inc.php';

?>

<div class="login-signup-container">
    <div class="box">
        <?php if(isset($_SESSION['errormsg'])){ ?>
       
        <div class="forms">
            <form method="POST" action="./php/includes/signup.inc.php">
                <?php echo $_SESSION['errormsg']; ?>
                <input placeholder="Username" type="text" name="username-signup" id="username-signup">
                <input placeholder="Email" type="text" name="email-signup" id="email-signup">
                <input placeholder="Password" type="text" name="password-signup" id="password-signup">
                <input placeholder="Confirm Password" type="text" name="passwordc-signup" id="passwordc-signup">
                <input type="submit" value="Signup" name="submit-signup">
            </form>

            <p>Already signed up? <a href="login.php">Login!</a> or <a href="#"> use locally</a> </p>
        </div>

        <?php } else{ ?>

        <div class="forms">
            <form method="POST" action="./php/includes/signup.inc.php">
                <input placeholder="Username" type="text" name="username-signup" id="username-signup">
                <input placeholder="Email" type="text" name="email-signup" id="email-signup">
                <input placeholder="Password" type="text" name="password-signup" id="password-signup">
                <input placeholder="Confirm Password" type="text" name="passwordc-signup" id="passwordc-signup">
                <input type="submit" value="Signup" name="submit-signup">
            </form>

            <p>Already signed up? <a href="login.php">Login!</a> or <a href="#"> use locally</a> </p>
        </div>
        <?php } ?>
    </div>
</div>
<?php 

    include './php/includes/footer.inc.php';

?>