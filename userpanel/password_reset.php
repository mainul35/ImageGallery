<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css" type="text/css"/>
</head>
<div class="registerPane">
    <div class="register-form">
        <div>
            <h1>Please enter your mail address: </h1>
        </div>
        <form method="post" action="./password_reset.php">
            <table class="form-field">
                <tbody>
                    <tr>
                        <td><label for="email">Password</label></td>
                        <td><input id="email" class="glowing-border" type="password" name="password"/></td>
                    </tr>
                    <tr>
                        <td><label for="email">Enter password again</label></td>
                        <td><input id="email" class="glowing-border" type="password" name="re-password"/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Submit" /></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>

<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../db/connection.php';
mysqli_select_db($con, "imagegallery");
session_start();

if (isset($_GET['email'])) {
    $_SESSION['email'] = mysqli_real_escape_string($con, $_GET['email']);
}
if (isset($_POST['password'])) {
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $rePassword = mysqli_real_escape_string($con, $_POST['re-password']);
    if ($password == $rePassword) {
        $psw =  md5($password);
        echo $_SESSION['email'];
        $sql = "UPDATE `user` SET `password`='" . $psw . "' WHERE `email`='" . $_SESSION['email'] . "'";
        $result = mysqli_query($con, $sql);
        session_unset();
        if (mysqli_affected_rows($con)) {
            echo 'Your password has been reset. <br>Please click <a href = "http://127.0.0.1/ImageGallery/index.php">This link </a> to log in.';
            session_unset();
        }
    }
}
mysqli_close($con);
