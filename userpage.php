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


        <div id="userpg-uinfo">

            <form action="./php/includes/changeProfilePic.inc.php">
                    <div id="userpg-pic" class="userpg-wrapper">
                        <div class="userpg-label">
                        <img src="usertest.png" alt="">
                        </div>

                        <div class="userpg-input">
                            <input value="Change picture" type="submit" name="userpg-submit-pic">
                        </div>
                    </div>    
            </form>  

            <form method="POST" action="./php/includes/updateProfile.inc.php">
                    <div class="userpg-wrapper">
                        <div  class="userpg-label">
                            <p>Username:</p>
                        </div>

                        <div class="userpg-input">
                            <input name="userpg-username" type="text" value="<?php echo $_SESSION['user_name']; ?>" disabled>
                        </div>
                    </div>

                    <div class="userpg-wrapper">
                        <div class="userpg-label">
                            <p>Email:</p>
                        </div>

                        <div class="userpg-input">
                            <input name="userpg-useremail" type="text" value="<?php echo $_SESSION['user_email']; ?>" disabled>
                        </div>
                    </div>

                    <div class="userpg-wrapper">
                        <div class="userpg-label">
                            <p>ID:</p>
                        </div>

                        <div class="userpg-input">
                            <input name="userpg-userid" type="text" value="<?php echo $_SESSION['user_id']; ?>" disabled>
                        </div>
                    </div>

                    <div class="userpg-wrapper">
                        <div class="userpg-label">
                            
                        </div>

                        <div class="userpg-input">
                            <!-- header( index. php if isset(usetpage-goback)) -->
                             <input type="submit" value="Go back" name="userpage-goback">
                            <input type="submit" value="Save changes" name="userpage-submit">
                
                        </div>
                    </div>
            </form>
                
            </div>
        </div>
    </div>

</div>


<?php
    }else{
        header("Location: ./login.php");
    }

    include_once './php/includes/footer.inc.php';
?>