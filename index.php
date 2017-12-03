
<?php 
    include "./php/includes/header.inc.php";
    include "./php/includes/connect.inc.php";

    $stmt = $connect->prepare("SELECT * FROM items WHERE item_user=? ORDER BY item_id DESC");
    $stmt->bind_param("s", $_SESSION['user_id']);
    $stmt->execute();

    $result = $stmt->get_result();

?>
    <title>Todolist</title>

<?php if(isset($_SESSION['user_id'])){  ?>


<div class="container">

    <div class="content-wrapper">   

        <div class="header">

            <div class="wrapper-nav-bar">

                <ul class="nav-bar">
                    <li><a href="./userpage.php"><button>Profile</button></a></li>
                    <li><a href="./php/includes/logout.inc.php?action=logout"><button>Logout</button></a></li>
                </ul>
            </div>

            <div class="wrapper-content-header">
                <form id="form-item"  method="POST" action="">
                    <input name="item-description" id="item-description" type="text">
                    <input class="btn-submit" type="submit" name="item-submit" value="SUBMIT">
                </form>
            </div>

        </div>

        <div id="index-main" class="main">

            <?php
            
            //checks if there is any item from user
                if(mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()){
            ?>

            <div id="<?php echo $row['item_id']; ?>" class="wrapper-item">
                <div class="item-description">
                        <p><?php echo $row['item_description']; ?></p>
                </div>

                <div class="item-btn">
                    <button onclick='deleteItem(<?php echo $row['item_id']; ?>)'>X</button>
                </div>
            </div>

        <?php            
                }
            }else{
        ?>
            <div id="no-item">
                <p>uhh...ah</p>
            </div>
        <?php } ?>

            
        </div>

    </div>

</div>






        
        <script>

        document.getElementById("form-item").addEventListener("submit", addItem);
        

        function addItem(e){
        
        e.preventDefault();

        var request = new XMLHttpRequest();
        var description = document.getElementById("item-description").value;

        request.open("POST", "./php/includes/addItem.inc.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("item-description="+description);
        request.onload = function(){
            document.getElementById("index-main").innerHTML = this.responseText;
        }

        document.getElementById("item-description").value = "";

    }

        function deleteItem(item){

            var request = new XMLHttpRequest();

            request.open("POST", "./php/includes/deleteItem.inc.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send("deleteItem="+item);
            request.onload = function(){
                document.getElementById("index-main").innerHTML = this.responseText;
            }
            
        }
        </script>



<?php }else{

    header("Location: ./login.php");

} ?>
<?php
    include "./php/includes/footer.inc.php";
?>