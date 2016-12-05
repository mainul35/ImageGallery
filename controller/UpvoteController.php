<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UpvoteController{
    private $con;
    public function __construct($con) {
        $this->con = $con;
        mysqli_select_db($con, "imagegallery");
    }
    
    function checkUpvoted($userId, $imageId){
        $sql = "SELECT * FROM `imageupvotedby` WHERE `imageId` = '".$imageId."' and `userId` = '".$userId."';";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result)>0){
            return true;
        }else{
            return false;
        }
    }
    
    function upvote($userId, $imageId){
        $sql = "INSERT INTO `imageupvotedby`(`imageId`, `userId`) VALUES ('$imageId','$userId');";
        $result = mysqli_query($this->con, $sql);
        return true;
    }
}
