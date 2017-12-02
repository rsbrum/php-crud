<?php
/*
    @TODO 

    -check if username/email is already being used
    

*/
    include_once 'header.inc.php';

    if(isset($_POST['userpg-submit'])){

        $userID = $_SESSION['user_id'];
        $errors= [];
        $output = "";

        if(isset($_FILES['userpg-pic'])){

            $filename = $_FILES['userpg-pic']['name'];
            $fileTemp = $_FILES['userpg-pic']['tmp_name'];
            $fileSize = $_FILES['userpg-pic']['size'];
            $fileError = $_FILES['userpg-pic']['error'];
            $fileType = $_FILES['userpg-pic']['type'];

            
            $fileExt = explode('.', $filename);
            $fileExt = strtolower(end($fileExt));
            
         
            $allowedExt = ['jpg', 'jpeg', 'png'];
            
            if(in_array($fileExt, $allowedExt)){
                if($fileError === 0){
                    if($fileSize < 500000){
                        
                        $fileNewName =  "profilepic".$_SESSION['user_id'].".".$fileExt;
                        echo $fileNewName;
                        echo $fileTemp;
                        $fileDestination = '../../uploads/'.$fileNewName;
                        
                        if(move_uploaded_file($fileTemp, $fileDestination)){
                            
                            //sets profile pic to true
                            $val = 1;
                            $stmt = $connect->prepare("INSERT INTO users(user_profilepic) VALUES(?)");
                            $stmt->bind_param("i", $val);
                            $stmt->execute();
                            $stmt->close();

                        }else{
                            $errors[] = "failed to upload image";
                        }
                    }else{
                        $errors[] = "Image is too big";
                    }
                }else{
                    $errors[] = "There was an error uploading";
                }
            }else if( $fileError != 4){
                $errors[] = "This file extension is not allowed";
            }
        }

        if(isset($_POST['userpg-username'])){

            $newUsernm = $_POST['userpg-username'];
            $userID = $_SESSION['user_id'];

            if(strlen($newUsernm) < 35 && preg_match("/^[a-zA-Z0-9_.-]*$/", $newUsernm)){

            $stmt = $connect->prepare("UPDATE users SET user_name = ? WHERE user_id = ?");
            $stmt->bind_param("ss", $newUsernm, $userID);
            $stmt->execute();
            $stmt->close();
            
            $_SESSION['user_name'] = $newUsernm;
            }else{
                $errors[] = "New username is too long or contains forbidden chars";
            }
        }

        if(isset($_POST['userpg-useremail'])){

            $newUseremail = $_POST['userpg-useremail'];

            if(filter_var($newUseremail, FILTER_VALIDATE_EMAIL)){
                
                $stmt = $connect->prepare("UPDATE users SET user_email = ? WHERE user_id = ?");
                $stmt->bind_param("ss", $newUseremail, $userID);
                $stmt->execute();
                $stmt->close();

                $_SESSION['user_email'] = $newUseremail;
                
                
            }else{
                $errors[] = "New email is invalid";
            }
        }

        if(!empty($errors)){

            foreach($errors as $error){
                $output .= "<li>".$error."</li>";
            }

            $output = "<ul>".$output."</ul>";
            $_SESSION['errors'] = $output;

            echo $output;
        }else{
            header("Location: ../../userpage.php");
        }
    }else{
        header("Location: ../../index.php");
    }