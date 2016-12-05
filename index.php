<?php
session_start();
if (isset($_SESSION["user"])) {
    header("location: ./userpanel/home.php");
} else {
    ?>
    <!DOCTYPE html>
    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->
    <html>
        <head>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="css/style.css" type="text/css"/>
        </head>
        <body>
            <div>
                <?php
                require_once './userpanel/header.php';
                checkLogin(FALSE, "");
                require_once './userpanel/index_content.html';
                ?>
            </div>
            <div id="login-Pane">
                <?php
                require_once './userpanel/loginPane.html';
                ?>
            </div>
            <div id="register-Page">
                <?php
                require_once './userpanel/registrationPane.html';
                ?>
            </div>
            <div id="footer">
                <?php
                require_once './userpanel/footer.html';
                ?>
            </div>
        </body>
    </html>
    <?php
}
?>