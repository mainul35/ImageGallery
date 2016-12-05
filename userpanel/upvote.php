<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../controller/GalleryDAO.php';
include_once '../db/connection.php';
include_once '../controller/UpvoteController.php';

session_start();
$upvoteController = new UpvoteController($con);
$gallery = new ImageDao($con);
if (isset($_GET['imageId'])) {
    $toRedirect = $_GET['page'];
    $imageId = $_GET['imageId'];
    if ($upvoteController->checkUpvoted($_SESSION['myId'], $imageId)==false) {
        $toRedirect = $_GET['page'];
        $gallery->upvote($imageId);
        $aa = $upvoteController->upvote($_SESSION['myId'], $imageId);
        mysqli_close($con);
    }
    header("location: $toRedirect");
}