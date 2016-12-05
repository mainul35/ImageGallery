<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../db/connection.php';
include_once './userDAO.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $userDao = new UserDAO();
    if(($userDao->checkUser($con, $email, md5($password)))==TRUE){
        echo 'Successfully logged in.';
        header("location: ../userpanel/home.php");
    }else{
        echo 'Sorry, Invalid email or password.';
    }
    mysqli_close($con);
}