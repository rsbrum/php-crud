<?php
    include_once './php/includes/header.inc.php';

    if(isset($_SESSION['user_id'])){
?>

<title>Todolist | Userpage</title>


        <?php if(isset($_SESSION['errors'])){
            echo $_SESSION['errors'];
            unset($_SESSION['errors']);
        } ?>

<div class="container">
    
    <div id="userpage-content-wrapper" class="content-wrapper">

        <div class="header">

            <div class="wrapper-nav-bar">
                <ul class="nav-bar">
                    <li><a href="./userpage.php"><button>Profile</button></a></li>
                    <li><a href="./php/includes/logout.inc.php?action=logout"><button>Logout</button></a></li>
                </ul>
            </div>

            <div class="wrapper-content-header">
                <h1>Profile Information</h1>
            </div>

        </div>

        <div class="main">
            <div class="std-form">
                <form id="signup-form" enctype="multipart/form-data" method="POST" action="./php/includes/updateProfile.inc.php">

                    <div class="table-row">
                        <div class="table-item1">
                           <p> Username: </p>
                        </div>

                        <div class="table-item2">
                            <input onclick="enableInput('userpg-username')" id ="userpg-username" name="userpg-username" type="text" value="<?php echo $_SESSION['user_name']; ?>" readonly="readonly">
                        </div>
                    </div>

                    <div class="table-row">
                        <div class="table-item1">
                            <p>Email:</p>
                        </div>

                        <div class="table-item2">
                            <input onclick="enableInput('userpg-useremail')" id="userpg-useremail"name="userpg-useremail" type="text" value="<?php echo $_SESSION['user_email']; ?>" readonly="readonly">
                        </div>
                    </div>

                    <div class="table-row">
                        <div class="table-item1">
                            <p>ID: </p>
                        </div>

                        <div class="table-item2">
                            <input name="userpg-userid" type="text" value="<?php echo $_SESSION['user_id']; ?>" disabled>
                        </div>
                    </div>

                    <div class="table-row">
                        <div class="table-item1">
                        </div>

                        <div class="table-item2">
                            <input class="btn-submit" type="submit" value="Go back" name="userpg-goback">
                            <input class="btn-submit" type="submit" value="Save changes" name="userpg-submit">
                        </div>
                    </div>
                    
                    
                        <!-- header( index. php if isset(usetpage-goback)) -->

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
