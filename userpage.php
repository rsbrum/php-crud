<?php
    include_once './php/includes/header.inc.php';

    if(isset($_SESSION['user_id'])){
?>

<div class="index-container">
    <div class="header">
    
        <div id="user-img">
            <img src="usertest.png" alt="userimg">
        </div>

        <div id="profile-info">
            <h1>/*work in progress */ Your information</h1>
                <ul>
                    <li>Username: <?php echo $_SESSION['user_name']; ?></li>
                    <li>Email: <?php echo $_SESSION['user_email']; ?></li>
                    <li>ID: <?php echo $_SESSION['user_id']; ?></li>
                </ul>
        </div>

    </div>

    <div class="content">
        <h1>User stats</h1>
    </div>
</div>


<?php
    }else{
        header("Location: ./login.php");
    }

    include_once './php/includes/footer.inc.php';
?>