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
if(isset($_GET['email'])){
    $_SESSION['email'] = mysqli_real_escape_string($con, $_GET['email']);
}
if(isset($_POST['password'])){
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $rePassword = mysqli_real_escape_string($con, $_POST['re-password']);
    if($password == $rePassword){
        $sql = "UPDATE `user` SET `password`=".md5($password)." WHERE `email`=".$_SESSION['email'];
        mysqli_query($con, $sql);
        echo 'Your password has been reset. <br>Please click <a href = "http://127.0.0.1/ImageGallery/index.php">This link </a> to log in.';
        session_unset();
    }
}
mysqli_close($con);
