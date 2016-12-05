<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define("HOST", "localhost:3306");
define("USER", "root");
define("PASSWORD", "");

$con = mysqli_connect(HOST, USER, PASSWORD);

if(!$con){
    die("Could not connect due to ".  mysqli_connect_error());
}