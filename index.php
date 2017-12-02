
<?php 
    include "./php/includes/header.inc.php";
    include "./php/includes/connect.inc.php";

    $stmt = $connect->prepare("SELECT * FROM items WHERE item_user=?");
    $stmt->bind_param("s", $_SESSION['user_id']);
    $stmt->execute();

    $result = $stmt->get_result();

?>

<?php if(isset($_SESSION['user_id'])){  ?>

<div class="index-container">

    <div id="header" class="header">

        <div id="user-info">
            <div id="img">
                <img src="./uploads/profilepic<?php echo $_SESSION['user_id']; ?>"  alt="userimg">
            </div>
            <div id="user-name">
                    <p id="username"><?php echo $_SESSION['user_name']; ?></p>
            </div>
        </div>

        <div id="wrapper-item">
            <div id="user-options">
                <div id="options-list">
                    <ul id="list">
                        <li><a href="./userpage.php">Profile</a></li>
                        <li><a href="#" >Stats </a></li>
                        <li><a href="./php/includes/logout.inc.php?action=logout">Logout </a></li>
                    </ul>
                </div>
        </div>

        <div id="form-item">
                <form method="POST" id="form-submit" action="./php/includes/addItem.inc.php">
                    <input type="text" name="item-description" id="item-description" placeholder="What do you have to do?">
                    <input type="submit" name="itemm-submit" id="itemm-submit">
                </form>
            </div>
        </div>

    </div>

    <div id="content" class="content">

        <?php 
            if(mysqli_num_rows($result) > 0){
                while($row = $result->fetch_assoc()){
        ?>

        <div class='item'>
            <div class='description'>
                    <p><?php echo $row['item_description'] ?></p>
            </div>
            
            <div class='button'>
                <button onclick="deleteItem(<?php echo $row['item_id']; ?>)"> X </button>
            </div>
        </div>

        <?php            
                }
            }else{
        ?>

        <div id='no-items'>
            <p>There are no tasks to be done</p>
        </div>

        <?php } ?>
    </div>

        <script>

        document.getElementById("form-submit").addEventListener("submit", addItem);
        

        function addItem(e){
        
        e.preventDefault();

        var request = new XMLHttpRequest();
        var description = document.getElementById("item-description").value;

        request.open("POST", "./php/includes/addItem.inc.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("item-description="+description);
        request.onload = function(){
            document.getElementById("content").innerHTML = this.responseText;
        }

        document.getElementById("item-description").value = "";

    }

        function deleteItem(item){

            var request = new XMLHttpRequest();

            request.open("POST", "./php/includes/deleteItem.inc.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send("deleteItem="+item);
            request.onload = function(){
                document.getElementById("content").innerHTML = this.responseText;
                console.log(this.responseText);
            }
            
        }
        </script>

</div>

<?php }else{

    header("Location: ./login.php");

} ?>
<?php
    include "./php/includes/footer.inc.php";
?>