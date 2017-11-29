<?php

    include 'header.inc.php';
    include 'connect.inc.php';

    if(isset($_POST['submit-signup'])){

        $username = mysqli_real_escape_string($connect,$_POST['username-signup']);
        $email = mysqli_real_escape_string($connect,$_POST['email-signup']);
        $pwd = mysqli_real_escape_string($connect,$_POST['password-signup']);
        $pwd2 = mysqli_real_escape_string($connect,$_POST['passwordc-signup']);
        $errors = [];
        $output = "";

        if(empty($username) || empty($email) || empty($pwd)){
            $errors[] = "Fill up all fields";
            
        }

        if($pwd != $pwd2){
            $errors[] = "Password does not match";
        }

        if(!preg_match("/^[a-zA-Z ]*$/",$username)){
            $errors[] = "You can only use letters on your username";
        }


        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Invalid email";
        }

        if(!empty($errors)){    
           foreach($errors as $error){
                    $output .= "<li>".$error."</li>";
            }

           $output = "<ul>".$output."</ul>";

           $_SESSION['errormsg'] = $output;
           header("Location: ../../signup.php?signup=error");
           exit();

        }else{

            $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

            //prepare stmt
            $stmt = $connect->prepare("INSERT INTO users(user_name, user_email, user_pwd) VALUES(?,?,?)");
            $stmt->bind_param("sss",$username, $email, $hashedpwd);

            if(!$stmt->execute()){
                echo "error";
                exit();
            }else{
                $stmt->close();
                header("Location: ../../login.php?signup=success");
                unset($_SESSION["errormsg"]);
                exit();
            }
            
        }


    }