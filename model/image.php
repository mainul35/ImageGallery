<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Image {

    private $imageId;
    private $imageName;
    private $imageUploadTime;
    private $imageVotes;
    private $imageURL;
    private $uploaderId;

    function __construct() {
        
    }

    public function getImageId() {
        return $this->imageId;
    }

    public function getImageName() {
        return $this->imageName;
    }

    public function getImageUploadTime() {
        return $this->imageUploadTime;
    }

    public function getImageVotes() {
        return $this->imageVotes;
    }

    public function getImageURL() {
        return $this->imageURL;
    }

    public function setImageName($imageName) {
        $this->imageName = $imageName;
    }

    public function setImageId($imageId) {
        $this->imageId = $imageId;
    }

    public function setImageUploadTime($imageUploadTime) {
        $this->imageUploadTime = $imageUploadTime;
    }

    public function setImageURL($imageURL) {
        $this->imageURL = $imageURL;
    }

    public function setImageVotes($imageVotes) {
        $this->imageVotes = $imageVotes;
    }

    public function getUploaderId() {
        return $this->uploadedBy;
    }

    public function setUploaderId($uploadedBy) {
        $this->uploadedBy = $uploadedBy;
    }
}
