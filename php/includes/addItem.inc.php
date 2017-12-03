<?php 

    session_start();
    include 'connect.inc.php';

   
    if(isset($_POST['item-description'])){


        $output= "";

        if(isset($_SESSION['user_id'])){
        $item_description = $_POST['item-description'];
        $item_user = $_SESSION['user_id'];

        //prepare and bind
        $stmt = $connect->prepare("INSERT INTO items(item_description, item_user) VALUES(?,?)");
        $stmt->bind_param("ss", $item_description, $item_user);
        
        //execute and gets update
        if($stmt->execute()){
            $stmt2 = $connect->prepare("SELECT * FROM items WHERE item_user=? ORDER BY item_id DESC");
            $stmt2->bind_param("s", $item_user);
            
            if($stmt2->execute()){
                $result = $stmt2->get_result();

                while($row = $result->fetch_assoc()){
                    $output .= "
                    <div id='".$row['item_id']."' class='wrapper-item'>
                    <div class='item-description'>
                            <p>".$row['item_description']."</p>
                    </div>
    
                    <div class='item-btn'>
                        <button onclick='deleteItem(".$row['item_id'].")'>X</button>
                    </div>
                </div>
                    ";
                }
            }else{
                echo "Error";
            }
            
            $stmt2->close();
        };
            
            $stmt->close();
            echo $output;
        }
    }else{
        echo "form not submited";
    }

