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

        <?php if(isset($_SESSION['errors'])){
            echo $_SESSION['errors'];
            unset($_SESSION['errors']);
        } ?>
            <form enctype="multipart/form-data" method="POST" action="./php/includes/updateProfile.inc.php">
                    <div id="userpg-pic" class="userpg-wrapper">
                        <div class="userpg-label">
                        <img src="./uploads/profilepic<?php echo $_SESSION['user_id']; ?>" alt="">
                        </div>

                        <div class="userpg-input">
                            <input value="Change picture" type="file" name="userpg-pic">
                        </div>
                    </div>    
            
                    <div class="userpg-wrapper">
                        <div  class="userpg-label">
                            <p>Username:</p>
                        </div>

                        <div class="userpg-input">
                            <input onclick="enableInput('userpg-username')" id ="userpg-username" name="userpg-username" type="text" value="<?php echo $_SESSION['user_name']; ?>" readonly="readonly">
                        </div>
                    </div>

                    <div class="userpg-wrapper">
                        <div class="userpg-label">
                            <p>Email:</p>
                        </div>

                        <div class="userpg-input">
                            <input onclick="enableInput('userpg-useremail')" id="userpg-useremail"name="userpg-useremail" type="text" value="<?php echo $_SESSION['user_email']; ?>" readonly="readonly">
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
                             <input type="submit" value="Go back" name="userpg-goback">
                            <input type="submit" value="Save changes" name="userpg-submit">
                
                        </div>
                    </div>
            </form>
                
            </div>
        </div>
    </div>

</div>

<script>

    function enableInput(input){
        
        document.getElementById(input).removeAttribute('readonly');
    }
</script>

<?php
    }else{
        header("Location: ./login.php");
    }

    include_once './php/includes/footer.inc.php';
?>
