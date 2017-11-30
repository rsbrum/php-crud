<?php 

    include './php/includes/header.inc.php';

?>
    <?php if(isset($_SESSION["user_id"])){
        header("Location: index.php");
        exit();
    }
    ?>
    <div class="login-signup-container">

        <div class="box">
            <div class="forms">

    <?php if(isset($_SESSION['errormsg'])){ ?>
        <?php echo $_SESSION['errormsg'];
              unset($_SESSION['errormsg']); ?>
    <?php } ?>

                <form method="POST" action="./php/includes/login.inc.php">
                    <input placeholder="Username" type="text" name="username-login">                   
                    <input placeholder="Password" type="password" name="password-login">
                    <input type="submit" value="Login" name="login-submit">
                </form>

                <p><a href="signup.php">Sign up</a> or <a href="#"> use locally</a> </p>
    
            </div>
        </div>
        
    </div>
<?php 


    include './php/includes/footer.inc.php';

?>