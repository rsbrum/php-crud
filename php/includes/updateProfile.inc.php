<?php

    if(isset($_POST['userpg-submit'])){
        
        $errors= [];

        if(isset($_FILE['userpg-pic'])){

            $filename = $_file['userpg-pic']['name'];
            $fileTemp = $_file['userpg-pic']['temp_name'];
            $fileSize = $_file['userpg-pic']['size'];
            $fileError = $_file['userpg-pic']['error'];
            $fileType = $_file['userpg-pic']['type'];

            $fileExt = explode('.', $filename);
            $fileExt = strtolower(end($fileExt));

            $allowedExt = ['jpg', 'jpeg', 'png'];
            
            if(in_array($fileExt, $allowedExt)){

                if($fileError === 0){

                }else{
                    $errors[] = "There was an error uploading";
                }

            }else{
                $errors[] = "This file extension is not allowed";
            }

        }

    }