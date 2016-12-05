<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../db/connection.php';
include_once '../controller/userDAO.php';
mysqli_select_db($con, "imagegallery");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fName = mysqli_real_escape_string($con, $_POST['fName']);
    $lName = mysqli_real_escape_string($con, $_POST['lName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $userDao = new UserDAO();
    if($userDao->addUser($con, $fName, $lName, $email, $password)){
        echo 'User created successfully.';
    }else{
        echo 'User registration failed.';
    }
}
mysqli_close($con);