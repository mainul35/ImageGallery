<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="../css/style.css" type="text/css"/>
    <style type="text/css">
        .container { position: relative; margin: 0 0 40px;}
        .chooser { position: absolute; z-index: 1; opacity: 0; cursor: pointer;}
        #imgHolder{
            width: 400px;
            height: 400px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input{
            line-height: 10px;
        }
    </style>
</head>
<?php
include_once './header.php';
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION['user'];
    checkLogin(true, $_SESSION['name']);
    ?>

    <div class="container">
        <div class="jumbotron">
            <form action="../controller/ImageUploadController.php" method="post" enctype="multipart/form-data">
                <h3>Select image to upload:</h3><br>
                <input type="file" name="imageToUpload" id="fileToUpload"/><br>
                <h4>Give a title to this image:</h4>
                <input type="text" name="imageName" /><br><br>
                <input type="submit" value="Upload" name="submit" style="width: 130px; height: 25px;"/>
            </form>
        </div>
    </div>
    <?php
} else {
    header("location: ../index.php");
}
?>