<?php 

    include './php/includes/header.inc.php';

?>
<title>Login</title>
    <?php if(isset($_SESSION["user_id"])){
        header("Location: index.php");
        exit();
    }
    ?>
<div class="container">

    <div id="login-content-wrapper" class="content-wrapper">

        <div class="header">

            <div class="wrapper-nav-bar">
            </div>

            <div class="wrapper-content-header">
                <h1>Login</h1>
            </div>

        </div>

        <div class="main">
            <div class="std-form">
                <form id="login-form" method="POST" action="./php/includes/login.inc.php">
                    
    <?php if(isset($_SESSION['errormsg'])){ ?>
        <?php echo $_SESSION['errormsg'];
              unset($_SESSION['errormsg']); ?>
    <?php } ?>
                        <input placeholder="Username" type="text" name="username-login">        
                        <input placeholder="Password" type="password" name="password-login">
                        <input class="btn-submit" type="submit" value="Login" name="login-submit">
                        <p><a href="signup.php">Sign up</a> or <a href="#"> use locally</a> </p> 
                </form>
                

            </div>
        </div>

    </div>

</div>



<?php

    include './php/includes/footer.inc.php';

?>