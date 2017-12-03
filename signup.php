<?php 

    include './php/includes/header.inc.php';

?>
<title>Signup</title>

<div class="container">

    <div id="signup-content-wrapper" class="content-wrapper">

        <div class="header">

            <div class="wrapper-nav-bar">
            </div>

            <div class="wrapper-content-header">
                <h1>Signup</h1>
            </div>

        </div>

        <div class="main">
            <div class="std-form">      
                <form id="signup-form" method="POST" action="./php/includes/signup.inc.php">
                    <?php if(isset($_SESSION['errormsg'])){ ?>
                    <?php echo $_SESSION['errormsg'];} ?>
                    <input placeholder="Username" type="text" name="username-signup" id="username-signup">
                    <input placeholder="Email" type="text" name="email-signup" id="email-signup">
                    <input placeholder="Password" type="password" name="password-signup" id="password-signup">
                    <input placeholder="Confirm Password" type="password" name="passwordc-signup" id="passwordc-signup">
                    <input class="btn-submit" type="submit" value="Signup" name="submit-signup">
                    <p>Already signed up? <a href="login.php">Login!</a> or <a href="#"> use locally</a> </p>
                </form>
            </div>
        </div>

    </div>

</div>


<?php 

    include './php/includes/footer.inc.php';

?>