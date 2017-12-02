<?php 

    session_start();
    include "connect.inc.php";

    if(isset($_POST['deleteItem'])){

        if(isset($_SESSION['user_id'])){

            $item_id = $_POST['deleteItem'];
            $item_user = $_SESSION['user_id'];
            $output = "";

            $stmt = $connect->prepare("DELETE FROM items WHERE item_id=?");
            $stmt->bind_param("s", $item_id);
            $stmt->execute();
            $stmt->close();


            $stmt = $connect->prepare("SELECT * FROM items WHERE item_user=?");
            $stmt->bind_param("s", $item_user);
            $stmt->execute();

            $result = $stmt->get_result();

            if(mysqli_num_rows($result) > 0){
               
                                while($row = $result->fetch_assoc()){
                                    $output .= "
                                    <div class='item'>
                                    <div class='description'>
                                        <p>".$row['item_description']."</p>
                                    </div>
                                    <div class='button'>
                                        <button onclick='deleteItem(".$row['item_id'].")'> X </button>
                                    </div>
                                    </div>
                                    ";
                                }
            }else{
                $output = "
                <div id='no-items'>
                    <p>There are no tasks to be done</p>
                </div>
                    ";
                

            }
            
            echo $output;


        }
    }