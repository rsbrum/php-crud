<?php
    include_once './php/includes/header.inc.php';

    if(isset($_SESSION['user_id'])){
?>

<div class="index-container">
    <div class="header">
    
        <div id="profile-info">
            <h1>Your information</h1>
        </div>

    </div>

    <div class="content">

        <form action="">
            <img src="usertest.png" alt="">
            <label for="userpg-email">Email:</label> <input name="userpg-email" type="text" value="<?php echo $_SESSION['user_email']; ?>" disabled>
        </form>
        
    </div>

</div>


<?php
    }else{
        header("Location: ./login.php");
    }

    include_once './php/includes/footer.inc.php';
?>