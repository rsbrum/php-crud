<?php

    include "./header.inc.php";

    if($_GET['action'] == "logout"){
        unset($_SESSOIN);
        session_destroy();
        header("Location: ../../login.php");
    }