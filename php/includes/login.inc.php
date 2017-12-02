<?php   

    include "header.inc.php";
    include "connect.inc.php";

    if(isset($_POST['login-submit'])){

        $username = $_POST['username-login'];
        $password = $_POST['password-login'];
        $pwdverify = false;
        $errors = [];
        $output = "";

        //checks if username or pwd fieds are not empty
        if(empty($username)){
            $errors[] = "Username or password does not match!";
        }

        if(empty($password)){
            $errors[] = "Username or password does not match!";
        }

        //checks if username exists
        $stmt = $connect->prepare("SELECT user_name, user_pwd FROM users WHERE user_name=?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    
        if(mysqli_num_rows($result) == 0){

            $errors[] = "Username or password does not match!";

        }
        else if(mysqli_num_rows($result) >= 1){

            while($row = $result->fetch_assoc()){

                if(!password_verify($password, $row['user_pwd'])){

                    $errors[] = "Username or password does not match!";
                    
                }else{
                    $pwdverify = true;
                }
            }
        }


        if(empty($errors)){

            if($pwdverify){

                $stmt2 = $connect->prepare("SELECT user_name, user_id, user_email, user_profilepic FROM users WHERE user_name=?");
                $stmt2->bind_param("s", $username);
                $stmt2->execute();
                $result = $stmt2->get_result();

                while($row = $result->fetch_assoc()){
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_email'] = $row['user_email'];
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['user_profilepic'] = $row['user_profilepic'];
                }
                 
                unset($_SESSION['errormsg']);
                header("Location: ../../index.php");
                exit();
            }
        }else{

            foreach($errors as $error){
                $output .= "<li>".$error."</li>";
            }

            $output = "<ul>".$output."</ul>";
            $_SESSION['errormsg'] = $output;

            header("Location: ../../login.php");
            exit();
        }
    }