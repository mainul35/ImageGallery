<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../db/connection.php';

$sql = "CREATE DATABASE IF NOT EXISTS `ImageGallery`;";

if (mysqli_query($con, $sql)) {
    echo "Database created successfully.";
} else {
    echo "Sorry, database creation failed " . mysqli_error($con);
}

$sql = "CREATE TABLE IF NOT EXISTS `imagegallery`.`user` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `fName` VARCHAR(50) NOT NULL , `lName` VARCHAR(50) NOT NULL , `email` VARCHAR(50) NOT NULL , `password` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

if (mysqli_query($con, $sql)) {
    echo "User table created successfully.";
} else {
    echo "Sorry, table creation failed " . mysqli_error($con);
}

$sql = "CREATE TABLE IF NOT EXISTS `imagegallery`.`image` (`imageId` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `imageName` VARCHAR(50) NOT NULL , `imageUploafdTime` TIMESTAMP NOT NULL , `imageVotes` INT(10) NOT NULL , `imageURL` VARCHAR(250) NOT NULL , `userId` INT(10) NOT NULL) ENGINE = InnoDB;";

if (mysqli_query($con, $sql)) {
    echo "Image table created successfully.";
} else {
    echo "Sorry, table creation failed " . mysqli_error($con);
}

$sql = "CREATE TABLE IF NOT EXISTS `imagegallery`.`userConfirmation` ( `email` VARCHAR(50) NOT NULL , `confirmationStatus` INT(2) NOT NULL , `confirmationCode` INT(10) NOT NULL , `requestTime` TIMESTAMP NOT NULL ) ENGINE = InnoDB;";

if (mysqli_query($con, $sql)) {
    echo "userConfirmation table created successfully.";
} else {
    echo "Sorry, table creation failed " . mysqli_error($con);
}

$sql = "CREATE TABLE `imagegallery`.`imageUp` ( `imageId` INT NOT NULL , `userId` INT NOT NULL ) ENGINE = InnoDB;";

if (mysqli_query($con, $sql)) {
    echo "Image table updated successfully.";
} else {
    echo "Sorry, table updating failed " . mysqli_error($con);
}