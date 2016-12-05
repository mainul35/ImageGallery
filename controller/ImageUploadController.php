<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once './GalleryDAO.php';
include_once '../model/user.php';
include_once '../db/connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isLoggedIn = $_SESSION['loggedIn'];
    if ($isLoggedIn) {
        mysqli_select_db($con, "imagegallery");
        print_r($_FILES);
        $user = $_SESSION['user'];
        $userId = $user->getId();
        $name = $user->getFName();
        $imageDao = new ImageDao($con);
        $fileName = $_FILES["imageToUpload"]["name"];
        $tempName = $_FILES["imageToUpload"]["tmp_name"];
        $size = $_FILES["imageToUpload"]["size"];
        $dummyTitle = mysqli_real_escape_string($con, $_POST['imageName']);
        if ($imageDao->uploadFile($fileName, $dummyTitle, $tempName, $size, $userId)) {
            echo 'Image uploaded successfully.';
            header("location: ../index.php");
        }else{
            echo 'Uploading image failed. Please try again.';
        }
    }
    mysqli_close($con);
}