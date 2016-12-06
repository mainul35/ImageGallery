<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../db/connection.php';

class ImageDao {

    private $con;

    public function __construct($con) {

        $this->con = $con;
        mysqli_select_db($this->con, "imagegallery");
//        print_r($this->con);
    }

    function fetchImages($index, $userId) {

        if ($userId == "*") {
            $sql = "SELECT * FROM `image`, `user` WHERE `image`.`userId` = `user`.`id` ORDER BY imageUploafdTime DESC LIMIT 20 OFFSET " . ($index * 10) . ";";
        } else {
            $sql = "SELECT * FROM `image`, `user` WHERE `image`.`userId` = `user`.`id` AND `userId` = '" . $userId . "' ORDER BY imageUploafdTime DESC LIMIT 20 OFFSET " . $index . ";";
        }
        $result = mysqli_query($this->con, $sql);
        $arrays;
        $i = 0;
        while ($arr = mysqli_fetch_assoc($result)) {
            $arrays[$i] = $arr;
            $i++;
        }
        return $arrays;
    }

    private function insertImage($imgName, $imgURL, $userId) {
//        include_once '../db/connection.php';
//        mysqli_select_db($con, "imagegallery");
        $sql = "INSERT INTO `image`("
                . "`imageName`, `imageVotes`, `imageURL`, `userId`"
                . ") VALUES ("
                . "'" . $imgName . "','0','" . $imgURL . "','" . $userId . "'"
                . ");";
        $result = mysqli_query($this->con, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function uploadFile($fileName, $dummyTitle, $tempName, $fileSize, $userId) {
        $target_dir = "../resources/images/" . $userId . "/";
        $this->mkdir_r($target_dir);
        $ext = explode(".", $fileName)[1];
        $newfilename = round(microtime(true)) . '.' . $ext;
        $target_file = $target_dir . $newfilename;
        $uploadOk = FALSE;

// Check if image file is a actual image or fake image
//        if (isset($HTTP_METHOD["submit"])) {
        $check = getimagesize($tempName);
        if ($check !== false) {
            $uploadOk = TRUE;
        } else {
            echo "Error uploading image.";
            $uploadOk = FALSE;
        }
//        }
// Check file size
        if ($fileSize > 500000) {
            echo "Sorry, your file is too large. (Max size: 5MB)";
            $uploadOk = FALSE;
        }
// Allow certain file formats
        if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = FALSE;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == FALSE) {
            echo "Sorry, Something is going wrong. Please try again.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($tempName, $target_file)) {
                $this->insertImage($dummyTitle, $target_file, $userId);
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    private function mkdir_r($dirName, $rights = 0777) {
        $parts = explode('/', $dirName);
        $dir = "";
        for ($i = 0; $i < count($parts); $i++) {
            echo $parts[$i] . "<br>";
            $dir .= $parts[$i] . '/';
            if (!is_dir($dir) && strlen($dir) > 0) {
                mkdir($dir, $rights);
            }
        }
    }

    function countTotalPages() {
        $sql = "SELECT * FROM `image`";
        $result = mysqli_query($this->con, $sql);
        return (mysqli_num_rows($result) / 10);
    }

    function upvote($imageId){
        $sql = "UPDATE `image` SET `imageVotes`= (`imageVotes`+1) WHERE imageId = '".$imageId."';";
        $result = mysqli_query($this->con, $sql);
    }
}
