<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../model/user.php';

class UserDAO {

    public function checkUser($connection, $email, $password) {
        mysqli_select_db($connection, "imagegallery");
        $sql = "SELECT * FROM `user` WHERE `email` = '" . $email . "';";
        $result = mysqli_query($connection, $sql);
        $totlaRows = mysqli_num_rows($result);
        if ($totlaRows > 0) {

            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                $userId = $row['id'];
                $fName = $row["fName"];
                $lName = $row["lName"];
                $psw = $row["password"];
                if ($password == $psw) {
                    $user = new User($fName, $lName, $email, $password);
                    $user->setId($userId);
                    session_start();
                    $_SESSION['user'] = $user;
                    $_SESSION['loggedIn'] = TRUE;
                    return true;
                }
            }

            /* free result set */
            $result->free();
        } else {
            return FALSE;
        }
    }

    public function addUser($connection, $fName, $lName, $email, $password) {
        $sql = "INSERT INTO `user`(`fName`, `lName`, `email`, `password`) VALUES (?,?,?,?);";
        $stmt = $connection->prepare($sql);
        if ($fName != "" || $lName != "" || $email != "" || $password != "") {
            $b = true;
            if (strlen($fName) > 2 && strlen($lName) > 2) {
                $b = TRUE;
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $b = true;
                    if (strlen($password) > 5) {
                        $b = TRUE;
                        $password = md5($password);
                        $stmt->bind_param("ssss", $fName, $lName, $email, $password);
                        if ($stmt->execute()) {
                            $b = true;
                        } else {
                            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                            $b = FALSE;
                        }
                    } else {
                        echo 'Password length is too short. It must be 6 characters long.<br>';
                        $b = FALSE;
                    }
                } else {
                    echo 'invalid email.<br>';
                    $b = false;
                }
            } else {
                echo 'Name must be at least 2 characters long.<br>';
                $b = false;
            }
        } else {
            echo 'Some fileds are missing.<br>';
            $b = false;
        }

        return $b;
    }

}
